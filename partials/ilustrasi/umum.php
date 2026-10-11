<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi untuk aplikasi yang belum punya ilustrasi khusus (Notepad & aplikasi baru).
 * Layar dashboard di tengah, fitur-fitur di sekelilingnya terhubung dengan garis beraliran.
 * Membutuhkan variabel $app dari produk.php.
 */

// Posisi node fitur dalam persen [kiri, atas]. Layar dashboard ada di tengah (50, 50).
$ilus_posisi = [[8, 26], [5, 52], [9, 78], [92, 26], [95, 52], [91, 78]];
$ilus_alamat = strtolower($site['nama']) . '/' . $app['kode'];
?>
<div class="ilus ilus-umum" style="--warna: <?= e($app['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <!-- Garis penghubung fitur -> layar. viewBox 600x500 = perbandingan kotak ilustrasi (6:5) -->
  <svg class="ilus-garis" viewBox="0 0 600 500">
    <?php foreach ($app['fitur'] as $n => $f): if (!isset($ilus_posisi[$n])) break;
      $x = $ilus_posisi[$n][0] * 6;
      $y = $ilus_posisi[$n][1] * 5;
    ?>
      <line class="ilus-jalur" x1="<?= $x ?>" y1="<?= $y ?>" x2="300" y2="250"/>
      <line class="ilus-aliran" x1="<?= $x ?>" y1="<?= $y ?>" x2="300" y2="250" pathLength="100" style="--i:<?= $n ?>"/>
    <?php endforeach; ?>
  </svg>

  <!-- Layar dashboard -->
  <div class="ilus-layar">
    <div class="ilus-bar"><i></i><i></i><i></i><span><?= e($ilus_alamat) ?></span></div>
    <div class="ilus-isi">
      <div class="ilus-judul"><span class="ikon-app"><?= e($app['ikon']) ?></span><?= e($app['nama']) ?></div>

      <?php if ($app['kode'] === 'notepad'): ?>
        <div class="ilus-catatan">
          <span class="ilus-baris ilus-sticky" style="--w:#FEF3C7; --i:0"><i></i><i></i><i></i></span>
          <span class="ilus-baris ilus-sticky" style="--w:#FCE7F3; --i:1"><i></i><i></i></span>
        </div>
        <div class="ilus-daftar">
          <?php foreach (['✅', '✅', '⬜'] as $n => $c): ?>
            <span class="ilus-baris" style="--i:<?= $n + 2 ?>"><b><?= $c ?></b><i></i></span>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="ilus-daftar">
          <?php foreach (array_slice($app['fitur'], 0, 4) as $n => $f): ?>
            <span class="ilus-baris" style="--i:<?= $n ?>"><b><?= e($f[0]) ?></b><i></i><span class="ilus-cek">✓</span></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Notifikasi yang muncul berkala -->
  <div class="ilus-toast">☁️ <?= e(t('ilus_tersimpan')) ?></div>

  <!-- Fitur di sekeliling layar -->
  <?php foreach ($app['fitur'] as $n => $f): if (!isset($ilus_posisi[$n])) break; ?>
    <span class="ilus-node" style="left: <?= $ilus_posisi[$n][0] ?>%; top: <?= $ilus_posisi[$n][1] ?>%; --i:<?= $n ?>">
      <span class="ikon-app"><?= e($f[0]) ?></span>
      <small><?= e($f[1]) ?></small>
    </span>
  <?php endforeach; ?>
</div>
