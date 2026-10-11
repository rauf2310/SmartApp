<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi halaman depan: laptop dan HP yang membuka semua aplikasi.
 * Menjelaskan isi website: banyak aplikasi di satu tempat, bisa dibuka dari perangkat apa saja.
 * Kartu di sekelilingnya menunjukkan kegiatan dari aplikasi yang berbeda-beda.
 */
$ilus_apps    = array_slice($apps, 0, 6);
$ilus_per_app = array_column($apps, null, 'kode');

// Kartu melayang: [kode aplikasi, ikon, judul, keterangan tambahan, class posisi]
$ilus_kartu = [
    ['toko',        '🧾', t('km1_judul'),    'Rp 30.000',  'br-k1'],
    ['penggajian',  '📄', t('ilus_slip'),    '',           'br-k2'],
    ['toko-online', '🛒', t('ilus_pesanan'), 'Rp 178.000', 'br-k3'],
];
?>
<div class="ilus ilus-beranda" style="--warna: <?= e($site['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <!-- Laptop: daftar aplikasi -->
  <div class="br-laptop">
    <div class="br-layar">
      <div class="br-jendela">
        <div class="ilus-bar"><i></i><i></i><i></i><span><?= e(strtolower($site['nama'])) ?>/aplikasi</span></div>
        <div class="br-isi">
          <div class="br-kepala">
            <strong><?= e(t('ilus_app_saya')) ?></strong>
            <span class="br-trial">🎁 <?= e(t('hp_trial')) ?></span>
          </div>
          <div class="br-apps">
            <?php foreach ($ilus_apps as $n => $a): ?>
              <span class="br-app<?= $a['kode'] === 'lainnya' ? ' br-app-lain' : '' ?>" style="--warna: <?= e($a['warna']) ?>; --i:<?= $n ?>">
                <span class="ikon-app"><?= e($a['ikon']) ?></span>
                <b><?= e($a['nama']) ?></b>
                <i></i>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <span class="br-engsel"></span>
  </div>

  <!-- HP: aplikasi yang sama, tampilan menyesuaikan layar -->
  <div class="ilus-hp br-hp">
    <div class="ilus-hp-layar">
      <div class="ilus-hp-status"><span>09:41</span><span>4G ▮▮▮</span></div>
      <p class="br-sapa"><?= e(t('hp_sapa')) ?></p>
      <div class="br-ringkas">
        <span><?= e(t('hp_penjualan')) ?></span>
        <strong>Rp 1.250.000</strong>
        <small><?= e(t('hp_naik')) ?></small>
        <span class="br-grafik">
          <?php foreach ([38, 55, 42, 68, 57, 82, 100] as $n => $tinggi): ?>
            <i style="--h:<?= $tinggi ?>%; --i:<?= $n ?>"></i>
          <?php endforeach; ?>
        </span>
      </div>
      <div class="br-hp-apps">
        <?php foreach ($ilus_apps as $n => $a): ?>
          <span class="ikon-app" style="--warna: <?= e($a['warna']) ?>; --i:<?= $n ?>"><?= e($a['ikon']) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Kegiatan dari aplikasi yang berbeda-beda -->
  <?php foreach ($ilus_kartu as $n => $k): if (!isset($ilus_per_app[$k[0]])) continue; $a = $ilus_per_app[$k[0]]; ?>
    <div class="ilus-kartu <?= $k[4] ?>" style="--w: <?= e($a['warna']) ?>; --d: <?= 1.5 + $n * .3 ?>s">
      <b><?= $k[1] ?></b>
      <span><strong><?= e($k[2]) ?></strong><small><?= e($a['nama']) ?><?= $k[3] !== '' ? ' · ' . e($k[3]) : '' ?></small></span>
    </div>
  <?php endforeach; ?>
  <div class="ilus-kartu br-k4" style="--w: #F59E0B; --d: 2.4s">
    <b>🎁</b>
    <span><strong><?= e(t('km2_judul')) ?></strong><small><?= e(t('km2_isi')) ?></small></span>
  </div>
</div>
