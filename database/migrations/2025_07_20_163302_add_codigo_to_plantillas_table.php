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
        Schema::table('plantillas', function (Blueprint $table) {
            $table->string('codigo', 20)->nullable()->after('id');
        });
        
        // Generar códigos únicos para registros existentes
        $plantillas = \App\Models\Plantilla::all();
        foreach ($plantillas as $plantilla) {
            $plantilla->codigo = 'PLA-' . str_pad($plantilla->id, 4, '0', STR_PAD_LEFT);
            $plantilla->save();
        }
        
        // Hacer el campo único después de llenarlo
        Schema::table('plantillas', function (Blueprint $table) {
            $table->string('codigo', 20)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plantillas', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }
};
