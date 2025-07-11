<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'position',
        'description',
        'avatar',
        'twitter',
        'linkedin',
        'team_type',
        'projects',
        'students',
        'users',
        'programs',
        'teachers',
        'studies',
    ];

    protected $casts = [
        'team_type' => 'string',
        'projects' => 'integer',
        'students' => 'integer',
        'users' => 'integer',
        'programs' => 'integer',
        'teachers' => 'integer',
        'studies' => 'integer',
    ];

    public function getTeamTypeAttribute($value)
    {
        return match ($value) {
            'leadership' => 'Liderazgo',
            'education' => 'Educación',
            'technology' => 'Tecnología',
            'training' => 'Formación',
            'research' => 'Investigación',
            'support' => 'Apoyo',
            default => 'Otro',
        };
    }
} 