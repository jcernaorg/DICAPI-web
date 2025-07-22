<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'plantillas';

    protected $fillable = [
        'codigo',
        'fecha',
        'titulo',
        'imagen',
        'archivo'
    ];
}
