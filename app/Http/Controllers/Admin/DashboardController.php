<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Donation;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::published()->count(),
            'draft_blogs' => Blog::draft()->count(),
            'hidden_blogs' => Blog::hidden()->count(),
            'total_donations' => Donation::count(),
            'total_reviews' => Review::count(),
        ];

        $recent_blogs = Blog::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_blogs'));
    }
}
