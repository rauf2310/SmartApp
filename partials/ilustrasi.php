<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi hero (dibuat dengan HTML + CSS + SVG, tanpa file gambar).
 * Setiap halaman punya ilustrasinya sendiri di folder partials/ilustrasi/:
 *   beranda.php      -> halaman depan (laptop + HP berisi semua aplikasi)
 *   toko.php         -> tablet kasir, printer struk, QRIS
 *   toko-online.php  -> etalase di HP, pesanan dari banyak channel, pengiriman
 *   penggajian.php   -> slip gaji, absen dari HP, cuti, tim
 *   it.php           -> monitor papan tiket helpdesk, label aset, lisensi
 *   umum.php         -> aplikasi lain (Notepad & aplikasi baru): layar di tengah, fitur di sekelilingnya
 *
 * Sebelum memanggil file ini, isi $ilustrasi dengan 'beranda' atau kode aplikasi.
 * Variabel di dalam ilustrasi diberi awalan $ilus_ supaya tidak menimpa variabel halaman.
 */

// Kode QR hiasan (bukan kode QR asli): penanda di 3 sudut + pola tetap sesuai $benih
if (!function_exists('ilus_qr')) {
    function ilus_qr($benih)
    {
        $n = 21;
        $d = '';
        for ($y = 0; $y < $n; $y++) {
            $x = 0;
            while ($x < $n) {
                if (!ilus_qr_gelap($benih, $x, $y, $n)) {
                    $x++;
                    continue;
                }
                $mulai = $x;
                while ($x < $n && ilus_qr_gelap($benih, $x, $y, $n)) {
                    $x++;
                }
                $d .= 'M' . $mulai . ' ' . $y . 'h' . ($x - $mulai) . 'v1h-' . ($x - $mulai) . 'z';
            }
        }
        return '<svg class="ilus-qr" viewBox="0 0 ' . $n . ' ' . $n . '" shape-rendering="crispEdges"><path d="' . $d . '"/></svg>';
    }

    function ilus_qr_gelap($benih, $x, $y, $n)
    {
        foreach ([[0, 0], [$n - 7, 0], [0, $n - 7]] as $sudut) {
            $jarak = max(abs($x - $sudut[0] - 3), abs($y - $sudut[1] - 3));
            if ($jarak <= 4) {
                return $jarak !== 2 && $jarak !== 4;
            }
        }
        if ($x === 6 || $y === 6) {
            return ($x + $y) % 2 === 0;
        }
        return crc32($benih . ':' . $x . ':' . $y) % 2 === 0;
    }
}

$ilus_file = __DIR__ . '/ilustrasi/' . basename($ilustrasi) . '.php';
require is_file($ilus_file) ? $ilus_file : __DIR__ . '/ilustrasi/umum.php';
  