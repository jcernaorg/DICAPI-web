<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'category',
        'rating',
        'content',
        'avatar',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function getCategoryAttribute($value)
    {
        return match ($value) {
            'beneficiaries' => 'Beneficiario',
            'volunteers' => 'Voluntario',
            'donors' => 'Donante',
            default => 'Otro',
        };
    }
} 