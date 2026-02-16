<?php
// Simple script to create placeholder images for Produk entries that have a foto filename
require __DIR__ . '/../vendor/autoload.php';

use App\Models\Produk;

// Bootstrap Laravel app to use models
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$dir = __DIR__ . '/../storage/app/public/produk';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

$items = Produk::whereNotNull('foto')->get();
foreach ($items as $p) {
    $filename = $p->foto;
    $path = $dir . '/' . $filename;
    if (file_exists($path)) {
        echo "Exists: $filename\n";
        continue;
    }

    // create a simple placeholder image
    $im = imagecreatetruecolor(400, 300);
    $bg = imagecolorallocate($im, 255, 255, 255);
    $textColor = imagecolorallocate($im, 50, 50, 50);
    imagefilledrectangle($im, 0, 0, 400, 300, $bg);
    imagestring($im, 5, 10, 10, $p->nama_produk, $textColor);

    // save as JPEG
    imagejpeg($im, $path, 85);
    imagedestroy($im);

    echo "Created: $filename\n";
}

echo "Done\n";
