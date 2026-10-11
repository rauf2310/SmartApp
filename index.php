<?php
require __DIR__ . '/config.php';

$halaman = 'beranda';
$judul   = $site['nama'] . ' — ' . $site['tagline'];

// Isi bagian halaman depan. Tiap teks ditulis dalam 3 bahasa: id, en, zh.
$masalah = terjemahkan([
    [
        'ikon'  => '📒',
        'judul' => ['id' => 'Catatan toko masih di buku', 'en' => 'Shop records still on paper', 'zh' => '店铺还在用本子记账'],
        'isi'   => [
            'id' => 'Penjualan dan stok ditulis manual, sering salah hitung, dan untung-rugi tidak jelas.',
            'en' => 'Sales and stock are written by hand, often miscalculated, and profit is never clear.',
            'zh' => '销售和库存靠手写，经常算错，赚了还是亏了也说不清。',
        ],
    ],
    [
        'ikon'  => '📱',
        'judul' => ['id' => 'Pesanan online berantakan', 'en' => 'Online orders all over the place', 'zh' => '网店订单一团乱'],
        'isi'   => [
            'id' => 'Pesanan dari WhatsApp dan marketplace dicatat satu-satu, stok sering tidak sama.',
            'en' => 'Orders from WhatsApp and marketplaces are recorded one by one, and stock rarely matches.',
            'zh' => 'WhatsApp 和电商平台的订单逐一手动记录，库存经常对不上。',
        ],
    ],
    [
        'ikon'  => '🧮',
        'judul' => ['id' => 'Gaji dihitung manual', 'en' => 'Payroll done by hand', 'zh' => '工资还在手工计算'],
        'isi'   => [
            'id' => 'Rekap absen, lembur, dan potongan pakai kalkulator tiap akhir bulan. Rawan salah.',
            'en' => 'Attendance, overtime, and deductions are tallied with a calculator every month-end. Easy to get wrong.',
            'zh' => '每到月底都要用计算器汇总考勤、加班和扣款，很容易出错。',
        ],
    ],
    [
        'ikon'  => '🖥️',
        'judul' => ['id' => 'Aset IT kantor tidak terdata', 'en' => 'Office IT assets untracked', 'zh' => '办公室 IT 资产没有登记'],
        'isi'   => [
            'id' => 'Laptop, lisensi, dan keluhan karyawan tercecer di chat. Sulit dilacak siapa memegang apa.',
            'en' => 'Laptops, licenses, and staff complaints are scattered across chats. Hard to tell who has what.',
            'zh' => '电脑、许可证和员工报修散落在聊天记录里，谁在用什么很难追踪。',
        ],
    ],
]);

// 'jenis' menentukan gambar animasi di tiap kotak (lihat bagian KEUNGGULAN di bawah)
$keunggulan = terjemahkan([
    [
        'jenis' => 'trial',
        'judul' => ['id' => 'Coba gratis 14 hari', 'en' => 'Free for 14 days', 'zh' => '免费试用 14 天'],
        'isi'   => [
            'id' => 'Setiap aplikasi bisa dicoba dulu dengan semua fiturnya. Cocok, lanjut berlangganan. Tidak cocok, berhenti tanpa biaya.',
            'en' => 'Try each app with every feature first. Like it? Subscribe. Not for you? Stop at no cost.',
            'zh' => '每款应用都能先体验全部功能。满意就订阅，不满意随时停止，不收任何费用。',
        ],
    ],
    [
        'jenis' => 'perangkat',
        'judul' => ['id' => 'Bisa di semua perangkat', 'en' => 'Works on every device', 'zh' => '所有设备通用'],
        'isi'   => [
            'id' => 'Buka dari HP, tablet, atau laptop. Tampilan otomatis menyesuaikan layar.',
            'en' => 'Open it on your phone, tablet, or laptop. The layout adapts to any screen.',
            'zh' => '手机、平板、电脑均可打开，界面自动适配屏幕。',
        ],
    ],
    [
        'jenis' => 'petir',
        'judul' => ['id' => 'Tanpa install', 'en' => 'No installation', 'zh' => '无需安装'],
        'isi'   => [
            'id' => 'Cukup buka di browser. Mau terasa seperti aplikasi? Pasang ke layar utama HP.',
            'en' => 'Just open it in your browser. Want it to feel like an app? Add it to your home screen.',
            'zh' => '打开浏览器即可使用。想要像 App 一样？添加到手机主屏幕即可。',
        ],
    ],
    [
        'jenis' => 'aman',
        'judul' => ['id' => 'Data tersimpan online', 'en' => 'Data stored online', 'zh' => '数据云端保存'],
        'isi'   => [
            'id' => 'HP hilang atau rusak, data usaha tetap aman di akunmu.',
            'en' => 'Lose or break your phone and your business data is still safe in your account.',
            'zh' => '手机丢了或坏了，生意数据依然安全保存在你的账号里。',
        ],
    ],
    [
        'jenis' => 'harga',
        'judul' => ['id' => 'Bayar yang dipakai saja', 'en' => 'Pay only for what you use', 'zh' => '用多少付多少'],
        'isi'   => [
            'id' => 'Setiap aplikasi dijual terpisah. Bayar hanya untuk aplikasi yang kamu butuhkan.',
            'en' => 'Each app is sold separately. Only pay for the apps you need.',
            'zh' => '每款应用单独销售，只为你需要的应用付费。',
        ],
    ],
    [
        'jenis' => 'chat',
        'judul' => ['id' => 'Dibantu sampai bisa', 'en' => 'Help until you get it', 'zh' => '手把手教到会'],
        'isi'   => [
            'id' => 'Bingung cara pakai? Tanya langsung lewat WhatsApp.',
            'en' => 'Not sure how to use it? Ask us directly on WhatsApp.',
            'zh' => '不会用？直接在 WhatsApp 上问我们。',
        ],
    ],
]);

