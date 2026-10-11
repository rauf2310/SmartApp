<?php
// Manifest PWA: membuat website bisa "dipasang" di layar utama HP seperti aplikasi.
// Nama & warna diambil otomatis dari config.php.
require __DIR__ . '/config.php';

header('Content-Type: application/manifest+json; charset=utf-8');

echo json_encode([
    'name'             => $site['nama'],
    'short_name'       => $site['nama'],
    'description'      => $site['deskripsi'],
    'lang'             => $daftar_bahasa[$lang]['kode'],
    'start_url'        => './aplikasi.php',
    'scope'            => './',
    'display'          => 'standalone',
    'background_color' => '#ffffff',
    'theme_color'      => $site['warna'],
    'icons'            => [
        ['src' => 'assets/img/icon-192.png', 'sizes' => '192x192', 'type' => 'image/png'],
        ['src' => 'assets/img/icon-512.png', 'sizes' => '512x512', 'type' => 'image/png'],
        ['src' => 'assets/img/icon-maskable-512.png', 'sizes' => '512x512', 'type' => 'image/png', 'purpose' => 'maskable'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
