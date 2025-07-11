<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\TeamMember;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Testimonios de ejemplo
        $reviews = [
            [
                'name' => 'María Elena',
                'role' => 'Beneficiaria del Programa de Educación',
                'category' => 'beneficiaries',
                'rating' => 5,
                'content' => 'Gracias al programa de educación, he podido continuar mis estudios y ahora estoy más cerca de cumplir mi sueño de ser profesional.',
                'avatar' => 'https://i.pravatar.cc/150?img=1',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'name' => 'Carlos Mendoza',
                'role' => 'Voluntario',
                'category' => 'volunteers',
                'rating' => 5,
                'content' => 'Ser voluntario en Cread ha sido una experiencia transformadora. Ver el impacto directo en la comunidad es increíblemente gratificante.',
                'avatar' => 'https://i.pravatar.cc/150?img=2',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'name' => 'Dr. Ana López',
                'role' => 'Médica del Equipo de Salud',
                'category' => 'volunteers',
                'rating' => 5,
                'content' => 'Como médica, poder llevar atención médica a comunidades remotas a través de Cread ha sido una experiencia única y enriquecedora.',
                'avatar' => 'https://i.pravatar.cc/150?img=3',
                'created_at' => now()->subWeeks(3),
                'updated_at' => now()->subWeeks(3),
            ],
            [
                'name' => 'Roberto Silva',
                'role' => 'Beneficiario',
                'category' => 'beneficiaries',
                'rating' => 5,
                'content' => 'El apoyo recibido ha sido fundamental para mi familia. Los programas están muy bien organizados y el personal es muy dedicado.',
                'avatar' => 'https://i.pravatar.cc/150?img=4',
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
            [
                'name' => 'Patricia Ruiz',
                'role' => 'Donante',
                'category' => 'donors',
                'rating' => 4,
                'content' => 'Me encanta la transparencia con la que Cread maneja las donaciones. Siempre nos mantienen informados sobre el impacto de nuestras contribuciones.',
                'avatar' => 'https://i.pravatar.cc/150?img=5',
                'created_at' => now()->subWeeks(1),
                'updated_at' => now()->subWeeks(1),
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }

        // Equipo de Liderazgo
        TeamMember::create([
            'name' => 'Felipe Robinet',
            'role' => 'ceo',
            'position' => 'CEO',
            'description' => 'Líder visionario con más de 15 años de experiencia en educación y tecnología.',
            'avatar' => 'assets/person1.png',
            'twitter' => 'https://twitter.com/feliperobinet',
            'linkedin' => 'https://linkedin.com/in/feliperobinet',
            'team_type' => 'leadership'
        ]);

        TeamMember::create([
            'name' => 'Benjamin Mora',
            'role' => 'cto',
            'position' => 'CTO',
            'description' => 'Experto en tecnología educativa con un enfoque en innovación y accesibilidad.',
            'avatar' => 'assets/person3.png',
            'twitter' => 'https://twitter.com/benjaminmora',
            'linkedin' => 'https://linkedin.com/in/benjaminmora',
            'team_type' => 'leadership'
        ]);

        TeamMember::create([
            'name' => 'Natalia Ahumada',
            'role' => 'chc',
            'position' => 'CHC',
            'description' => 'Especialista en desarrollo humano y cultura organizacional.',
            'avatar' => 'assets/person2.png',
            'twitter' => 'https://twitter.com/nataliaahumada',
            'linkedin' => 'https://linkedin.com/in/nataliaahumada',
            'team_type' => 'leadership'
        ]);

        TeamMember::create([
            'name' => 'Arilin Haro',
            'role' => 'cao',
            'position' => 'CAO',
            'description' => 'Experta en operaciones y gestión de proyectos educativos.',
            'avatar' => 'assets/person4.png',
            'twitter' => 'https://twitter.com/arilinharo',
            'linkedin' => 'https://linkedin.com/in/arilinharo',
            'team_type' => 'leadership'
        ]);

        // Equipo de Educación
        for ($i = 1; $i <= 8; $i++) {
            TeamMember::create([
                'name' => "Especialista Educativo $i",
                'role' => 'education_specialist',
                'position' => 'Especialista en Educación',
                'description' => 'Experto en desarrollo de programas educativos.',
                'team_type' => 'education',
                'projects' => rand(1, 3),
                'students' => rand(500, 1000)
            ]);
        }

        // Equipo de Tecnología
        for ($i = 1; $i <= 12; $i++) {
            TeamMember::create([
                'name' => "Desarrollador $i",
                'role' => 'developer',
                'position' => 'Desarrollador de Software Educativo',
                'description' => 'Especialista en desarrollo de plataformas educativas.',
                'team_type' => 'technology',
                'users' => rand(1000, 2000)
            ]);
        }

        for ($i = 1; $i <= 8; $i++) {
            TeamMember::create([
                'name' => "Diseñador $i",
                'role' => 'designer',
                'position' => 'Diseñador UX/UI',
                'description' => 'Experto en diseño de experiencias educativas.',
                'team_type' => 'technology',
                'users' => rand(1000, 2000)
            ]);
        }

        // Equipo de Formación
        for ($i = 1; $i <= 6; $i++) {
            TeamMember::create([
                'name' => "Formador $i",
                'role' => 'trainer',
                'position' => 'Formador Docente',
                'description' => 'Especialista en capacitación y desarrollo profesional.',
                'team_type' => 'training',
                'programs' => rand(1, 3),
                'teachers' => rand(50, 100)
            ]);
        }

        // Equipo de Investigación
        for ($i = 1; $i <= 15; $i++) {
            TeamMember::create([
                'name' => "Investigador $i",
                'role' => 'researcher',
                'position' => 'Investigador Educativo',
                'description' => 'Especialista en investigación pedagógica.',
                'team_type' => 'research',
                'studies' => rand(1, 3)
            ]);
        }

        // Equipo de Apoyo
        $supportRoles = [
            'Coordinador de Logística',
            'Asistente Administrativo',
            'Especialista en Comunicación',
            'Analista de Datos',
            'Coordinador de Eventos',
            'Especialista en Recursos Humanos'
        ];

        foreach ($supportRoles as $role) {
            TeamMember::create([
                'name' => "Staff - $role",
                'role' => 'support',
                'position' => $role,
                'description' => 'Miembro del equipo de apoyo.',
                'team_type' => 'support'
            ]);
        }
    }
}
