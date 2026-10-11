<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');
/**
 * Ilustrasi aplikasi Toko Online: etalase toko di HP pembeli, pesanan dari banyak channel
 * yang masuk ke satu tempat, lalu paket dikirim.
 * Membutuhkan variabel $app dari produk.php.
 */
// Channel penjualan: [ikon, nama, warna]
$ilus_channel = [
    ['💬', 'WhatsApp',               '#16A34A'],
    ['🌐', t('ilus_website'),        $app['warna']],
    ['🛍️', t('ilus_marketplace'),    '#F97316'],
];
// Produk di etalase: [emoji, warna latar, harga]
$ilus_produk = [['👕', '#DB2777', 'Rp 89.000'], ['👟', '#2563EB', 'Rp 259.000'], ['👜', '#D97706', 'Rp 199.000'], ['🧢', '#16A34A', 'Rp 59.000']];
// Pesanan masuk: [nomor channel di atas, no. pesanan, emoji, harga, status, warna status]
$ilus_pesanan = [
    [0, '#1026', '👕', 'Rp 89.000',  t('ilus_dibayar'), '#16A34A'],
    [2, '#1025', '👟', 'Rp 259.000', t('ilus_dikemas'), '#D97706'],
    [1, '#1024', '👜', 'Rp 199.000', t('ilus_dikirim'), '#2563EB'],
    [2, '#1023', '🧢', 'Rp 59.000',  t('ilus_dikirim'), '#2563EB'],
];
?>
<div class="ilus ilus-toko-online" style="--warna: <?= e($app['warna']) ?>" data-tilt>
  <span class="ilus-cahaya"></span>
  <span class="ilus-alas"></span>

  <!-- Aliran: channel -> pesanan masuk, HP pembeli -> pesanan masuk -->
  <svg class="ilus-garis" viewBox="0 0 600 500">
    <?php foreach ([298, 414, 530] as $n => $x): ?>
      <line class="ilus-jalur" x1="<?= $x ?>" y1="52" x2="<?= $x ?>" y2="110"/>
      <line class="ilus-aliran" x1="<?= $x ?>" y1="52" x2="<?= $x ?>" y2="110" pathLength="100" style="--i:<?= $n ?>"/>
    <?php endforeach; ?>
    <line class="ilus-jalur" x1="200" y1="230" x2="240" y2="230"/>
    <line class="ilus-aliran" x1="200" y1="230" x2="240" y2="230" pathLength="100" style="--i:3"/>
  </svg>

  <!-- Etalase toko di HP pembeli -->
  <div class="ilus-hp to-hp">
    <div class="ilus-hp-layar">
      <div class="ilus-hp-status"><span>09:41</span><span>4G ▮▮▮</span></div>
      <div class="to-toko">
        <span class="to-avatar">BS</span>
        <b>@butiksari</b>
        <span class="to-tas">🛒<i>2</i></span>
      </div>
      <div class="to-banner"><strong>−20%</strong><i></i><i></i><span>👗</span></div>
      <div class="to-grid">
        <?php foreach ($ilus_produk as $n => $p): ?>
          <span class="to-produk ilus-baris" style="--w: <?= $p[1] ?>; --i:<?= $n ?>">
            <b><?= $p[0] ?></b><i></i><em><?= $p[2] ?></em>
            <?php if ($n === 0): ?><span class="to-suka">❤️</span><?php endif; ?>
          </span>
        <?php endforeach; ?>
      </div>
      <span class="to-beli">🛒 <?= e(t('ilus_beli')) ?></span>
    </div>
  </div>

  <!-- Channel penjualan -->
  <div class="to-channel">
    <?php foreach ($ilus_channel as $n => $c): ?>
      <span class="to-ch" style="--w: <?= e($c[2]) ?>; --i:<?= $n ?>"><b><?= $c[0] ?></b><?= e($c[1]) ?></span>
    <?php endforeach; ?>
  </div>

  <!-- Semua pesanan masuk ke satu tempat -->
  <div class="to-panel">
    <div class="to-panel-kepala">
      <strong>📥 <?= e(t('ilus_pesanan_masuk')) ?></strong>
      <span class="to-jumlah">+<?= count($ilus_pesanan) ?></span>
    </div>
    <?php foreach ($ilus_pesanan as $n => $r): $c = $ilus_channel[$r[0]]; ?>
      <span class="to-pesanan ilus-baris" style="--w: <?= e($c[2]) ?>; --s: <?= $r[5] ?>; --i:<?= $n ?>">
        <b><?= $c[0] ?></b>
        <span><code><?= $r[1] ?></code><i></i></span>
        <span class="to-item"><?= $r[2] ?></span>
        <em><?= $r[3] ?></em>
        <small><?= e($r[4]) ?></small>
      </span>
    <?php endforeach; ?>
  </div>

  <!-- Pengiriman -->
  <span class="to-jalan"></span>
  <span class="to-truk">🚚</span>
  <span class="to-pin">📍</span>
  <div class="ilus-kartu to-resi" style="--w: #2563EB; --d: 2.2s">
    <b>🚚</b>
    <span><strong><?= e(t('ilus_perjalanan')) ?></strong><small><?= e(t('ilus_resi')) ?> JX-2049</small></span>
  </div>
</div>