$langkah = terjemahkan([
    [
        ['id' => 'Pilih aplikasi', 'en' => 'Choose an app', 'zh' => '选择应用'],
        ['id' => 'Lihat daftar aplikasi dan pilih yang sesuai kebutuhan usaha atau kantormu.', 'en' => 'Browse the apps and pick the one that fits your business or office.', 'zh' => '浏览应用列表，选择适合你生意或办公室的那一款。'],
    ],
    [
        ['id' => 'Coba gratis 14 hari', 'en' => 'Try it free for 14 days', 'zh' => '免费试用 14 天'],
        ['id' => 'Aktifkan trial tanpa bayar di muka. Semua fitur bisa langsung dicoba.', 'en' => 'Start the trial with nothing to pay upfront. Every feature is ready to try.', 'zh' => '无需预付即可开始试用，全部功能随时体验。'],
    ],
    [
        ['id' => 'Lanjut berlangganan', 'en' => 'Keep going', 'zh' => '继续订阅'],
        ['id' => 'Cocok? Pilih paket dan lanjutkan. Tidak cocok? Cukup berhenti, tanpa biaya.', 'en' => 'Like it? Pick a plan and carry on. Not for you? Just stop, at no cost.', 'zh' => '满意就选择套餐继续使用；不满意直接停止，不收任何费用。'],
    ],
]);

// Aplikasi utama (tanpa kotak "aplikasi lainnya")
$apps_utama = array_values(array_filter($apps, function ($app) {
    return $app['kode'] !== 'lainnya';
}));

// Angka di bawah hero. 'angka' akan dihitung naik saat terlihat.
$statistik = [
    ['angka' => count($apps_utama), 'akhiran' => '+',  'label' => t('stat_aplikasi')],
    ['angka' => HARI_TRIAL,         'akhiran' => '',   'label' => t('stat_trial')],
    ['angka' => 100,                'akhiran' => '%',  'label' => t('stat_web')],
    ['angka' => 24,                 'akhiran' => '/7', 'label' => t('stat_akses')],
];

// Ikon perangkat (dipakai di dua tempat)
$ikon_perangkat = [
    'laptop' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="5" width="16" height="11" rx="1.5"/><path d="M2 19h20"/></svg>',
    'tablet' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4.5" y="2.5" width="15" height="19" rx="2"/><path d="M11 18.5h2"/></svg>',
    'hp'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2"/><path d="M11 18.5h2"/></svg>',
];
$panah = '<svg class="panah" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

require __DIR__ . '/partials/header.php';
?>

