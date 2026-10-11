<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi aplikasi Manajemen IT: monitor berisi papan tiket helpdesk (satu tiket berpindah
 * dari Baru -> Dikerjakan -> Selesai), label aset ber-QR, lisensi, dan jadwal maintenance.
 * Membutuhkan variabel $app dari produk.php.
 */
// Kolom papan tiket: [kunci judul, warna titik, isi tiket: [emoji, kunci teks, kode]]
$ilus_kolom = [
    ['ilus_baru',    '#94A3B8', [['📶', 'ilus_t_wifi', 'NET-118'], ['🔑', 'ilus_t_password', 'ACC-207']]],
    ['ilus_proses',  '#F59E0B', [['💻', 'ilus_t_laptop', 'LAP-014']]],
    ['ilus_selesai', '#22C55E', [['🖱️', 'ilus_t_mouse', 'PC-031'], ['📧', 'ilus_t_email', 'ACC-198']]],
];
// Label aset: [emoji, kode, pemegang / lokasi, status, class posisi]
$ilus_aset = [
    ['💻', 'LAP-014', 'Rina · Finance', 'ok',   'it-tag-1'],
    ['🖨️', 'PRN-002', 'Lt. 2 · HRD',     'awas', 'it-tag-2'],
];
?>
<div class="ilus ilus-it" style="--warna: <?= e($app['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <!-- Monitor kantor -->
  <div class="it-monitor">
    <div class="it-layar">
      <div class="it-jendela">
        <div class="it-sisi">
          <?php foreach ($app['fitur'] as $n => $f): ?>
            <span<?= $n === 1 ? ' class="aktif"' : '' ?>><?= e($f[0]) ?></span>
          <?php endforeach; ?>
        </div>
        <div class="it-utama">
          <div class="it-kepala">
            <strong><?= e($app['fitur'][1][1] ?? $app['nama']) ?></strong>
            <span class="it-orang"><b>AR</b><b>DW</b></span>
          </div>
          <div class="it-papan">
            <?php foreach ($ilus_kolom as $k => $kolom): ?>
              <div class="it-kolom">
                <p><i style="--w: <?= $kolom[1] ?>"></i><?= e(t($kolom[0])) ?><small><?= count($kolom[2]) + ($k === 0 ? 1 : 0) ?></small></p>
                <?php foreach ($kolom[2] as $n => $tk): ?>
                  <span class="it-tiket ilus-baris" style="--i:<?= $k * 2 + $n ?>">
                    <strong><?= $tk[0] ?> <?= e(t($tk[1])) ?></strong>
                    <i></i>
                    <small><?= $tk[2] ?><?= $k === 2 ? ' ✓' : '' ?></small>
                  </span>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
            <!-- Tiket yang berpindah kolom -->
            <span class="it-tiket it-tiket-jalan">
              <strong>🖨️ <?= e(t('ilus_t_printer')) ?></strong>
              <i></i>
              <small>PRN-002<b>✓</b></small>
            </span>
          </div>
        </div>
      </div>
    </div>
    <span class="it-leher"></span>
    <span class="it-kaki"></span>
  </div>

  <!-- Label aset dengan kode QR -->
  <?php foreach ($ilus_aset as $n => $s): ?>
    <div class="ilus-kartu it-tag <?= $s[4] ?>" style="--d: <?= 1.3 + $n * .3 ?>s">
      <?= ilus_qr($s[1]) ?>
      <span><strong><?= $s[0] ?> <?= $s[1] ?></strong><small><?= e($s[2]) ?></small></span>
      <span class="ilus-status ilus-status-<?= $s[3] ?>"></span>
    </div>
  <?php endforeach; ?>

  <!-- Lisensi software: 12 dari 15 terpakai -->
  <div class="ilus-kartu it-lisensi" style="--d: 1.9s">
    <span class="it-cincin"><b>12/15</b></span>
    <span><strong><?= e($app['fitur'][2][1] ?? '') ?></strong><small class="it-habis"><?= e(t('ilus_habis')) ?></small></span>
  </div>

  <div class="ilus-kartu it-servis" style="--w: #D97706; --d: 2.2s">
    <b>🛠️</b>
    <span><strong><?= e(t('ilus_servis')) ?></strong><small><?= e(t('ilus_besok')) ?></small></span>
  </div>

  <div class="ilus-toast it-toast">🎫 <?= e(t('ilus_tiket')) ?> · PRN-002</div>
</div>
