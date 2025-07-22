<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Plantilla;
use App\Models\Activity;
use App\Models\FailedLoginAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $ipAddress = $request->ip();

        // Debug: Log de credenciales
        \Log::info('Login attempt', [
            'email' => $email,
            'ip' => $ipAddress,
            'password_provided' => !empty($request->password)
        ]);

        // Verificar intentos fallidos
        $failedAttempt = FailedLoginAttempt::where('email', $email)
            ->where('ip_address', $ipAddress)
            ->first();

        // Debug: Log de intentos fallidos
        \Log::info('Failed attempts check', [
            'failed_attempt' => $failedAttempt ? $failedAttempt->attempts : 0,
            'requires_captcha' => $failedAttempt ? $failedAttempt->requiresCaptcha() : false
        ]);

        // Verificar si se requiere captcha (después de 3 intentos)
        $requiresCaptcha = $failedAttempt && $failedAttempt->requiresCaptcha();
        
        if ($requiresCaptcha) {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => 'Por favor, complete el captcha.'
            ]);
        }

        // Debug: Log antes de intentar autenticación
        \Log::info('Attempting authentication');

        if (auth()->attempt($credentials)) {
            // Debug: Log de login exitoso
            \Log::info('Login successful');
            
            // Login exitoso - resetear intentos fallidos
            if ($failedAttempt) {
                $failedAttempt->resetAttempts();
            }
            
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Debug: Log de login fallido
        \Log::info('Login failed');

        // Login fallido - incrementar intentos
        if (!$failedAttempt) {
            $failedAttempt = FailedLoginAttempt::create([
                'email' => $email,
                'ip_address' => $ipAddress,
                'attempts' => 1
            ]);
        } else {
            $failedAttempt->incrementAttempts();
        }

        $errorMessage = 'Las credenciales proporcionadas no coinciden con nuestros registros.';
        
        if ($failedAttempt->attempts >= 3) {
            $errorMessage .= ' Se requiere completar el captcha para el próximo intento.';
        } elseif ($failedAttempt->attempts >= 2) {
            $errorMessage .= ' Después del próximo intento fallido, se requerirá completar un captcha.';
        }

        return back()->withErrors([
            'email' => $errorMessage,
        ])->withInput($request->only('email'));
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin-login');
    }

    // Dashboard
    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect('/admin-login');
        }
        
        $publicacionesCount = Publicacion::count();
        $plantillasCount = Plantilla::count();
        
        // Obtener la última actividad
        $lastActivity = Activity::latest()->first();
        $lastUpdateTime = $lastActivity ? $lastActivity->time_ago : 'Nunca';
        
        // Obtener las últimas 3 actividades
        $recentActivities = Activity::latest()->take(3)->get();
        
        return view('admin.dashboard', compact('publicacionesCount', 'plantillasCount', 'lastUpdateTime', 'recentActivities'));
    }

    // Publicaciones
    public function publicaciones()
    {
        $publicaciones = Publicacion::orderBy('fecha', 'desc')->get();
        return view('admin.publicaciones', compact('publicaciones'));
    }

    public function storePublicacion(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,gif|max:3072',
            'resumen' => 'nullable|string|max:500',
            'pdf' => 'nullable|file|mimes:pdf|max:10240'
        ]);

        $publicacion = new Publicacion();
        $publicacion->codigo = 'PUB-' . str_pad(Publicacion::count() + 1, 4, '0', STR_PAD_LEFT);
        $publicacion->fecha = date('Y-m-d');
        $publicacion->titulo = $request->title;
        $publicacion->resumen = $request->resumen;

        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('publicaciones', $nombreImagen, 'public');
            $publicacion->imagen = $nombreImagen;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $nombrePdf = time() . '_' . $pdf->getClientOriginalName();
            $pdf->storeAs('publicaciones', $nombrePdf, 'public');
            $publicacion->pdf = $nombrePdf;
        }

        $publicacion->save();

        return redirect()->route('admin.publicaciones')->with('success', 'Publicación creada exitosamente');
    }

    public function updatePublicacion(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:3072',
            'resumen' => 'nullable|string|max:500',
            'pdf' => 'nullable|file|mimes:pdf|max:10240'
        ]);

        $publicacion = Publicacion::findOrFail($id);
        $publicacion->titulo = $request->title;
        $publicacion->resumen = $request->resumen;

        // Manejar eliminación de imagen
        if ($request->has('remove_image') && $request->remove_image == '1') {
            if ($publicacion->imagen) {
                Storage::disk('public')->delete('publicaciones/' . $publicacion->imagen);
                $publicacion->imagen = null;
            }
        } elseif ($request->hasFile('image')) {
            // Eliminar imagen anterior
            if ($publicacion->imagen) {
                Storage::disk('public')->delete('publicaciones/' . $publicacion->imagen);
            }
            
            $imagen = $request->file('image');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('publicaciones', $nombreImagen, 'public');
            $publicacion->imagen = $nombreImagen;
        }

        // Manejar eliminación de PDF
        if ($request->has('remove_pdf') && $request->remove_pdf == '1') {
            if ($publicacion->pdf) {
                Storage::disk('public')->delete('publicaciones/' . $publicacion->pdf);
                $publicacion->pdf = null;
            }
        } elseif ($request->hasFile('pdf')) {
            // Eliminar PDF anterior
            if ($publicacion->pdf) {
                Storage::disk('public')->delete('publicaciones/' . $publicacion->pdf);
            }
            
            $pdf = $request->file('pdf');
            $nombrePdf = time() . '_' . $pdf->getClientOriginalName();
            $pdf->storeAs('publicaciones', $nombrePdf, 'public');
            $publicacion->pdf = $nombrePdf;
        }

        $publicacion->save();

        return redirect()->route('admin.publicaciones')->with('success', 'Publicación actualizada exitosamente');
    }

    public function deletePublicacion($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        
        if ($publicacion->imagen) {
            Storage::disk('public')->delete('publicaciones/' . $publicacion->imagen);
        }
        
        if ($publicacion->pdf) {
            Storage::disk('public')->delete('publicaciones/' . $publicacion->pdf);
        }
        
        $publicacion->delete();

        return redirect()->route('admin.publicaciones')->with('success', 'Publicación eliminada exitosamente');
    }

    // Plantillas
    public function plantillas()
    {
        $plantillas = Plantilla::orderBy('fecha', 'desc')->get();
        return view('admin.plantillas', compact('plantillas'));
    }

    public function storePlantilla(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'pdf' => 'required|file|mimes:pdf,application/pdf|max:3072',
            'imagen' => 'required|image|mimes:jpeg,png,gif|max:3072'
        ]);

        // Validación adicional para el PDF
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $extension = strtolower($pdfFile->getClientOriginalExtension());
            $mimeType = $pdfFile->getMimeType();
            
            // Verificar extensión y tipo MIME
            if ($extension !== 'pdf' || !in_array($mimeType, ['application/pdf', 'application/x-pdf'])) {
                return back()->withErrors(['pdf' => 'El archivo debe ser un PDF válido. Verifica que el archivo tenga extensión .pdf y sea un documento PDF real.'])->withInput();
            }
            
            // Verificar los primeros bytes del archivo para confirmar que es un PDF
            try {
                $fileContent = file_get_contents($pdfFile->getRealPath());
                if (substr($fileContent, 0, 4) !== '%PDF') {
                    return back()->withErrors(['pdf' => 'El archivo no parece ser un PDF válido. Verifica que el archivo no esté corrupto.'])->withInput();
                }
            } catch (Exception $e) {
                return back()->withErrors(['pdf' => 'Error al leer el archivo. Verifica que el archivo sea válido.'])->withInput();
            }
        }

        $plantilla = new Plantilla();
        $plantilla->codigo = 'PLA-' . str_pad(Plantilla::count() + 1, 4, '0', STR_PAD_LEFT);
        $plantilla->fecha = date('Y-m-d');
        $plantilla->titulo = $request->title;

        if ($request->hasFile('pdf')) {
            $archivo = $request->file('pdf');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->storeAs('plantillas', $nombreArchivo, 'public');
            $plantilla->archivo = $nombreArchivo;
        }

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('plantillas', $nombreImagen, 'public');
            $plantilla->imagen = $nombreImagen;
        }

        $plantilla->save();

        return redirect()->route('admin.plantillas')->with('success', 'Plantilla creada exitosamente');
    }

    public function updatePlantilla(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'pdf' => 'nullable|file|mimes:pdf,application/pdf|max:3072',
            'imagen' => 'nullable|image|mimes:jpeg,png,gif|max:3072'
        ]);

        // Validación adicional para el PDF
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $extension = strtolower($pdfFile->getClientOriginalExtension());
            $mimeType = $pdfFile->getMimeType();
            
            // Verificar extensión y tipo MIME
            if ($extension !== 'pdf' || !in_array($mimeType, ['application/pdf', 'application/x-pdf'])) {
                return back()->withErrors(['pdf' => 'El archivo debe ser un PDF válido. Verifica que el archivo tenga extensión .pdf y sea un documento PDF real.'])->withInput();
            }
            
            // Verificar los primeros bytes del archivo para confirmar que es un PDF
            try {
                $fileContent = file_get_contents($pdfFile->getRealPath());
                if (substr($fileContent, 0, 4) !== '%PDF') {
                    return back()->withErrors(['pdf' => 'El archivo no parece ser un PDF válido. Verifica que el archivo no esté corrupto.'])->withInput();
                }
            } catch (Exception $e) {
                return back()->withErrors(['pdf' => 'Error al leer el archivo. Verifica que el archivo sea válido.'])->withInput();
            }
        }

        $plantilla = Plantilla::findOrFail($id);
        $plantilla->titulo = $request->title;

        // Manejar eliminación de archivo PDF
        if ($request->has('remove_archivo') && $request->remove_archivo == '1') {
            if ($plantilla->archivo) {
                Storage::disk('public')->delete('plantillas/' . $plantilla->archivo);
                $plantilla->archivo = null;
            }
        } elseif ($request->hasFile('pdf')) {
            // Eliminar archivo anterior
            if ($plantilla->archivo) {
                Storage::disk('public')->delete('plantillas/' . $plantilla->archivo);
            }
            
            $archivo = $request->file('pdf');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->storeAs('plantillas', $nombreArchivo, 'public');
            $plantilla->archivo = $nombreArchivo;
        }

        // Manejar eliminación de imagen
        if ($request->has('remove_imagen') && $request->remove_imagen == '1') {
            if ($plantilla->imagen) {
                Storage::disk('public')->delete('plantillas/' . $plantilla->imagen);
                $plantilla->imagen = null;
            }
        } elseif ($request->hasFile('imagen')) {
            // Eliminar imagen anterior
            if ($plantilla->imagen) {
                Storage::disk('public')->delete('plantillas/' . $plantilla->imagen);
            }
            
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('plantillas', $nombreImagen, 'public');
            $plantilla->imagen = $nombreImagen;
        }

        $plantilla->save();

        return redirect()->route('admin.plantillas')->with('success', 'Plantilla actualizada exitosamente');
    }

    public function deletePlantilla($id)
    {
        $plantilla = Plantilla::findOrFail($id);
        
        if ($plantilla->archivo) {
            Storage::disk('public')->delete('plantillas/' . $plantilla->archivo);
        }
        
        $plantilla->delete();

        return redirect()->route('admin.plantillas')->with('success', 'Plantilla eliminada exitosamente');
    }

    // Download Plantilla
    public function downloadPlantilla($id)
    {
        try {
            $plantilla = Plantilla::findOrFail($id);
            
            if (!$plantilla->archivo) {
                return back()->with('error', 'Esta plantilla no tiene un archivo PDF asociado.');
            }
            
            $filePath = 'plantillas/' . $plantilla->archivo;
            
            if (!Storage::disk('public')->exists($filePath)) {
                return back()->with('error', 'El archivo PDF no se encuentra en el servidor.');
            }
            
            return Storage::disk('public')->download($filePath, $plantilla->titulo . '.pdf');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Error al descargar el archivo: ' . $e->getMessage());
        }
    }
}
