<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\AIContentService;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::with('user')->latest();

        // Búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('excerpt', 'like', "%$search%")
                  ->orWhere('content', 'like', "%$search%");
            });
        }

        // Filtro por estado
        if ($request->filled('status') && in_array($request->status, ['published','draft','hidden'])) {
            $query->where('status', $request->status);
        }

        $blogs = $query->paginate(10)->appends($request->all());

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,hidden',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blog-images', 'public');
            $data['featured_image'] = $path;
        }

        if ($request->status === 'published') {
            $data['published_at'] = now();
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,hidden',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $path = $request->file('featured_image')->store('blog-images', 'public');
            $data['featured_image'] = $path;
        }

        // Handle published_at
        if ($request->status === 'published' && !$blog->published_at) {
            $data['published_at'] = now();
        } elseif ($request->status !== 'published') {
            $data['published_at'] = null;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog eliminado exitosamente.');
    }

    /**
     * Toggle blog status
     */
    public function toggleStatus(Blog $blog)
    {
        $newStatus = $blog->status === 'published' ? 'hidden' : 'published';
        $blog->update([
            'status' => $newStatus,
            'published_at' => $newStatus === 'published' ? now() : null,
        ]);

        $statusText = $newStatus === 'published' ? 'publicado' : 'oculto';
        return redirect()->route('admin.blogs.index')
            ->with('success', "Estado del blog cambiado a: {$statusText}");
    }

    /**
     * Genera una publicación según el rol y valida las URLs de las referencias.
     */
    public function generatePublication(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string',
            'rol' => 'required|in:cientifico,noticias,efemerides,opinion',
        ]);

        $mensaje = $request->input('mensaje');
        $rol = $request->input('rol');

        // Construir prompt específico según el rol
        $rolPrompt = [
            'cientifico' => 'Eres un experto en redacción de publicaciones científicas. Genera una publicación con referencias académicas reales y enlaces verificables.',
            'noticias' => 'Eres un especialista en redactar noticias actuales, con fuentes periodísticas reales y enlaces a medios reconocidos.',
            'efemerides' => 'Eres un experto en crear publicaciones sobre hechos históricos o efemérides, citando fuentes confiables y enlaces verificables.',
            'opinion' => 'Eres un redactor de columnas de opinión, argumentando con base en hechos y referencias reales, citando fuentes y enlaces válidos.'
        ];
        $prompt = $rolPrompt[$rol] . "\n\nTema: $mensaje\n\nGenera la publicación en formato:\nTÍTULO: [título]\nRESUMEN: [resumen]\nCONTENIDO: [contenido con referencias y URLs reales al final]";

        // Llamar al servicio de IA
        $aiService = new AIContentService();
        $result = $aiService->generateBlogContent($prompt, 'full');

        Log::info('Generación IA', ['rol' => $rol, 'mensaje' => $mensaje, 'result' => $result]);

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'error' => $result['message'] ?? 'Error al generar contenido con IA.'
            ], 500);
        }

        $publicacion = [
            'titulo' => $result['data']['title'] ?? '',
            'resumen' => $result['data']['excerpt'] ?? '',
            'contenido' => $result['data']['content'] ?? ''
        ];

        // Extraer URLs del contenido
        preg_match_all('/https?:\/\/[\w\.-]+(?:\/[\w\.-]*)*/', $publicacion['contenido'], $matches);
        $urls = $matches[0] ?? [];

        $urls_invalidas = [];
        foreach ($urls as $url) {
            if (!$this->urlExists($url)) {
                $urls_invalidas[] = $url;
            }
        }

        if (count($urls_invalidas) > 0) {
            Log::warning('Referencias inválidas detectadas', ['urls_invalidas' => $urls_invalidas]);
            return response()->json([
                'success' => false,
                'error' => 'Algunas referencias no son válidas.',
                'urls_invalidas' => $urls_invalidas
            ], 422);
        }

        return response()->json([
            'success' => true,
            'publicacion' => $publicacion
        ]);
    }

    /**
     * Verifica si una URL existe realmente (retorna true si el código HTTP es 200).
     */
    private function urlExists($url)
    {
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200') !== false) {
            return true;
        }
        return false;
    }
}
