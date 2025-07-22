<?php

namespace App\Http\Controllers;

use App\Models\Plantilla;
use Illuminate\Http\Request;

class PlantillaController extends Controller
{
    public function index(Request $request)
    {
        $query = Plantilla::query();

        // Búsqueda por texto
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('codigo', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('titulo', 'LIKE', "%{$searchTerm}%")
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

        // Ordenamiento
        $sortBy = $request->get('sort', 'fecha');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $plantillas = $query->paginate(10);
        $ultimaPlantilla = Plantilla::orderBy('fecha', 'desc')->first();

        // Obtener años únicos para el filtro
        $years = Plantilla::selectRaw("strftime('%Y', fecha) as year")
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Obtener meses únicos para el filtro
        $months = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        return view('plantillas', compact(
            'plantillas', 
            'ultimaPlantilla', 
            'years', 
            'months'
        ));
    }

    public function show($id)
    {
        $plantilla = Plantilla::findOrFail($id);
        
        // Obtener plantillas relacionadas (mismo año o similares)
        $plantillasRelacionadas = Plantilla::where('id', '!=', $id)
            ->whereRaw("strftime('%Y', fecha) = ?", [date('Y', strtotime($plantilla->fecha))])
            ->orderBy('fecha', 'desc')
            ->limit(3)
            ->get();

        return view('plantilla-show', compact('plantilla', 'plantillasRelacionadas'));
    }
}
