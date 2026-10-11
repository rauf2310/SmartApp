<?php
require __DIR__ . '/config.php';

// Cari aplikasi dari alamat produk.php?app=kode. Kalau tidak ada, kembali ke daftar aplikasi.
$kode = is_string($_GET['app'] ?? null) ? $_GET['app'] : '';
$app  = null;
foreach ($apps as $a) {
    if ($a['kode'] === $kode && $a['kode'] !== 'lainnya') {
        $app = $a;
        break;
    }
}
if (!$app) {
    header('Location: index.php#aplikasi');
    exit;
}

$halaman   = 'produk';
$app_aktif = $app['kode'];
$judul     = $app['nama'] . ' — ' . $site['nama'];
$site['deskripsi'] = $app['desc']; // deskripsi halaman untuk Google & WhatsApp
$ganti_app = ['{app}' => $app['nama']];

// Aplikasi lain untuk bagian "Lihat juga aplikasi lainnya"
$apps_lain = array_filter($apps, function ($a) use ($app) {
    return $a['kode'] !== 'lainnya' && $a['kode'] !== $app['kode'];
});

$panah = '<svg class="panah" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

require __DIR__ . '/partials/header.php';
?>

<!-- ==================== HERO PRODUK ==================== -->
<section class="hero produk-hero" style="--warna: <?= e($app['warna']) ?>">
  <div class="hero-latar" aria-hidden="true">
    <span class="aurora aurora-1"></span>
    <span class="aurora aurora-2"></span>
    <span class="hero-grid"></span>
  </div>

  <div class="wadah hero-isi">
    <div class="hero-teks">
      <a class="lencana masuk" style="--d:.05s" href="index.php#aplikasi">
        <span class="lencana-baru lencana-app"><?= e($app['ikon']) ?></span>
        <span><?= e(t('produk_lencana', $ganti_app)) ?> · <?= e($app['untuk']) ?></span>
        <?= $panah ?>
      </a>
      <h1><?= judul_animasi($app['judul']) ?></h1>
      <p class="hero-sub masuk" style="--d:.7s"><?= e($app['desc']) ?></p>
      <div class="hero-aksi masuk" style="--d:.85s">
        <a class="tombol tombol-utama tombol-besar tombol-kilau" href="<?= e(link_trial($app)) ?>" target="_blank" rel="noopener" data-magnet>
          <?= e(t('coba_trial')) ?> <?= $panah ?>
        </a>
        <a class="tombol tombol-garis tombol-besar" href="index.php#harga" data-magnet><?= e(t('lihat_harga')) ?></a>
      </div>
      <ul class="hero-poin masuk" style="--d:1s">
        <li><?= e(t('poin_gratis')) ?></li>
        <li><?= e(t('poin_install')) ?></li>
        <li><?= e(t('poin_indonesia')) ?></li>
      </ul>
    </div>

    <!-- Setiap aplikasi punya ilustrasi sendiri (lihat partials/ilustrasi/) -->
    <div class="hero-ilus masuk" style="--d:.3s" aria-hidden="true">
      <?php $ilustrasi = $app['kode']; require __DIR__ . '/partials/ilustrasi.php'; ?>
    </div>
  </div>
</section>

<!-- ==================== FITUR ==================== -->
<section class="bagian" id="fitur" style="--warna: <?= e($app['warna']) ?>">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('produk_fitur_label')) ?></p>
      <h2><?= e(t('produk_fitur_judul', $ganti_app)) ?></h2>
    </div>
    <div class="grid grid-3" data-sorot-grup>
      <?php foreach ($app['fitur'] as $f): ?>
        <article class="kartu fitur-kartu muncul" data-sorot>
          <span class="ikon-app ikon-besar" aria-hidden="true"><?= e($f[0]) ?></span>
          <h3><?= e($f[1]) ?></h3>
          <?php if (!empty($f[2])): ?><p><?= e($f[2]) ?></p><?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if (!empty($app['alur'])): ?>
<!-- ==================== CARA KERJA ==================== -->
<section class="bagian bagian-alt" id="cara">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('cara_label')) ?></p>
      <h2><?= e(t('produk_alur_judul', $ganti_app)) ?></h2>
    </div>
    <ol class="langkah" style="--kolom: <?= count($app['alur']) ?>" data-amati>
      <?php foreach ($app['alur'] as $n => $l): ?>
        <li class="muncul">
          <span class="langkah-no" aria-hidden="true"><?= $n + 1 ?></span>
          <div class="kartu langkah-kartu">
            <h3><?= e($l[0]) ?></h3>
            <p><?= e($l[1]) ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>
<?php endif; ?>

<!-- ==================== APLIKASI LAINNYA ==================== -->
<section class="bagian" id="lainnya">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('produk_lain')) ?></p>
      <h2><?= e(t('produk_lain_judul')) ?></h2>
    </div>
    <div class="grid grid-4" data-sorot-grup>
      <?php foreach ($apps_lain as $a): ?>
        <a class="kartu app-mini muncul" href="<?= e(link_produk($a)) ?>" style="--warna: <?= e($a['warna']) ?>" data-sorot>
          <span class="ikon-app" aria-hidden="true"><?= e($a['ikon']) ?></span>
          <strong><?= e($a['nama']) ?></strong>
          <small><?= e($a['untuk']) ?></small>
          <span class="tautan-panah"><?= e(t('pelajari')) ?> <?= $panah ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== AJAKAN TRIAL ==================== -->
<section class="bagian bagian-cta">
  <div class="wadah">
    <div class="cta muncul" data-sorot-grup data-sorot>
      <div class="cta-latar" aria-hidden="true">
        <span class="aurora aurora-1"></span>
        <span class="aurora aurora-2"></span>
      </div>
      <div class="cta-emoji" aria-hidden="true">
        <?php foreach (array_slice($app['fitur'], 0, 4) as $f): ?><span><?= e($f[0]) ?></span><?php endforeach; ?>
      </div>
      <h2><?= e(t('produk_cta_judul', $ganti_app)) ?></h2>
      <p><?= e(t('produk_cta_isi')) ?></p>
      <div class="hero-aksi">
        <a class="tombol tombol-putih tombol-besar" href="<?= e(link_trial($app)) ?>" target="_blank" rel="noopener" data-magnet>🎁 <?= e(t('coba_trial')) ?></a>
        <a class="tombol tombol-garis-putih tombol-besar" href="index.php#harga" data-magnet><?= e(t('lihat_harga')) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
