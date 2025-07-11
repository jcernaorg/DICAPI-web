<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|in:beneficiaries,volunteers,donors,other',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10|max:500',
        ]);

        $review = new Review();
        $review->name = 'Usuario Anónimo'; // Por ahora usaremos un nombre genérico
        $review->role = match ($request->category) {
            'beneficiaries' => 'Beneficiario',
            'volunteers' => 'Voluntario',
            'donors' => 'Donante',
            default => 'Otro',
        };
        $review->category = $request->category;
        $review->rating = $request->rating;
        $review->content = $request->content;
        $review->avatar = 'https://i.pravatar.cc/150?img=' . rand(1, 70); // Avatar aleatorio para demostración
        $review->save();

        return redirect()->route('reviews.index')
            ->with('success', '¡Gracias por compartir tu experiencia!');
    }
} 