<!-- ==================== HERO ==================== -->
<section class="hero" id="beranda">
  <div class="hero-latar" aria-hidden="true">
    <span class="aurora aurora-1"></span>
    <span class="aurora aurora-2"></span>
    <span class="aurora aurora-3"></span>
    <span class="hero-grid"></span>
  </div>

  <div class="wadah hero-isi">
    <div class="hero-teks">
      <a class="lencana masuk" style="--d:.05s" href="#aplikasi">
        <span class="lencana-baru"><?= e(t('hero_baru')) ?></span>
        <span><?= e(t('hero_lencana')) ?></span>    
        <?= $panah ?>
      </a>
      <h1><?= judul_animasi(t('hero_judul')) ?></h1>
      <p class="hero-sub masuk" style="--d:.75s"><?= e($site['deskripsi']) ?></p>
      <div class="hero-aksi masuk" style="--d:.9s">
        <a class="tombol tombol-utama tombol-besar tombol-kilau" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener" data-magnet>
          <?= e(t('coba_gratis')) ?> <?= $panah ?>
        </a>
        <a class="tombol tombol-garis tombol-besar" href="aplikasi.php" data-magnet>
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.5v13a1 1 0 0 0 1.5.86l10.6-6.5a1 1 0 0 0 0-1.72L9.5 4.64A1 1 0 0 0 8 5.5z"/></svg>
          <?= e(t('lihat_demo')) ?>
        </a>
      </div>
      <ul class="hero-poin masuk" style="--d:1.05s">
        <li><?= e(t('poin_install')) ?></li>
        <li><?= e(t('poin_gratis')) ?></li>
        <li><?= e(t('poin_indonesia')) ?></li>
      </ul>
    </div>

    <!-- Laptop + HP berisi semua aplikasi (lihat partials/ilustrasi/beranda.php) -->
    <div class="hero-ilus masuk" style="--d:.35s" aria-hidden="true">
      <?php $ilustrasi = 'beranda'; require __DIR__ . '/partials/ilustrasi.php'; ?>
    </div>
  </div>

  <div class="wadah">
    <ul class="statistik">
      <?php foreach ($statistik as $s): ?>
        <li class="stat muncul">
          <?php if (isset($s['angka'])): ?>
            <strong data-hitung="<?= $s['angka'] ?>" data-akhiran="<?= e($s['akhiran']) ?>"><?= $s['angka'] . e($s['akhiran']) ?></strong>
          <?php else: ?>
            <strong><?= e($s['teks']) ?></strong>
          <?php endif; ?>
          <span><?= e($s['label']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php if ($klien): ?>
      <!-- Daftar klien (diatur di $klien pada config.php) -->
      <div class="dipercaya muncul">
        <p class="dipercaya-judul"><?= e(t('dipercaya_judul')) ?></p>
        <ul class="klien">
          <?php foreach ($klien as $n => $k): ?>
            <li style="--i:<?= $n ?>"><span class="klien-ikon" aria-hidden="true"><?= e($k['ikon']) ?></span><?= e($k['nama']) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ==================== PITA BERJALAN ==================== -->
<div class="marquee" aria-hidden="true">
  <div class="marquee-jalur">
    <?php for ($salinan = 0; $salinan < 2; $salinan++): ?>
      <?php foreach ($apps as $app): ?>
        <span class="marquee-item marquee-app" style="--warna: <?= e($app['warna']) ?>">
          <span class="ikon-app"><?= e($app['ikon']) ?></span>
          <?= e($app['nama']) ?>
        </span>
        <?php foreach ($app['fitur'] as $f): ?>
          <span class="marquee-item" style="--warna: <?= e($app['warna']) ?>"><?= e($f[0]) ?> <?= e($f[1]) ?></span>
        <?php endforeach; ?>
      <?php endforeach; ?>
    <?php endfor; ?>
  </div>
</div>

<!-- ==================== MASALAH ==================== -->
<section class="bagian" id="masalah">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('masalah_label')) ?></p>
      <h2><?= e(t('masalah_judul')) ?></h2>
    </div>
    <div class="grid grid-4" data-sorot-grup>
      <?php foreach ($masalah as $m): ?>
        <article class="kartu kartu-masalah muncul" data-sorot>
          <span class="emoji" aria-hidden="true"><?= $m['ikon'] ?></span>
          <h3><?= e($m['judul']) ?></h3>
          <p><?= e($m['isi']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
    <p class="solusi muncul">
      <span class="solusi-ikon" aria-hidden="true">✓</span>
      <span><strong><?= e($site['nama']) ?></strong> <?= e(t('solusi')) ?></span>
    </p>
  </div>
</section>

<!-- ==================== DAFTAR APLIKASI ==================== -->
<section class="bagian bagian-alt" id="aplikasi">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('apps_label')) ?></p>
      <h2><?= e(t('apps_judul')) ?></h2>
      <p><?= e(t('apps_sub')) ?></p>
    </div>
    <div class="grid grid-apps" data-sorot-grup>
      <?php foreach ($apps as $app): ?>
        <article class="kartu kartu-app<?= $app['kode'] === 'lainnya' ? ' kartu-app-lainnya' : '' ?> muncul" style="--warna: <?= e($app['warna']) ?>" data-sorot>
          <span class="app-latar" aria-hidden="true"><?= e($app['ikon']) ?></span>
          <div class="app-kepala">
            <span class="ikon-app ikon-besar" aria-hidden="true"><?= e($app['ikon']) ?></span>
            <div>
              <h3>
                <?= e($app['nama']) ?>
                <?php if ($app['status'] === 'tersedia'): ?>
                  <span class="badge badge-ok"><?= e(t('tersedia')) ?></span>
                <?php else: ?>
                  <span class="badge"><?= e(t('segera')) ?></span>
                <?php endif; ?>
              </h3>
              <p class="app-untuk"><?= e(t('untuk', ['{isi}' => $app['untuk']])) ?></p>
            </div>
          </div>
          <p><?= e($app['desc']) ?></p>
          <ul class="app-fitur" aria-label="<?= e(t('fitur')) ?>">
            <?php foreach ($app['fitur'] as $n => $f): ?>
              <li style="--i:<?= $n ?>"><span aria-hidden="true"><?= e($f[0]) ?></span> <?= e($f[1]) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="app-aksi">
            <?php if ($app['kode'] === 'lainnya'): ?>
              <a class="tautan-panah" href="<?= e(link_trial($app)) ?>" target="_blank" rel="noopener"><?= e(t('request_app')) ?> <?= $panah ?></a>
            <?php else: ?>
              <a class="tombol tombol-garis tombol-kecil" href="<?= e(link_produk($app)) ?>"><?= e(t('pelajari')) ?></a>
              <a class="tautan-panah" href="<?= e(link_trial($app)) ?>" target="_blank" rel="noopener"><?= e(t('coba_trial')) ?> <?= $panah ?></a>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="tengah muncul">
      <a class="tombol tombol-garis" href="aplikasi.php"><?= e(t('apps_demo')) ?> <?= $panah ?></a>
    </div>
  </div>
