<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $query = Publicacion::query();

        // Búsqueda por texto
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('codigo', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('titulo', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('resumen', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('fecha', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filtro por año
        if ($request->filled('year')) {
            $query->whereRaw("strftime('%Y', fecha) = ?", [$request->year]);
        }

        // Filtro por mes
        if ($request->filled('month')) {
            $query->whereRaw("strftime('%m', fecha) = ?", [str_pad($request->month, 2, '0', STR_PAD_LEFT)]);
        }

        // Filtro por tipo (con imagen o sin imagen)
        if ($request->filled('type')) {
            if ($request->type === 'with_image') {
                $query->whereNotNull('imagen');
            } elseif ($request->type === 'without_image') {
                $query->whereNull('imagen');
            }
        }

        // Ordenamiento
        $sortBy = $request->get('sort', 'fecha');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $publicaciones = $query->paginate(10);
        $ultimasPublicaciones = Publicacion::orderBy('fecha', 'desc')->take(3)->get();

        // Obtener años únicos para el filtro
        $years = Publicacion::selectRaw("strftime('%Y', fecha) as year")
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Obtener meses únicos para el filtro
        $months = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        return view('publicaciones', compact(
            'publicaciones', 
            'ultimasPublicaciones', 
            'years', 
            'months'
        ));
    }

    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        
        // Obtener publicaciones relacionadas (excluyendo la actual)
        $publicacionesRelacionadas = Publicacion::where('id', '!=', $id)
            ->orderBy('fecha', 'desc')
            ->take(3)
            ->get();
        
        return view('publicacion-show', compact('publicacion', 'publicacionesRelacionadas'));
    }

    public function download($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        
        if (!$publicacion->pdf) {
            return redirect()->back()->with('error', 'No hay archivo PDF disponible para descargar.');
        }
        
        $path = storage_path('app/public/publicaciones/' . $publicacion->pdf);
        
        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'El archivo PDF no se encuentra en el servidor.');
        }
        
        return response()->download($path, $publicacion->titulo . '.pdf');
    }
} 