<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Publicacion;

echo "=== CREANDO PUBLICACIONES DE PRUEBA ===\n";

// Crear directorio si no existe
$storagePath = storage_path('app/public/publicaciones');
if (!file_exists($storagePath)) {
    mkdir($storagePath, 0755, true);
}

// Datos de prueba
$publicaciones = [
    [
        'titulo' => 'Guía de Conservación Ambiental',
        'resumen' => 'Una guía completa sobre conservación ambiental y desarrollo sostenible en la región amazónica.',
        'fecha' => '2024-01-15',
        'imagen' => '1752909965_Logo Cread PNG.png'
    ],
    [
        'titulo' => 'Manual de Biodiversidad',
        'resumen' => 'Manual técnico sobre la biodiversidad y su conservación en ecosistemas tropicales.',
        'fecha' => '2024-03-20',
        'imagen' => '1752910269_Logo Cread PNG.png'
    ],
    [
        'titulo' => 'Estudio de Fauna Silvestre',
        'resumen' => 'Investigación sobre el comercio ilegal de fauna silvestre y sus impactos en la conservación.',
        'fecha' => '2024-06-10',
        'imagen' => '1752965440_64f78ee1d49618f094e64111_vationventures_datascience.jpeg'
    ]
];

foreach ($publicaciones as $index => $data) {
    // Crear PDF de prueba
    $pdfName = 'documento_' . ($index + 1) . '.pdf';
    $pdfPath = $storagePath . '/' . $pdfName;
    
    // Crear un PDF simple de prueba
    $content = "%PDF-1.4\n1 0 obj\n<<\n/Type /Catalog\n/Pages 2 0 R\n>>\nendobj\n2 0 obj\n<<\n/Type /Pages\n/Kids [3 0 R]\n/Count 1\n>>\nendobj\n3 0 obj\n<<\n/Type /Page\n/Parent 2 0 R\n/MediaBox [0 0 612 792]\n/Contents 4 0 R\n>>\nendobj\n4 0 obj\n<<\n/Length 44\n>>\nstream\nBT\n/F1 12 Tf\n72 720 Td\n({$data['titulo']}) Tj\nET\nendstream\nendobj\nxref\n0 5\n0000000000 65535 f \n0000000009 00000 n \n0000000058 00000 n \n0000000115 00000 n \n0000000204 00000 n \ntrailer\n<<\n/Size 5\n/Root 1 0 R\n>>\nstartxref\n297\n%%EOF";
    
    file_put_contents($pdfPath, $content);
    
    // Crear publicación en la base de datos
    $publicacion = new Publicacion();
    $publicacion->titulo = $data['titulo'];
    $publicacion->resumen = $data['resumen'];
    $publicacion->fecha = $data['fecha'];
    $publicacion->imagen = $data['imagen'];
    $publicacion->pdf = $pdfName;
    $publicacion->save();
    
    echo "Publicación creada: {$data['titulo']} con PDF: {$pdfName}\n";
}

echo "\n=== VERIFICACIÓN FINAL ===\n";
$publicaciones = Publicacion::all();
foreach ($publicaciones as $pub) {
    echo "ID: {$pub->id} | Título: {$pub->titulo} | PDF: {$pub->pdf}\n";
}

echo "\n¡Listo! Se han creado publicaciones de prueba con PDFs.\n"; 