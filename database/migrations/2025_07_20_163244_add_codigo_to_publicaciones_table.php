<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('publicaciones', function (Blueprint $table) {
            $table->string('codigo', 20)->nullable()->after('id');
        });
        
        // Generar códigos únicos para registros existentes
        $publicaciones = \App\Models\Publicacion::all();
        foreach ($publicaciones as $publicacion) {
            $publicacion->codigo = 'PUB-' . str_pad($publicacion->id, 4, '0', STR_PAD_LEFT);
            $publicacion->save();
        }
        
        // Hacer el campo único después de llenarlo
        Schema::table('publicaciones', function (Blueprint $table) {
            $table->string('codigo', 20)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publicaciones', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }
};
