<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi aplikasi Penggajian & HR: karyawan absen dari HP, cuti disetujui,
 * lalu slip gaji dihitung otomatis dan terkirim.
 * Membutuhkan variabel $app dari produk.php.
 */
// Rincian slip gaji: [kunci teks, nilai, jenis (+ / - / kosong)]
$ilus_rincian = [
    ['ilus_gaji_pokok', 'Rp 4.000.000', ''],
    ['ilus_lembur',     'Rp 300.000',   '+'],
    ['ilus_tunjangan',  'Rp 450.000',   '+'],
    ['ilus_potongan',   'Rp 250.000',   '-'],
];
$ilus_tim = [['AN', '#7C3AED'], ['BS', '#DB2777'], ['RD', '#0891B2']];
?>
<div class="ilus ilus-penggajian" style="--warna: <?= e($app['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <!-- Slip gaji -->
  <div class="pg-slip">
    <div class="pg-slip-kepala">
      <span><small><?= e($site['nama']) ?></small><strong><?= e(t('ilus_slip_judul')) ?></strong></span>
      <span class="pg-periode"><?= date('m/Y') ?></span>
    </div>
    <div class="pg-slip-isi">
      <div class="pg-orang ilus-baris" style="--i:0">
        <b>AN</b>
        <span><strong>Andi Nugraha</strong><small>ID 0142</small></span>
      </div>
      <?php foreach ($ilus_rincian as $n => $r): ?>
        <span class="pg-rincian ilus-baris<?= $r[2] === '+' ? ' pg-plus' : ($r[2] === '-' ? ' pg-minus' : '') ?>" style="--i:<?= $n + 1 ?>">
          <span><?= e(t($r[0])) ?></span><em><?= $r[2] === '-' ? '−' : $r[2] ?><?= $r[1] ?></em>
        </span>
      <?php endforeach; ?>
      <!-- Kehadiran bulan ini (dari absen HP) -->
      <div class="pg-kehadiran ilus-baris" style="--i:5">
        <span><?= e($app['fitur'][1][0] . ' ' . $app['fitur'][1][1]) ?></span><b>22/22</b>
        <span class="pg-titik"><?= str_repeat('<i></i>', 22) ?></span>
      </div>
      <div class="pg-total ilus-baris" style="--i:6">
        <small><?= e(t('ilus_diterima')) ?></small>
        <strong data-hitung="4500000" data-awalan="Rp " data-tunda="900">Rp 4.500.000</strong>
      </div>
      <div class="pg-ttd"><i></i><i></i></div>
    </div>
    <span class="pg-stempel">✓ <?= e(t('ilus_terkirim')) ?></span>
  </div>

  <!-- Absen dari HP -->
  <div class="ilus-hp pg-hp">
    <div class="ilus-hp-layar">
      <div class="ilus-hp-status"><span>07:58</span><span>4G ▮▮▮</span></div>
      <div class="pg-absen">
        <strong><?= e(t('ilus_absen')) ?></strong>
        <small><?= date('d/m/Y') ?></small>
      </div>
      <strong class="pg-jam">07:58</strong>
      <div class="pg-peta"><span>📍</span></div>
      <span class="pg-hadir">✓ <?= e(t('ilus_hadir')) ?></span>
    </div>
  </div>

  <!-- Cuti -->
  <div class="pg-cuti">
    <div class="pg-cuti-kepala"><b><?= e($app['fitur'][2][0]) ?></b><strong><?= e($app['fitur'][2][1]) ?></strong></div>
    <div class="pg-kalender">
      <?php for ($h = 8; $h <= 28; $h++): $cuti = $h >= 15 && $h <= 17; ?>
        <i<?= $cuti ? ' class="pg-libur" style="--i:' . ($h - 15) . '"' : '' ?>><?= $h ?></i>
      <?php endfor; ?>
    </div>
    <span class="pg-setuju">✓ <?= e(t('ilus_disetujui')) ?></span>
  </div>

  <!-- Slip gaji terkirim ke semua karyawan -->
  <div class="ilus-kartu pg-k1" style="--d: 2.4s">
    <b>📄</b>
    <span><strong><?= e(t('ilus_slip')) ?></strong><small>40 / 40</small></span>
  </div>

  <!-- Tim -->
  <div class="pg-tim">
    <div class="pg-avatar">
      <?php foreach ($ilus_tim as $o): ?><b style="--w: <?= $o[1] ?>"><?= $o[0] ?></b><?php endforeach; ?><b>+37</b>
    </div>
    <strong><?= e(t('ilus_karyawan', ['{n}' => 40])) ?></strong>
    <small><?= e($app['fitur'][3][1]) ?></small>
    <span class="pg-progres"><i></i></span>
  </div>
</div>
