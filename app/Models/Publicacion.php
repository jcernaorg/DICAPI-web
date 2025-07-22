<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'publicaciones';

    protected $fillable = [
        'codigo',
        'fecha',
        'titulo',
        'resumen',
        'imagen',
        'pdf'
    ];
}
