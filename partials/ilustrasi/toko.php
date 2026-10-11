<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi aplikasi Toko: tablet kasir di meja, printer yang mencetak struk, dan QRIS di depan.
 * Membutuhkan variabel $app dari produk.php.
 */
// Produk di layar kasir: [emoji, warna latar, harga]
$ilus_produk = [
    ['☕', '#B45309', '15.000'], ['🍞', '#D97706', '12.000'], ['🥤', '#DB2777', '8.000'],
    ['🍜', '#DC2626', '10.000'], ['🍪', '#92400E', '5.000'],  ['🧃', '#16A34A', '12.000'],
];
// Isi keranjang: [emoji, jumlah, harga]
$ilus_keranjang = [['☕', 2, '30.000'], ['🍞', 1, '12.000'], ['🥤', 3, '24.000']];
?>
<div class="ilus ilus-toko" style="--warna: <?= e($app['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <span class="tk-dudukan"></span>

  <!-- Tablet kasir -->
  <div class="tk-tablet">
    <div class="tk-layar">
      <div class="tk-menu">
        <div class="tk-kepala">
          <span class="ikon-app"><?= e($app['fitur'][0][0]) ?></span>
          <strong><?= e($app['fitur'][0][1]) ?></strong>
          <i></i>
        </div>
        <div class="tk-kategori"><span></span><span></span><span></span></div>
        <div class="tk-produk">
          <?php foreach ($ilus_produk as $n => $p): ?>
            <span class="tk-item" style="--w: <?= $p[1] ?>; --i:<?= $n ?>"><b><?= $p[0] ?></b><em><?= $p[2] ?></em></span>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="tk-keranjang">
        <div class="tk-keranjang-kepala"><strong><?= e(t('ilus_keranjang')) ?></strong><span><?= count($ilus_keranjang) ?></span></div>
        <?php foreach ($ilus_keranjang as $n => $r): ?>
          <span class="tk-baris ilus-baris" style="--i:<?= $n ?>"><b><?= $r[0] ?></b><small>×<?= $r[1] ?></small><em>Rp <?= $r[2] ?></em></span>
        <?php endforeach; ?>
        <span class="tk-total ilus-baris" style="--i:3"><strong><?= e(t('ilus_total')) ?></strong><em>Rp 66.000</em></span>
        <span class="tk-bayar ilus-baris" style="--i:4"><?= e(t('ilus_bayar')) ?> · QRIS</span>
      </div>
    </div>
  </div>

  <!-- Printer struk: kertas keluar dari celah atas -->
  <div class="tk-printer">
    <div class="tk-kertas">
      <div class="tk-struk">
        <strong><?= e(t('ilus_toko')) ?></strong>
        <small><?= date('d/m/Y') ?> · 14:05</small>
        <hr>
        <?php foreach ($ilus_keranjang as $r): ?>
          <span><b><?= $r[0] ?> ×<?= $r[1] ?></b><em><?= $r[2] ?></em></span>
        <?php endforeach; ?>
        <hr>
        <span class="tk-struk-total"><b><?= e(t('ilus_total')) ?></b><em>Rp 66.000</em></span>
        <small>QRIS ✓</small>
        <p><?= e(t('ilus_terima_kasih')) ?> 🙏</p>
      </div>
    </div>
  </div>

  <!-- QRIS di meja kasir -->
  <div class="tk-qris">
    <strong>QRIS</strong>
    <?= ilus_qr('toko') ?>
    <span class="tk-lunas">✓ <?= e(t('ilus_lunas')) ?></span>
  </div>

  <div class="ilus-kartu tk-k1" style="--w: #16A34A; --d: 1.6s">
    <b>📈</b>
    <span><strong><?= e(t('ilus_laba')) ?></strong><small class="tk-naik">+Rp 420.000</small></span>
  </div>
  <div class="ilus-kartu tk-k2" style="--w: #F59E0B; --d: 2s">
    <b>📦</b>
    <span><strong><?= e(t('ilus_stok')) ?></strong><small><?= e(t('ilus_stok_isi')) ?></small></span>
  </div>
</div>
