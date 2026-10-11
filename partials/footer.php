<?php defined('UMKM') or exit('Akses langsung tidak diizinkan.'); ?>
</main>

<footer class="kaki">
  <div class="wadah">
    <div class="kaki-isi">
      <div class="kaki-merek-kecil">
        <a class="logo" href="index.php">
          <img src="assets/img/logo-ikon.png" alt="" width="32" height="32">
          <span><?= e($site['nama']) ?></span>
        </a>
        <p><?= e($site['tagline']) ?></p>
      </div>
      <nav class="kaki-kolom" aria-label="<?= e(t('kaki_produk')) ?>">
        <p class="kaki-judul"><?= e(t('kaki_produk')) ?></p>
        <?php foreach ($menu_produk as $item): ?>
          <a href="<?= e(link_produk($item)) ?>"><?= e($item['nama']) ?></a>
        <?php endforeach; ?>
      </nav>
      <nav class="kaki-kolom" aria-label="<?= e(t('kaki_nav')) ?>">
        <p class="kaki-judul"><?= e(t('kaki_menu')) ?></p>
        <a href="<?= $base ?>#aplikasi"><?= e(t('nav_aplikasi')) ?></a>
        <a href="<?= $base ?>#harga"><?= e(t('nav_harga')) ?></a>
        <a href="<?= $base ?>#faq"><?= e(t('nav_faq')) ?></a>
        <a href="aplikasi.php"><?= e(t('nav_demo')) ?></a>
      </nav>
      <div class="kaki-kolom">
        <p class="kaki-judul"><?= e(t('kaki_kontak')) ?></p>
        <a href="<?= e(link_wa()) ?>" target="_blank" rel="noopener">WhatsApp</a>
        <a href="mailto:<?= e($site['email']) ?>"><?= e(t('email')) ?></a>
      </div>
    </div>
    <div class="kaki-bawah">
      <small>&copy; <?= date('Y') ?> <?= e($site['nama']) ?>. <?= e(t('hak_cipta')) ?></small>
    </div>
  </div>
  <p class="kaki-merek" aria-hidden="true" style="--huruf: <?= max(4, mb_strlen($site['nama'])) ?>"><?= e($site['nama']) ?></p>
</footer>

<!-- Tombol chat WhatsApp melayang -->
<a class="wa-melayang" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener" aria-label="<?= e(t('wa_label')) ?>">
  <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 3C7 3 3 6.6 3 11c0 2.3 1.1 4.4 2.9 5.9L5 21l4.3-2.1c.9.2 1.8.3 2.7.3 5 0 9-3.6 9-8s-4-8-9-8z"/></svg>
</a>

<script src="<?= e(aset('assets/js/main.js')) ?>" defer></script>
</body>
</html>
