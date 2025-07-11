<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario admin de ejemplo si no existe
        $user = User::firstOrCreate([
            'email' => 'admin@cread.org'
        ], [
            'name' => 'Administrador Cread',
            'google_id' => '123456789',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Crear blogs de ejemplo
        $blogs = [
            [
                'title' => 'Nuestro Compromiso con la Comunidad',
                'excerpt' => 'Descubre cómo Cread ONG está trabajando para mejorar la vida de las comunidades más vulnerables.',
                'content' => 'En Cread ONG, creemos firmemente en el poder de la comunidad para generar cambios positivos y duraderos. Nuestro compromiso va más allá de simplemente proporcionar ayuda temporal; trabajamos para empoderar a las personas y construir un futuro más brillante para todos.

Desde nuestros inicios, hemos sido testigos de la increíble resiliencia y fortaleza de las comunidades con las que trabajamos. Cada día, nos inspiramos en su determinación y espíritu de superación.

Nuestros programas están diseñados para abordar las necesidades específicas de cada comunidad, asegurando que nuestras intervenciones sean relevantes, efectivas y sostenibles. Trabajamos en estrecha colaboración con líderes locales, organizaciones comunitarias y otros actores clave para maximizar el impacto de nuestros esfuerzos.

El cambio real ocurre cuando las comunidades se unen, comparten recursos y conocimientos, y trabajan juntas hacia objetivos comunes. En Cread ONG, facilitamos este proceso proporcionando las herramientas, el apoyo y la orientación necesarios para que las comunidades puedan tomar el control de su propio desarrollo.

Nuestro enfoque se basa en tres pilares fundamentales:
- Educación y capacitación
- Desarrollo económico sostenible
- Fortalecimiento comunitario

A través de estos pilares, hemos logrado resultados significativos en las comunidades donde trabajamos. Familias que antes luchaban por satisfacer sus necesidades básicas ahora tienen acceso a educación, oportunidades económicas y una red de apoyo sólida.

Pero nuestro trabajo está lejos de terminar. Cada día, nuevas comunidades nos contactan buscando apoyo, y cada día renovamos nuestro compromiso de estar ahí para ellos. Sabemos que el camino hacia el desarrollo sostenible es largo y desafiante, pero también sabemos que es posible cuando trabajamos juntos.

Te invitamos a unirte a nosotros en este viaje. Ya sea como voluntario, donante o simplemente compartiendo nuestro mensaje, cada acción cuenta. Juntos, podemos crear un mundo donde todas las comunidades tengan la oportunidad de prosperar.',
                'status' => 'published',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Programas Educativos que Transforman Vidas',
                'excerpt' => 'Conoce nuestros programas educativos innovadores que están cambiando la vida de cientos de niños y jóvenes.',
                'content' => 'La educación es la base fundamental para el desarrollo de cualquier sociedad. En Cread ONG, hemos desarrollado programas educativos innovadores que no solo proporcionan conocimientos académicos, sino que también fomentan el desarrollo de habilidades para la vida y el pensamiento crítico.

Nuestros programas educativos están diseñados para ser inclusivos, accesibles y relevantes para las realidades de las comunidades donde trabajamos. Entendemos que cada niño y joven tiene necesidades únicas, por lo que adaptamos nuestros enfoques para asegurar que nadie se quede atrás.

Uno de nuestros programas más exitosos es "Educación para Todos", que proporciona acceso a educación de calidad para niños en comunidades rurales y urbanas marginadas. A través de este programa, hemos logrado:

- Construir y equipar 15 escuelas en comunidades rurales
- Proporcionar becas completas a más de 500 estudiantes
- Capacitar a más de 200 maestros en metodologías innovadoras
- Implementar programas de alimentación escolar que benefician a 1,200 niños diariamente

Pero la educación va más allá de las aulas. Nuestro programa "Habilidades para el Futuro" se enfoca en preparar a los jóvenes para los desafíos del siglo XXI. A través de talleres, mentorías y experiencias prácticas, los participantes desarrollan:

- Habilidades digitales y tecnológicas
- Pensamiento crítico y resolución de problemas
- Comunicación efectiva y trabajo en equipo
- Emprendimiento y liderazgo

Los resultados de nuestros programas educativos son evidentes. Estudiantes que antes tenían dificultades académicas ahora están prosperando, y muchos de nuestros graduados han continuado sus estudios universitarios o han iniciado sus propios negocios.

El impacto de la educación se extiende más allá de los individuos. Familias enteras se benefician cuando sus hijos tienen acceso a una educación de calidad. Comunidades se fortalecen cuando sus jóvenes están preparados para enfrentar los desafíos del futuro.

En Cread ONG, creemos que la educación es un derecho fundamental que debe estar disponible para todos, sin importar su origen o circunstancias. Continuaremos trabajando incansablemente para hacer de este derecho una realidad para más niños y jóvenes en todo el mundo.',
                'status' => 'published',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Iniciativas de Desarrollo Sostenible',
                'excerpt' => 'Explora nuestras iniciativas de desarrollo sostenible que combinan crecimiento económico con protección ambiental.',
                'content' => 'El desarrollo sostenible es más que una moda; es una necesidad urgente para asegurar un futuro viable para las próximas generaciones. En Cread ONG, hemos integrado la sostenibilidad en todos nuestros programas y proyectos, reconociendo que el bienestar humano está inextricablemente ligado a la salud de nuestro planeta.

Nuestras iniciativas de desarrollo sostenible se basan en tres principios fundamentales: crecimiento económico inclusivo, protección ambiental y equidad social. Trabajamos para crear soluciones que beneficien tanto a las personas como al planeta.

Uno de nuestros proyectos más innovadores es "Agricultura Sostenible para Comunidades Rurales". Este programa combina técnicas agrícolas tradicionales con tecnologías modernas para crear sistemas de producción que son tanto productivos como respetuosos con el medio ambiente.

A través de este programa, hemos logrado:

- Implementar sistemas de riego eficientes que reducen el consumo de agua en un 40%
- Capacitar a más de 300 agricultores en técnicas de agricultura orgánica
- Establecer 25 cooperativas agrícolas que benefician a más de 1,000 familias
- Reducir el uso de pesticidas químicos en un 60% a través de métodos de control biológico

Nuestro programa "Energía Renovable para Comunidades" está transformando la forma en que las comunidades rurales acceden a la energía. Hemos instalado sistemas de energía solar en más de 50 comunidades, proporcionando electricidad limpia y confiable a miles de personas.

Los beneficios de este programa incluyen:

- Reducción de la dependencia de combustibles fósiles
- Mejora en la calidad de vida de las comunidades
- Creación de empleos locales en el sector de energías renovables
- Reducción de la contaminación del aire en interiores

También trabajamos en iniciativas de conservación ambiental. Nuestro programa "Guardianes del Bosque" involucra a comunidades locales en la protección y restauración de ecosistemas forestales. A través de este programa, hemos:

- Reforestado más de 500 hectáreas de tierra degradada
- Establecido 15 áreas protegidas comunitarias
- Capacitado a más de 200 guardabosques comunitarios
- Implementado programas de ecoturismo que generan ingresos sostenibles

El desarrollo sostenible no es solo responsabilidad de los gobiernos o las grandes empresas. Cada individuo y comunidad puede contribuir a crear un futuro más sostenible. En Cread ONG, creemos en el poder de la acción colectiva y trabajamos para empoderar a las comunidades para que sean agentes activos del cambio.

Nuestro compromiso con la sostenibilidad se refleja en todas nuestras operaciones. Desde nuestras oficinas hasta nuestros proyectos de campo, buscamos constantemente formas de reducir nuestro impacto ambiental y promover prácticas sostenibles.

El camino hacia el desarrollo sostenible es desafiante, pero también es emocionante y lleno de oportunidades. En Cread ONG, estamos comprometidos a continuar innovando y colaborando con comunidades, organizaciones y gobiernos para crear un futuro más sostenible para todos.',
                'status' => 'draft',
                'user_id' => $user->id,
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}
