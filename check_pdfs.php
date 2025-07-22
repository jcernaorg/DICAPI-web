<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Publicacion;

echo "=== VERIFICANDO PUBLICACIONES ===\n";
$publicaciones = Publicacion::all();

foreach ($publicaciones as $pub) {
    echo "ID: {$pub->id} | Título: {$pub->titulo} | PDF: " . ($pub->pdf ?? 'NULL') . "\n";
}

echo "\n=== AGREGANDO PDFs DE PRUEBA ===\n";

// Crear directorio si no existe
$storagePath = storage_path('app/public/publicaciones');
if (!file_exists($storagePath)) {
    mkdir($storagePath, 0755, true);
}

// Crear PDFs de prueba
foreach ($publicaciones as $pub) {
    if (!$pub->pdf) {
        $pdfName = 'documento_' . $pub->id . '.pdf';
        $pdfPath = $storagePath . '/' . $pdfName;
        
        // Crear un PDF simple de prueba
        $content = "%PDF-1.4\n1 0 obj\n<<\n/Type /Catalog\n/Pages 2 0 R\n>>\nendobj\n2 0 obj\n<<\n/Type /Pages\n/Kids [3 0 R]\n/Count 1\n>>\nendobj\n3 0 obj\n<<\n/Type /Page\n/Parent 2 0 R\n/MediaBox [0 0 612 792]\n/Contents 4 0 R\n>>\nendobj\n4 0 obj\n<<\n/Length 44\n>>\nstream\nBT\n/F1 12 Tf\n72 720 Td\n({$pub->titulo}) Tj\nET\nendstream\nendobj\nxref\n0 5\n0000000000 65535 f \n0000000009 00000 n \n0000000058 00000 n \n0000000115 00000 n \n0000000204 00000 n \ntrailer\n<<\n/Size 5\n/Root 1 0 R\n>>\nstartxref\n297\n%%EOF";
        
        file_put_contents($pdfPath, $content);
        
        // Actualizar en la base de datos
        $pub->pdf = $pdfName;
        $pub->save();
        
        echo "PDF creado para: {$pub->titulo} -> {$pdfName}\n";
    }
}

echo "\n=== VERIFICACIÓN FINAL ===\n";
$publicaciones = Publicacion::all();
foreach ($publicaciones as $pub) {
    echo "ID: {$pub->id} | Título: {$pub->titulo} | PDF: " . ($pub->pdf ?? 'NULL') . "\n";
}

echo "\n¡Listo! Los PDFs de prueba han sido creados.\n"; 