</section>

<!-- ==================== KEUNGGULAN (BENTO) ==================== -->
<section class="bagian" id="keunggulan">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('keunggulan_label')) ?></p>
      <h2><?= e(t('keunggulan_judul')) ?></h2>
      <p><?= e(t('keunggulan_sub')) ?></p>
    </div>
    <div class="bento" data-sorot-grup>
      <?php foreach ($keunggulan as $k): ?>
        <article class="kartu bento-item bento-<?= $k['jenis'] ?> muncul" data-sorot>
          <div class="bento-visual" aria-hidden="true">
            <?php if ($k['jenis'] === 'trial'): ?>
              <!-- Kalender 14 hari yang terisi satu per satu -->
              <div class="trial">
                <div class="trial-kepala">
                  <span class="trial-label">🎁 <?= e(t('trial_label')) ?></span>
                  <span class="trial-jumlah"><b><?= HARI_TRIAL ?></b> <?= e(t('trial_hari')) ?></span>
                </div>
                <div class="trial-hari">
                  <?php for ($h = 1; $h <= HARI_TRIAL; $h++): ?>
                    <span style="--i:<?= $h - 1 ?>"><?= $h ?></span>
                  <?php endfor; ?>
                </div>
                <div class="trial-bar"><i></i></div>
                <span class="trial-lanjut">✓ <?= e(t('trial_lanjut')) ?></span>
              </div>
            <?php elseif ($k['jenis'] === 'perangkat'): ?>
              <div class="perangkat-mini">
                <?php $n = 0; foreach ($ikon_perangkat as $svg): ?>
                  <span style="--i:<?= $n++ ?>"><?= $svg ?></span>
                <?php endforeach; ?>
              </div>
            <?php elseif ($k['jenis'] === 'petir'): ?>
              <span class="lingkar-ikon lingkar-petir">⚡</span>
            <?php elseif ($k['jenis'] === 'aman'): ?>
              <span class="lingkar-ikon lingkar-aman">🔒</span>
            <?php elseif ($k['jenis'] === 'harga'): ?>
              <!-- Pilih aplikasi satu per satu -->
              <div class="perangkat-mini pilih-app">
                <?php foreach (array_slice($apps_utama, 0, 3) as $n => $app): ?>
                  <span style="--i:<?= $n ?>"><?= e($app['ikon']) ?></span>
                <?php endforeach; ?>
              </div>
            <?php elseif ($k['jenis'] === 'chat'): ?>
              <div class="chat">
                <p class="chat-gelembung chat-tanya"><?= e(t('chat_tanya')) ?></p>
                <div class="chat-balas">
                  <p class="chat-gelembung chat-ketik"><i></i><i></i><i></i></p>
                  <p class="chat-gelembung chat-jawab"><?= e(t('chat_jawab')) ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="bento-teks">
            <h3><?= e($k['judul']) ?></h3>
            <p><?= e($k['isi']) ?></p>
            <?php if ($k['jenis'] === 'chat'): ?>
              <a class="tautan-panah" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener"><?= e(t('cta_wa')) ?> <?= $panah ?></a>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== PERANGKAT & PASANG DI HP ==================== -->
