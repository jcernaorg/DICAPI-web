<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private $programs = [
        1 => [
            'id' => 1,
            'title' => 'Acceso Digital Educativo Integral',
            'description' => 'Este programa se centra en la democratización del acceso a una educación de calidad que integra herramientas digitales avanzadas y un currículo enriquecido en diversas áreas fundamentales.',
            'focus' => 'CREAD busca llevar soluciones educativas innovadoras a comunidades en todo el Perú, garantizando que los estudiantes puedan desarrollar un conocimiento sólido y habilidades clave para su futuro.',
            'objectives' => [
                'Universalizar el acceso a recursos educativos de vanguardia: Proveer plataformas de aprendizaje con contenidos académicos de alta calidad en múltiples asignaturas, incluyendo Matemáticas, Comunicación, Ciencias (Biología, Química, Física), Geografía y, crucialmente, Programación y conceptos de Inteligencia Artificial para las primeras aproximaciones.',
                'Fortalecer el aprendizaje fundamental y las habilidades del siglo XXI: Asegurar que los estudiantes no solo dominen las materias tradicionales, sino que también adquieran las competencias digitales esenciales que demanda el mercado laboral y la sociedad moderna.',
                'Reducir la brecha educativa a nivel nacional: Identificar y priorizar zonas con mayores necesidades, implementando soluciones escalables que impacten positivamente en el rendimiento académico y el desarrollo de habilidades en todo el país.',
                'Promover una educación balanceada y complementaria: Fomentar el uso de herramientas digitales como un complemento poderoso a la educación presencial, optimizando los procesos de enseñanza y aprendizaje.'
            ],
            'details' => [
                'description' => 'Este programa se centra en la democratización del acceso a una educación de calidad que integra herramientas digitales avanzadas y un currículo enriquecido en diversas áreas fundamentales. CREAD busca llevar soluciones educativas innovadoras a comunidades en todo el Perú, garantizando que los estudiantes puedan desarrollar un conocimiento sólido y habilidades clave para su futuro.',
                'methodology' => 'Utilizamos un enfoque híbrido que combina aprendizaje presencial con herramientas digitales. Los estudiantes tienen acceso a plataformas educativas interactivas, contenido multimedia y recursos digitales cuidadosamente seleccionados. Los docentes reciben capacitación continua para maximizar el uso de estas herramientas.',
                'importance' => 'En la era digital actual, es crucial asegurar que todos los estudiantes tengan acceso a una educación que incorpore tecnología de manera efectiva. Este programa no solo cierra la brecha digital, sino que también prepara a los estudiantes para los desafíos del futuro.',
                'duration' => '12 meses',
                'location' => 'Múltiples regiones del Perú',
                'beneficiaries' => '1,500 estudiantes',
                'start_year' => '2020',
                'communities' => '15',
                'teachers_trained' => '45',
                'budget' => '500000',
                'raised' => '375000',
                'status' => 'Activo',
                'impact_metrics' => [
                    'students' => 1500,
                    'schools' => 25,
                    'success_rate' => 95,
                    'communities' => 15,
                    'teachers' => 45
                ],
                'participation_options' => [
                    'volunteer' => [
                        'title' => 'Ser Voluntario',
                        'description' => 'Comparte tus habilidades y tiempo para ayudar a los estudiantes.'
                    ],
                    'donate' => [
                        'title' => 'Hacer una Donación',
                        'description' => 'Contribuye al desarrollo de la educación digital en el Perú.'
                    ],
                    'spread' => [
                        'title' => 'Difundir',
                        'description' => 'Ayuda a crear conciencia sobre la importancia de la educación digital.'
                    ]
                ]
            ]
        ],
        2 => [
            'id' => 2,
            'title' => 'Centros de Innovación y Fortalecimiento Digital',
            'description' => 'Este programa se orienta a la creación y potenciación de espacios físicos y virtuales que sirvan como focos de excelencia en la educación digital.',
            'focus' => 'CREAD busca establecer una infraestructura que no solo garantice el acceso a la tecnología, sino que también fomente la innovación pedagógica y el desarrollo de talento especializado en habilidades digitales avanzadas.',
            'objectives' => [
                'Promover el acceso físico a la tecnología: Habilitar y equipar centros de aprendizaje con conectividad y dispositivos, especialmente en áreas donde la infraestructura digital es limitada, asegurando que ningún estudiante quede excluido por falta de acceso.',
                'Fomentar la formación especializada en tecnologías emergentes: Ofrecer capacitación profunda en Programación (Python) e introducir las bases de la Inteligencia Artificial, preparando a los estudiantes para roles de alta demanda en la economía digital.',
                'Generar modelos de referencia para la integración digital: Establecer estos centros como ejemplos de cómo la tecnología puede ser efectivamente integrada en el currículo para mejorar la calidad educativa y desarrollar habilidades críticas.',
                'Empoderar a la comunidad educativa local: Capacitar a docentes y estudiantes para que sean líderes y "agentes de cambio digital" en sus propias comunidades, replicando el conocimiento y las mejores prácticas.'
            ],
            'details' => [
                'description' => 'Este programa se orienta a la creación y potenciación de espacios físicos y virtuales que sirvan como focos de excelencia en la educación digital. CREAD busca establecer una infraestructura que no solo garantice el acceso a la tecnología, sino que también fomente la innovación pedagógica y el desarrollo de talento especializado en habilidades digitales avanzadas.',
                'methodology' => 'Implementamos un modelo de aprendizaje basado en proyectos, donde los estudiantes trabajan en desafíos reales utilizando tecnologías emergentes. Los centros funcionan como laboratorios de innovación donde se fomenta la creatividad y el pensamiento crítico.',
                'importance' => 'Los centros de innovación son fundamentales para crear ecosistemas de aprendizaje tecnológico que beneficien a comunidades enteras. Son espacios donde la teoría se convierte en práctica y donde se cultivan las habilidades del futuro.',
                'duration' => '24 meses',
                'location' => 'Principales ciudades del Perú',
                'beneficiaries' => '2,000 estudiantes',
                'start_year' => '2020',
                'communities' => '15',
                'teachers_trained' => '45',
                'budget' => '500000',
                'raised' => '375000',
                'status' => 'Activo',
                'impact_metrics' => [
                    'students' => 2000,
                    'centers' => 10,
                    'success_rate' => 90,
                    'communities' => 15,
                    'teachers' => 45
                ],
                'participation_options' => [
                    'volunteer' => [
                        'title' => 'Ser Voluntario',
                        'description' => 'Comparte tus habilidades y tiempo para ayudar a los estudiantes.'
                    ],
                    'donate' => [
                        'title' => 'Hacer una Donación',
                        'description' => 'Contribuye al desarrollo de centros de innovación digital.'
                    ],
                    'spread' => [
                        'title' => 'Difundir',
                        'description' => 'Ayuda a crear conciencia sobre la importancia de los espacios de innovación digital.'
                    ]
                ]
            ]
        ],
        3 => [
            'id' => 3,
            'title' => 'Puente al Futuro Digital',
            'description' => 'Este programa se dedica a construir un puente directo entre el talento educativo emergente y las oportunidades de desarrollo profesional y laboral en el Perú.',
            'focus' => 'CREAD busca ser el catalizador que transforme el potencial de los estudiantes en realidades profesionales concretas.',
            'objectives' => [
                'Articular la oferta educativa con la demanda del mercado laboral',
                'Generar oportunidades concretas de desarrollo profesional',
                'Optimizar la gestión de oportunidades educativas y laborales',
                'Crear una red nacional de talento y oportunidades'
            ],
            'details' => [
                'description' => 'El programa Puente al Futuro Digital es una iniciativa integral que conecta la formación académica con oportunidades laborales reales. Trabajamos en estrecha colaboración con empresas tecnológicas y organizaciones para crear vías directas hacia el empleo calificado.',
                'methodology' => 'Combinamos formación técnica especializada con desarrollo de habilidades blandas. Los participantes reciben mentoría personalizada, participan en proyectos reales y tienen acceso a una red de profesionales y empresas del sector tecnológico.',
                'importance' => 'En un mercado laboral cada vez más digitalizado, es crucial crear puentes efectivos entre la educación y el empleo. Este programa no solo forma profesionales, sino que también asegura su inserción exitosa en el mundo laboral.',
                'duration' => '18 meses',
                'location' => 'Todo el Perú',
                'beneficiaries' => '1,000 estudiantes',
                'start_year' => '2020',
                'communities' => '15',
                'teachers_trained' => '45',
                'budget' => '500000',
                'raised' => '375000',
                'status' => 'Activo',
                'impact_metrics' => [
                    'students' => 1000,
                    'companies' => 50,
                    'placement_rate' => 85,
                    'communities' => 15,
                    'teachers' => 45
                ],
                'participation_options' => [
                    'volunteer' => [
                        'title' => 'Ser Voluntario',
                        'description' => 'Comparte tus habilidades y experiencia profesional con los estudiantes.'
                    ],
                    'donate' => [
                        'title' => 'Hacer una Donación',
                        'description' => 'Contribuye a crear más oportunidades laborales en el sector digital.'
                    ],
                    'spread' => [
                        'title' => 'Difundir',
                        'description' => 'Ayuda a crear conciencia sobre la importancia de la educación digital y el empleo.'
                    ]
                ]
            ]
        ]
    ];

    public function index()
    {
        return view('welcome', ['programs' => $this->programs]);
    }

    public function show($id)
    {
        if (!isset($this->programs[$id])) {
            abort(404);
        }
        return view('program-details', ['program' => $this->programs[$id]]);
    }

    public function list()
    {
        return view('programs', ['programs' => $this->programs]);
    }
} 