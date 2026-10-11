<?php
defined('UMKM') or exit('Akses langsung tidak diizinkan.');

// Di beranda, link menu cukup "#bagian". Di halaman lain, arahkan ke "index.php#bagian".
$base = ($halaman === 'beranda') ? '' : 'index.php';
$menu = [
    'keunggulan' => t('nav_keunggulan'),
    'harga'      => t('nav_harga'),
    'faq'        => t('nav_faq'),
];
// Aplikasi yang muncul di menu "Produk" (tanpa kotak "aplikasi lainnya")
$menu_produk = array_filter($apps, function ($app) {
    return $app['kode'] !== 'lainnya';
});
$app_aktif = $app_aktif ?? null; // diisi oleh produk.php
?>
<!doctype html>
<html lang="<?= e($daftar_bahasa[$lang]['kode']) ?>" data-tema="terang">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title><?= e($judul) ?></title>
  <meta name="description" content="<?= e($site['deskripsi']) ?>">
  <meta name="theme-color" content="<?= e($site['warna']) ?>" data-terang="<?= e($site['warna']) ?>" data-gelap="<?= e($site['warna_gelap']) ?>">
  <meta name="color-scheme" content="light dark">

  <!-- Pasang tema terang/gelap sebelum halaman tampil, supaya tidak berkedip -->
  <script>
    (function () {
      var d = document.documentElement, tema = null;
      try { tema = localStorage.getItem('tema'); } catch (e) {}
      if (tema !== 'terang' && tema !== 'gelap') {
        tema = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'gelap' : 'terang';
      }
      d.setAttribute('data-tema', tema);
      d.classList.add('js');
      var meta = document.querySelector('meta[name="theme-color"]');
      if (meta) meta.content = meta.getAttribute('data-' + tema);
    })();
  </script>

  <!-- Supaya bisa dipasang di layar utama HP seperti aplikasi (PWA) -->
  <link rel="manifest" href="manifest.php" crossorigin="use-credentials">
  <link rel="icon" href="assets/img/favicon-32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="assets/img/icon-192.png" sizes="192x192" type="image/png">
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="<?= e($site['nama']) ?>">

  <!-- Tampilan saat link dibagikan ke WhatsApp / media sosial -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e($judul) ?>">
  <meta property="og:description" content="<?= e($site['deskripsi']) ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
  <?php if ($lang === 'zh'): ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700;900&display=swap">
  <?php endif; ?>
  <link rel="stylesheet" href="<?= e(aset('assets/css/style.css')) ?>">
</head>
<body>
<div class="progres-gulir" aria-hidden="true"></div>
<a class="lewati" href="#konten"><?= e(t('lewati')) ?></a>

<header class="kepala" data-kepala>
  <div class="kepala-isi">
    <a class="logo" href="index.php">
      <img src="assets/img/logo-ikon.png" alt="" width="34" height="34">
      <span><?= e($site['nama']) ?></span>
    </a>

    <nav class="nav" id="menu-utama" aria-label="<?= e(t('menu_utama')) ?>" data-menu>
      <!-- Menu "Produk": daftar aplikasi, masing-masing menuju halaman produknya -->
      <div class="nav-produk" style="--i:0" data-dropdown>
        <button class="nav-tombol<?= $halaman === 'produk' ? ' aktif' : '' ?>" type="button" aria-expanded="false" aria-controls="menu-produk" data-dropdown-tombol>
          <?= e(t('nav_produk')) ?>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="menu-produk" id="menu-produk">
          <div class="menu-produk-grid">
            <?php foreach ($menu_produk as $item): /* jangan pakai nama $app: dipakai oleh produk.php */ ?>
              <a class="menu-produk-item" href="<?= e(link_produk($item)) ?>" style="--warna: <?= e($item['warna']) ?>"<?= $app_aktif === $item['kode'] ? ' aria-current="page"' : '' ?>>
                <span class="ikon-app" aria-hidden="true"><?= e($item['ikon']) ?></span>
                <span><strong><?= e($item['nama']) ?></strong><small><?= e($item['untuk']) ?></small></span>
              </a>
            <?php endforeach; ?>
          </div>
          <a class="menu-produk-semua" href="<?= $base ?>#aplikasi"><?= e(t('menu_semua')) ?> &rarr;</a>
        </div>
      </div>
      <?php $i = 1; foreach ($menu as $id => $label): ?>
        <a href="<?= $base ?>#<?= $id ?>" style="--i:<?= $i++ ?>"><?= e($label) ?></a>
      <?php endforeach; ?>
      <a href="aplikasi.php" style="--i:<?= $i++ ?>"<?= $halaman === 'aplikasi' ? ' class="aktif" aria-current="page"' : '' ?>><?= e(t('nav_demo')) ?></a>
      <a class="tombol tombol-utama nav-cta" style="--i:<?= $i ?>" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener"><?= e(t('coba_gratis')) ?></a>
    </nav>

    <div class="alat">
      <!-- Pilihan bahasa -->
      <div class="pilih-bahasa" data-bahasa>
        <button class="tombol-ikon" type="button" aria-expanded="false" aria-controls="menu-bahasa"
                aria-label="<?= e(t('bahasa_label') . ': ' . $daftar_bahasa[$lang]['nama']) ?>" data-tombol-bahasa>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9.5"/><path d="M2.5 12h19"/><path d="M12 2.5a14.5 14.5 0 0 1 0 19 14.5 14.5 0 0 1 0-19z"/></svg>
          <span><?= e($daftar_bahasa[$lang]['singkat']) ?></span>
        </button>
        <ul class="menu-bahasa" id="menu-bahasa">
          <?php foreach ($daftar_bahasa as $kode => $b): ?>
            <li>
              <a href="?<?= e(http_build_query(array_merge($_GET, ['lang' => $kode]))) ?>" hreflang="<?= e($b['kode']) ?>" lang="<?= e($b['kode']) ?>"<?= $kode === $lang ? ' aria-current="true"' : '' ?> data-ganti-bahasa>
                <span class="kode" aria-hidden="true"><?= e($b['singkat']) ?></span>
                <?= e($b['nama']) ?>
                <?php if ($kode === $lang): ?>
                  <svg class="cek" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>
                <?php endif; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Tombol mode terang / gelap -->
      <button class="tombol-ikon tombol-tema" type="button" aria-label="<?= e(t('tema_label')) ?>" aria-pressed="false" data-tombol-tema>
        <svg class="ikon-matahari" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="4.2"/><path d="M12 2.5v2M12 19.5v2M4.6 4.6l1.4 1.4M18 18l1.4 1.4M2.5 12h2M19.5 12h2M4.6 19.4L6 18M18 6l1.4-1.4"/></svg>
        <svg class="ikon-bulan" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5 14.2A8.5 8.5 0 0 1 9.8 3.5a8.5 8.5 0 1 0 10.7 10.7z"/></svg>
      </button>

      <a class="tombol tombol-utama tombol-kecil kepala-cta" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener"><?= e(t('coba_gratis')) ?></a>

      <button class="tombol-menu" type="button" aria-expanded="false" aria-controls="menu-utama"
              data-buka="<?= e(t('menu_buka')) ?>" data-tutup="<?= e(t('menu_tutup')) ?>" data-tombol-menu>
        <span class="sr-only"><?= e(t('menu_buka')) ?></span>
        <span class="garis-menu" aria-hidden="true"></span>
      </button>
    </div>
  </div>
</header>

<main id="konten">
