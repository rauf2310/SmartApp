<?php
require __DIR__ . '/config.php';

$halaman = 'aplikasi';
$judul   = t('demo_judul');

require __DIR__ . '/partials/header.php';
?>

<section class="dash">
  <div class="wadah">
    <div class="info-demo">
      <span aria-hidden="true">👀</span>
      <span><?= t('demo_info_html') ?></span>
    </div>

    <div class="dash-kepala">
      <div>
        <h1><?= e(t('demo_heading')) ?></h1>
        <p class="dash-keterangan"><?= e(t('demo_sub')) ?></p>
      </div>
      <button class="tombol tombol-utama tombol-kecil" type="button" data-pasang hidden><?= e(t('pasang_hp')) ?></button>
    </div>

    <div class="peluncur muncul">
      <?php foreach ($apps as $app): ?>
        <button type="button" class="peluncur-app"
          data-app
          data-ikon="<?= e($app['ikon']) ?>"
          data-warna="<?= e($app['warna']) ?>"
          data-nama="<?= e($app['nama']) ?>"
          data-desc="<?= e($app['desc']) ?>"
          data-fitur="<?= e(json_encode($app['fitur'], JSON_UNESCAPED_UNICODE)) ?>"
          data-wa="<?= e(link_trial($app)) ?>"
          data-cta="<?= e($app['kode'] === 'lainnya' ? t('request_app') : t('coba_trial')) ?>">
          <span class="ikon-app" style="--warna: <?= e($app['warna']) ?>" aria-hidden="true"><?= e($app['ikon']) ?></span>
          <span class="peluncur-nama"><?= e($app['nama']) ?></span>
          <span class="peluncur-untuk"><?= e($app['untuk']) ?></span>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Jendela info aplikasi (muncul saat ikon aplikasi diklik) -->
<dialog class="dialog-app" aria-labelledby="dialog-nama" data-dialog-app>
  <div class="dialog-isi">
    <span class="ikon-app ikon-besar" aria-hidden="true" data-d-ikon></span>
    <h2 id="dialog-nama" data-d-nama></h2>
    <p data-d-desc></p>
    <ul class="app-fitur dialog-fitur" aria-label="<?= e(t('fitur')) ?>" data-d-fitur></ul>
    <span class="badge"><?= e(t('segera_hadir')) ?></span>
    <div class="dialog-aksi">
      <a class="tombol tombol-utama" href="#" target="_blank" rel="noopener" data-d-wa><?= e(t('coba_trial')) ?></a>
      <form method="dialog"><button class="tombol tombol-garis" type="submit"><?= e(t('tutup')) ?></button></form>
    </div>
  </div>
</dialog>

<?php require __DIR__ . '/partials/footer.php'; ?>
