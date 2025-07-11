<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPublicController extends Controller
{
    // Muestra la lista de blogs publicados
    public function index()
    {
        $featured = Blog::published()->latest('published_at')->first();
        $blogs = Blog::published()
            ->where('id', '!=', optional($featured)->id)
            ->latest('published_at')
            ->paginate(9);
        return view('blog', compact('featured', 'blogs'));
    }

    // Muestra el detalle de un blog
    public function show(Blog $blog)
    {
        if (!$blog->isPublished()) {
            abort(404);
        }
        // Sugerir otros blogs
        $related = Blog::published()->where('id', '!=', $blog->id)->latest('published_at')->take(3)->get();
        return view('blog-review', compact('blog', 'related'));
    }
}
