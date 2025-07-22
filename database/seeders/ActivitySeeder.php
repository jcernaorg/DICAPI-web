<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'action' => 'create',
                'model_type' => 'Publicacion',
                'model_id' => 1,
                'title' => 'Aportes de la SPDA al desarrollo sostenible',
                'description' => 'Nueva Publicacion creada: Aportes de la SPDA al desarrollo sostenible',
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'action' => 'update',
                'model_type' => 'Plantilla',
                'model_id' => 1,
                'title' => 'Formulario de registro',
                'description' => 'Plantilla actualizada: Formulario de registro',
                'created_at' => Carbon::now()->subHours(4),
                'updated_at' => Carbon::now()->subHours(4),
            ],
            [
                'action' => 'create',
                'model_type' => 'Plantilla',
                'model_id' => 2,
                'title' => 'Guía de procedimientos',
                'description' => 'Nueva Plantilla creada: Guía de procedimientos',
                'created_at' => Carbon::now()->subHours(6),
                'updated_at' => Carbon::now()->subHours(6),
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
