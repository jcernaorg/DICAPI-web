<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the user that owns the blog.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published blogs.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include draft blogs.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include hidden blogs.
     */
    public function scopeHidden($query)
    {
        return $query->where('status', 'hidden');
    }

    /**
     * Boot the model and add event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    /**
     * Check if blog is published
     */
    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    /**
     * Check if blog is draft
     */
    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    /**
     * Check if blog is hidden
     */
    public function isHidden(): bool
    {
        return $this->status === 'hidden';
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