<section class="bagian bagian-alt" id="perangkat">
  <div class="wadah perangkat">
    <div class="muncul">
      <p class="label"><?= e(t('perangkat_label')) ?></p>
      <h2><?= e(t('perangkat_judul')) ?></h2>
      <p><?= e(t('perangkat_isi')) ?></p>
      <div class="ikon-perangkat">
        <?php foreach ($ikon_perangkat as $jenis => $svg): ?>
          <span><?= $svg ?> <?= e(t($jenis)) ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="kartu kartu-pasang muncul">
      <span class="lingkar-ikon lingkar-kecil" aria-hidden="true">📲</span>
      <h3><?= e(t('pasang_judul')) ?></h3>
      <p><?= e(t('pasang_sub')) ?></p>
      <button class="tombol tombol-utama" type="button" data-pasang hidden><?= e(t('pasang_tombol')) ?></button>
      <ol>
        <li><strong>Android (Chrome)</strong><span><?= t('pasang_android_html') ?></span></li>
        <li><strong>iPhone / iPad (Safari)</strong><span><?= t('pasang_ios_html') ?></span></li>
      </ol>
    </div>
  </div>
</section>

<!-- ==================== CARA KERJA ==================== -->
<section class="bagian" id="cara">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('cara_label')) ?></p>
      <h2><?= e(t('cara_judul')) ?></h2>
    </div>
    <ol class="langkah" data-amati>
      <?php foreach ($langkah as $n => $l): ?>
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

<?php if ($testimoni):
  // Dua baris yang bergerak berlawanan arah (satu baris saja kalau testimoninya sedikit)
  $baris_testi = count($testimoni) >= 4 ? array_chunk($testimoni, (int) ceil(count($testimoni) / 2)) : [$testimoni];
  $app_per_kode = array_column($apps, null, 'kode');
?>
<!-- ==================== TESTIMONI ==================== -->
<section class="bagian" id="testimoni">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('testi_label')) ?></p>
      <h2><?= e(t('testi_judul')) ?></h2>
      <p><?= e(t('testi_sub')) ?></p>
    </div>
  </div>
  <div class="testi muncul">
    <?php foreach ($baris_testi as $b => $baris): ?>
      <div class="testi-baris<?= $b % 2 ? ' testi-balik' : '' ?>">
        <div class="testi-jalur">
          <?php for ($salinan = 0; $salinan < 4; $salinan++): ?>
            <?php foreach ($baris as $tm):
              $app = $app_per_kode[$tm['app']] ?? $apps[0];
              $bintang = max(1, min(5, (int) $tm['bintang']));
            ?>
              <figure class="kartu testi-kartu" style="--warna: <?= e($app['warna']) ?>"<?= $salinan ? ' aria-hidden="true"' : '' ?>>
                <span class="testi-kutip" aria-hidden="true">“</span>
                <span class="testi-bintang" role="img" aria-label="<?= e(t('bintang_label', ['{n}' => $bintang])) ?>"><?= str_repeat('★', $bintang) ?></span>
                <blockquote class="testi-isi"><?= e($tm['isi']) ?></blockquote>
                <figcaption class="testi-orang">
                  <span class="testi-avatar" aria-hidden="true"><?= e(inisial($tm['nama'])) ?></span>
                  <span><strong><?= e($tm['nama']) ?></strong><small><?= e($tm['peran']) ?> · <?= e($tm['usaha']) ?></small></span>
                </figcaption>
                <span class="testi-app"><?= e($app['ikon']) ?> <?= e(t('pakai_app', ['{app}' => $app['nama']])) ?></span>
              </figure>
            <?php endforeach; ?>
          <?php endfor; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<!-- ==================== HARGA ==================== -->
<section class="bagian bagian-alt" id="harga">
  <div class="wadah">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('harga_label')) ?></p>
      <h2><?= e(t('harga_judul')) ?></h2>
      <p><?= e(t('harga_sub')) ?></p>
      <div class="pilih-periode" role="group" aria-label="<?= e(t('periode')) ?>">
        <button type="button" data-periode="bulanan" aria-pressed="true"><?= e(t('bulanan')) ?></button>
        <button type="button" data-periode="tahunan" aria-pressed="false"><?= e(t('tahunan')) ?> <span class="hemat"><?= e(t('hemat')) ?></span></button>
      </div>
    </div>

    <div class="grid grid-3 grid-harga">
      <?php foreach ($paket as $p):
        $trial   = $p['harga'] === 0;
        $bulanan = rupiah($p['harga']);
        $tahunan = rupiah($p['harga'] * KALI_TAHUNAN);
      ?>
        <article class="kartu kartu-harga<?= $p['unggulan'] ? ' unggulan' : '' ?> muncul">
          <?php if ($p['unggulan']): ?><span class="pita">✦ <?= e(t('rekomendasi')) ?></span><?php endif; ?>
          <h3><?= e($p['nama']) ?></h3>
          <p class="ket"><?= e($p['ket']) ?></p>
          <p class="harga">
            <strong data-bulanan="<?= e($bulanan) ?>" data-tahunan="<?= e($tahunan) ?>"><?= e($bulanan) ?></strong>
            <?php if ($trial): ?>
              <span><?= e(t('per_trial')) ?></span>
            <?php else: ?>
              <span data-bulanan="<?= e(t('per_bulan')) ?>" data-tahunan="<?= e(t('per_tahun')) ?>"><?= e(t('per_bulan')) ?></span>
            <?php endif; ?>
          </p>
          <ul class="daftar-cek">
            <?php foreach ($p['fitur'] as $f): ?>
              <li><?= e($f) ?></li>
            <?php endforeach; ?>
          </ul>
          <a class="tombol <?= $p['unggulan'] ? 'tombol-utama tombol-kilau' : 'tombol-garis' ?> tombol-penuh"
             href="<?= e(link_wa($trial ? $site['pesan_wa'] : t('wa_paket', ['{paket}' => $p['nama']]))) ?>"
             target="_blank" rel="noopener"><?= e($trial ? t('mulai_gratis') : t('pilih_paket', ['{paket}' => $p['nama']])) ?></a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== FAQ ==================== -->
<section class="bagian" id="faq">
  <div class="wadah wadah-sempit">
    <div class="judul-bagian muncul">
      <p class="label"><?= e(t('faq_label')) ?></p>
      <h2><?= e(t('faq_judul')) ?></h2>
    </div>
    <div class="faq">
      <?php foreach ($faq as $i => $item): ?>
        <details class="muncul" name="faq"<?= $i === 0 ? ' open' : '' ?>>
          <summary><?= e($item[0]) ?><span class="faq-ikon" aria-hidden="true"></span></summary>
          <p><?= e($item[1]) ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== AJAKAN & KONTAK ==================== -->
<section class="bagian bagian-cta" id="kontak">
  <div class="wadah">
    <div class="cta muncul" data-sorot-grup data-sorot>
      <div class="cta-latar" aria-hidden="true">
        <span class="aurora aurora-1"></span>
        <span class="aurora aurora-2"></span>
      </div>
      <div class="cta-emoji" aria-hidden="true">
        <span>🧾</span><span>📦</span><span>💰</span><span>📊</span>
      </div>
      <h2><?= e(t('cta_judul')) ?></h2>
      <p><?= e(t('cta_isi')) ?></p>
      <div class="hero-aksi">
        <a class="tombol tombol-putih tombol-besar" href="<?= e(link_wa($site['pesan_wa'])) ?>" target="_blank" rel="noopener" data-magnet>💬 <?= e(t('cta_wa')) ?></a>
        <a class="tombol tombol-garis-putih tombol-besar" href="mailto:<?= e($site['email']) ?>" data-magnet>✉️ <?= e($site['email']) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
