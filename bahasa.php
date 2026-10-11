<?php
/**
 * ============================================================
 *  TEKS WEBSITE DALAM 3 BAHASA
 *  id = Indonesia, en = English, zh = 中文 (Mandarin sederhana)
 *  Dipanggil di halaman dengan t('kunci'). {nama} = nama usaha.
 *  Kunci yang berakhiran _html boleh berisi tag seperti <b>.
 * ============================================================
 */
defined('UMKM') or exit('Akses langsung tidak diizinkan.');

$teks = [
    /* ---------- Header & menu ---------- */
    'lewati'         => ['id' => 'Lewati ke konten', 'en' => 'Skip to content', 'zh' => '跳到主要内容'],
    'menu_buka'      => ['id' => 'Buka menu', 'en' => 'Open menu', 'zh' => '打开菜单'],
    'menu_tutup'     => ['id' => 'Tutup menu', 'en' => 'Close menu', 'zh' => '关闭菜单'],
    'menu_utama'     => ['id' => 'Menu utama', 'en' => 'Main menu', 'zh' => '主菜单'],
    'nav_aplikasi'   => ['id' => 'Aplikasi', 'en' => 'Apps', 'zh' => '应用'],
    'nav_produk'     => ['id' => 'Produk', 'en' => 'Products', 'zh' => '产品'],
    'menu_semua'     => ['id' => 'Lihat semua aplikasi', 'en' => 'See all apps', 'zh' => '查看全部应用'],
    'kaki_menu'      => ['id' => 'Menu', 'en' => 'Menu', 'zh' => '菜单'],
    'nav_keunggulan' => ['id' => 'Keunggulan', 'en' => 'Features', 'zh' => '优势'],
    'nav_harga'      => ['id' => 'Harga', 'en' => 'Pricing', 'zh' => '价格'],
    'nav_faq'        => ['id' => 'FAQ', 'en' => 'FAQ', 'zh' => '常见问题'],
    'nav_demo'       => ['id' => 'Demo', 'en' => 'Demo', 'zh' => '演示'],
    'coba_gratis'    => ['id' => 'Coba Gratis', 'en' => 'Try for Free', 'zh' => '免费试用'],
    'tema_label'     => ['id' => 'Mode gelap', 'en' => 'Dark mode', 'zh' => '深色模式'],
    'bahasa_label'   => ['id' => 'Pilih bahasa', 'en' => 'Choose language', 'zh' => '选择语言'],

    /* ---------- Hero ---------- */
    'hero_baru'      => ['id' => 'Baru', 'en' => 'New', 'zh' => '全新'],
    'hero_lencana'   => [
        'id' => 'Setiap aplikasi bisa dicoba gratis 14 hari',
        'en' => 'Try every app free for 14 days',
        'zh' => '每款应用均可免费试用 14 天',
    ],
    // Bagian di dalam [ ] diberi warna sorot + garis coretan
    'hero_judul'     => [
        'id' => 'Semua [aplikasi] untuk usaha & kantormu',
        'en' => 'Every [app] your business & office needs',
        'zh' => '生意和办公所需的[应用]，一站集齐',
    ],
    'lihat_demo'     => ['id' => 'Lihat Demo', 'en' => 'See Demo', 'zh' => '查看演示'],
    'poin_install'   => ['id' => 'Tanpa install', 'en' => 'No install', 'zh' => '无需安装'],
    'poin_gratis'    => ['id' => 'Trial gratis 14 hari', 'en' => '14-day free trial', 'zh' => '免费试用 14 天'],
    'poin_indonesia' => ['id' => 'Berbahasa Indonesia', 'en' => 'Made for Indonesia', 'zh' => '专为印尼设计'],

    // Ilustrasi laptop + HP di hero halaman depan (data contoh)
    'ilus_app_saya'  => ['id' => 'Aplikasi saya', 'en' => 'My apps', 'zh' => '我的应用'],
    'hp_sapa'        => ['id' => 'Halo, Toko Bu Sari 👋', 'en' => 'Hi, Bu Sari’s Shop 👋', 'zh' => '你好，Sari 阿姨的小店 👋'],
    'hp_trial'       => ['id' => 'Trial · sisa 14 hari', 'en' => 'Trial · 14 days left', 'zh' => '试用中 · 剩余 14 天'],
    'hp_penjualan'   => ['id' => 'Penjualan hari ini', 'en' => 'Today’s sales', 'zh' => '今日销售额'],
    'hp_naik'        => ['id' => '▲ 12% dari kemarin', 'en' => '▲ 12% vs yesterday', 'zh' => '▲ 较昨日增长 12%'],
    'km1_judul'      => ['id' => 'Transaksi baru', 'en' => 'New transaction', 'zh' => '新交易'],
    'km2_judul'      => ['id' => 'Trial gratis aktif', 'en' => 'Free trial started', 'zh' => '免费试用已开启'],
    'km2_isi'        => ['id' => '14 hari, semua fitur terbuka', 'en' => '14 days, every feature unlocked', 'zh' => '14 天，全部功能开放'],

    // Angka di bawah hero
    'stat_aplikasi'  => ['id' => 'Aplikasi siap dipakai', 'en' => 'Ready-to-use apps', 'zh' => '款现成应用'],
    'stat_trial'     => ['id' => 'Hari coba gratis', 'en' => 'Days of free trial', 'zh' => '天免费试用'],
    'stat_web'       => ['id' => 'Berbasis web, tanpa install', 'en' => 'Web-based, no install', 'zh' => '基于网页，无需安装'],
    'stat_akses'     => ['id' => 'Akses kapan saja', 'en' => 'Access anytime', 'zh' => '随时随地访问'],

    /* ---------- Klien & testimoni ---------- */
    'dipercaya_judul' => [
        'id' => 'Sudah dipakai di berbagai perusahaan dan toko',
        'en' => 'Already used by companies and shops',
        'zh' => '已有多家企业和店铺在使用',
    ],
    'testi_label'    => ['id' => 'Testimoni', 'en' => 'Testimonials', 'zh' => '用户评价'],
    'testi_judul'    => ['id' => 'Kata mereka yang sudah memakai', 'en' => 'What our customers say', 'zh' => '听听用户怎么说'],
    'testi_sub'      => [
        'id' => 'Dari warung kecil sampai kantor, ini pengalaman mereka memakai aplikasi {nama}.',
        'en' => 'From small shops to offices, here is how they get on with {nama} apps.',
        'zh' => '从小店到办公室，看看他们使用 {nama} 应用的体验。',
    ],
    'pakai_app'      => ['id' => 'Pakai {app}', 'en' => 'Uses {app}', 'zh' => '使用{app}'],
    'bintang_label'  => ['id' => '{n} dari 5 bintang', 'en' => '{n} out of 5 stars', 'zh' => '{n} 星（满分 5 星）'],

    /* ---------- Masalah ---------- */
    'masalah_label'  => ['id' => 'Masalah UMKM', 'en' => 'The problem', 'zh' => '经营痛点'],
    'masalah_judul'  => ['id' => 'Masih kerepotan seperti ini?', 'en' => 'Still struggling with this?', 'zh' => '还在为这些烦恼吗？'],
    'solusi'         => [
        'id' => 'punya aplikasi untuk semuanya. Coba gratis 14 hari.',
        'en' => 'has an app for each of these. Try it free for 14 days.',
        'zh' => '为每个问题都准备了应用，免费试用 14 天。',
    ],

    /* ---------- Daftar aplikasi ---------- */
    'apps_label'     => ['id' => 'Aplikasi', 'en' => 'Apps', 'zh' => '应用'],
    'apps_judul'     => ['id' => 'Banyak aplikasi, pilih sesuai kebutuhan', 'en' => 'Many apps, pick what you need', 'zh' => '多款应用，按需选择'],
    'apps_sub'       => [
        'id' => 'Untuk toko, kantor, atau catatan pribadi. Setiap aplikasi dijual terpisah dan bisa dicoba gratis 14 hari.',
        'en' => 'For your shop, your office, or your personal notes. Each app is sold separately and comes with a 14-day free trial.',
        'zh' => '适用于店铺、办公室或个人笔记。每款应用单独销售，均可免费试用 14 天。',
    ],
    'coba_trial'     => ['id' => 'Coba gratis 14 hari', 'en' => 'Try free for 14 days', 'zh' => '免费试用 14 天'],
    'wa_trial'       => [
        'id' => 'Halo {nama}, saya ingin coba gratis 14 hari aplikasi {app}.',
        'en' => 'Hi {nama}, I would like to start the 14-day free trial of the {app} app.',
        'zh' => '你好 {nama}，我想免费试用 14 天{app}应用。',
    ],
    'tersedia'       => ['id' => 'Tersedia', 'en' => 'Available', 'zh' => '已上线'],
    'segera'         => ['id' => 'Segera', 'en' => 'Coming soon', 'zh' => '即将推出'],
    'untuk'          => ['id' => 'Untuk: {isi}', 'en' => 'For: {isi}', 'zh' => '适用于：{isi}'],
    'request_app'    => ['id' => 'Request aplikasi', 'en' => 'Request an app', 'zh' => '提出应用需求'],
    'wa_request'     => [
        'id' => 'Halo {nama}, saya ingin request aplikasi untuk kebutuhan saya.',
        'en' => 'Hi {nama}, I would like to request an app for my needs.',
        'zh' => '你好 {nama}，我想提出一个应用需求。',
    ],
    'apps_demo'      => ['id' => 'Lihat demo aplikasi', 'en' => 'View app demos', 'zh' => '查看应用演示'],

    /* ---------- Keunggulan ---------- */
    'keunggulan_label' => ['id' => 'Keunggulan', 'en' => 'Why us', 'zh' => '优势'],
    'keunggulan_judul' => ['id' => 'Kenapa pilih {nama}?', 'en' => 'Why choose {nama}?', 'zh' => '为什么选择 {nama}？'],
    'keunggulan_sub'   => [
        'id' => 'Dirancang untuk semua, dari warung kecil sampai perusahaan.',
        'en' => 'Built for everyone, from small shops to companies.',
        'zh' => '从小店到企业，人人适用。',
    ],
    // Kotak "trial 14 hari"
    'trial_label'    => ['id' => 'Trial gratis', 'en' => 'Free trial', 'zh' => '免费试用'],
    'trial_hari'     => ['id' => 'hari', 'en' => 'days', 'zh' => '天'],
    'trial_lanjut'   => ['id' => 'Cocok? Lanjut berlangganan', 'en' => 'Like it? Subscribe', 'zh' => '满意？继续订阅'],
    'chat_tanya'     => ['id' => 'Kak, cara cetak struk gimana?', 'en' => 'Hi, how do I print a receipt?', 'zh' => '你好，怎么打印收据呀？'],
    'chat_jawab'     => [
        'id' => 'Gampang! Buka Kasir, lalu ketuk 🖨️ Cetak.',
        'en' => 'Easy! Open Cashier, then tap 🖨️ Print.',
        'zh' => '很简单！打开收银，点击 🖨️ 打印即可。',
    ],

    /* ---------- Perangkat & pasang di HP ---------- */
    'perangkat_label' => ['id' => 'Akses di mana saja', 'en' => 'Access anywhere', 'zh' => '随时随地访问'],
    'perangkat_judul' => [
        'id' => 'Laptop, tablet, atau HP. Tampilannya menyesuaikan.',
        'en' => 'Laptop, tablet, or phone. It adapts to fit.',
        'zh' => '电脑、平板还是手机，界面都能完美适配。',
    ],
    'perangkat_isi'  => [
        'id' => 'Cukup buka website ini di browser. Data tersimpan online, jadi kamu bisa mencatat penjualan di HP lalu mengecek laporannya di laptop.',
        'en' => 'Just open this website in your browser. Your data is stored online, so you can record sales on your phone and check the reports on your laptop.',
        'zh' => '只需在浏览器中打开本网站。数据保存在云端，你可以在手机上记账，再到电脑上查看报表。',
    ],
    'laptop'         => ['id' => 'Laptop', 'en' => 'Laptop', 'zh' => '电脑'],
    'tablet'         => ['id' => 'Tablet', 'en' => 'Tablet', 'zh' => '平板'],
    'hp'             => ['id' => 'HP', 'en' => 'Phone', 'zh' => '手机'],
    'pasang_judul'   => ['id' => 'Pasang di layar utama HP', 'en' => 'Add it to your home screen', 'zh' => '添加到手机主屏幕'],
    'pasang_sub'     => [
        'id' => 'Biar terasa seperti aplikasi biasa, tanpa Play Store.',
        'en' => 'So it feels like a regular app, no Play Store needed.',
        'zh' => '像普通 App 一样使用，无需应用商店。',
    ],
    'pasang_tombol'  => ['id' => 'Pasang Aplikasi', 'en' => 'Install App', 'zh' => '安装应用'],
    'pasang_android_html' => [
        'id' => 'Ketuk menu <b>⋮</b> lalu pilih <b>Tambahkan ke layar utama</b> atau <b>Instal aplikasi</b>.',
        'en' => 'Tap the <b>⋮</b> menu, then choose <b>Add to Home screen</b> or <b>Install app</b>.',
        'zh' => '点击 <b>⋮</b> 菜单，然后选择<b>添加到主屏幕</b>或<b>安装应用</b>。',
    ],
    'pasang_ios_html' => [
        'id' => 'Ketuk tombol <b>Bagikan</b> lalu pilih <b>Tambah ke Layar Utama</b>.',
        'en' => 'Tap the <b>Share</b> button, then choose <b>Add to Home Screen</b>.',
        'zh' => '点击<b>分享</b>按钮，然后选择<b>添加到主屏幕</b>。',
    ],

    /* ---------- Cara kerja ---------- */
    'cara_label'     => ['id' => 'Cara kerja', 'en' => 'How it works', 'zh' => '使用流程'],
    'cara_judul'     => ['id' => 'Mulai dalam 3 langkah', 'en' => 'Get started in 3 steps', 'zh' => '三步即可开始'],

    /* ---------- Harga ---------- */
    'harga_label'    => ['id' => 'Harga', 'en' => 'Pricing', 'zh' => '价格'],
    'harga_judul'    => ['id' => 'Pilih paket sesuai kebutuhan', 'en' => 'Choose the plan that fits', 'zh' => '选择适合你的套餐'],
    'harga_sub'      => [
        'id' => 'Harga berlaku untuk setiap aplikasi. Coba gratis 14 hari dulu, baru pilih paket.',
        'en' => 'Prices are per app. Try it free for 14 days first, then choose a plan.',
        'zh' => '价格按单个应用计算。先免费试用 14 天，再选择套餐。',
    ],
    'periode'        => ['id' => 'Periode pembayaran', 'en' => 'Billing period', 'zh' => '付费周期'],
    'bulanan'        => ['id' => 'Bulanan', 'en' => 'Monthly', 'zh' => '按月'],
    'tahunan'        => ['id' => 'Tahunan', 'en' => 'Yearly', 'zh' => '按年'],
    'hemat'          => ['id' => 'Hemat 2 bulan', 'en' => '2 months free', 'zh' => '省 2 个月'],
    'rekomendasi'    => ['id' => 'Rekomendasi', 'en' => 'Recommended', 'zh' => '推荐'],
    'per_bulan'      => ['id' => '/ bulan', 'en' => '/ month', 'zh' => '/ 月'],
    'per_tahun'      => ['id' => '/ tahun', 'en' => '/ year', 'zh' => '/ 年'],
    'per_trial'      => ['id' => '/ 14 hari', 'en' => '/ 14 days', 'zh' => '/ 14 天'],
    'mulai_gratis'   => ['id' => 'Mulai Trial 14 Hari', 'en' => 'Start 14-Day Trial', 'zh' => '开始 14 天试用'],
    'pilih_paket'    => ['id' => 'Pilih {paket}', 'en' => 'Choose {paket}', 'zh' => '选择{paket}'],
    'wa_paket'       => [
        'id' => 'Halo, saya tertarik dengan paket {paket} {nama}.',
        'en' => 'Hi, I am interested in the {paket} plan from {nama}.',
        'zh' => '你好，我对 {nama} 的{paket}套餐感兴趣。',
    ],

    /* ---------- FAQ ---------- */
    'faq_label'      => ['id' => 'FAQ', 'en' => 'FAQ', 'zh' => '常见问题'],
    'faq_judul'      => ['id' => 'Pertanyaan yang sering ditanyakan', 'en' => 'Frequently asked questions', 'zh' => '常见问题解答'],

    /* ---------- Ajakan & kontak ---------- */
    'cta_judul'      => ['id' => 'Siap merapikan usahamu?', 'en' => 'Ready to get your business organized?', 'zh' => '准备好让生意井井有条了吗？'],
    'cta_isi'        => [
        'id' => 'Coba gratis 14 hari, atau tanya-tanya dulu lewat WhatsApp. Kami bantu sampai bisa.',
        'en' => 'Start a 14-day free trial, or ask us a few questions on WhatsApp first. We will help you every step of the way.',
        'zh' => '免费试用 14 天，或者先通过 WhatsApp 咨询。我们会一路帮你上手。',
    ],
    'cta_wa'         => ['id' => 'Chat WhatsApp', 'en' => 'Chat on WhatsApp', 'zh' => 'WhatsApp 咨询'],

    /* ---------- Footer ---------- */
    'kaki_produk'    => ['id' => 'Produk', 'en' => 'Product', 'zh' => '产品'],
    'kaki_kontak'    => ['id' => 'Kontak', 'en' => 'Contact', 'zh' => '联系我们'],
    'kaki_nav'       => ['id' => 'Tautan bawah', 'en' => 'Footer links', 'zh' => '页脚链接'],
    'hak_cipta'      => ['id' => 'Hak cipta dilindungi.', 'en' => 'All rights reserved.', 'zh' => '版权所有。'],
    'email'          => ['id' => 'Email', 'en' => 'Email', 'zh' => '邮箱'],
    'wa_label'       => ['id' => 'Chat lewat WhatsApp', 'en' => 'Chat on WhatsApp', 'zh' => '通过 WhatsApp 聊天'],

    /* ---------- Halaman produk (produk.php) ---------- */
    'pelajari'       => ['id' => 'Pelajari', 'en' => 'Learn more', 'zh' => '了解详情'],
    'produk_lencana' => ['id' => 'Aplikasi {app}', 'en' => '{app} app', 'zh' => '{app}应用'],
    'produk_fitur_label' => ['id' => 'Fitur', 'en' => 'Features', 'zh' => '功能'],
    'produk_fitur_judul' => ['id' => 'Semua yang kamu butuhkan di {app}', 'en' => 'Everything you need in {app}', 'zh' => '{app}的全部功能'],
    'produk_alur_judul'  => ['id' => 'Begini cara kerja {app}', 'en' => 'How {app} works', 'zh' => '{app}如何运作'],
    'produk_cta_judul'   => ['id' => 'Coba {app} gratis 14 hari', 'en' => 'Try {app} free for 14 days', 'zh' => '免费试用{app} 14 天'],
    'produk_cta_isi'     => [
        'id' => 'Semua fitur terbuka selama masa trial. Tidak cocok? Berhenti kapan saja tanpa biaya.',
        'en' => 'Every feature is unlocked during the trial. Not for you? Stop anytime at no cost.',
        'zh' => '试用期间全部功能开放。不满意？随时停止，不收任何费用。',
    ],
    'lihat_harga'    => ['id' => 'Lihat harga', 'en' => 'See pricing', 'zh' => '查看价格'],
    'produk_lain'    => ['id' => 'Aplikasi lainnya', 'en' => 'Other apps', 'zh' => '其他应用'],
    'produk_lain_judul' => ['id' => 'Lihat juga aplikasi lainnya', 'en' => 'Explore our other apps', 'zh' => '看看其他应用'],
    // Tulisan kecil di dalam ilustrasi (partials/ilustrasi/)
    'ilus_pesanan'   => ['id' => 'Pesanan baru', 'en' => 'New order', 'zh' => '新订单'],
    'ilus_bayar'     => ['id' => 'Bayar', 'en' => 'Pay', 'zh' => '付款'],
    'ilus_slip'      => ['id' => 'Slip gaji terkirim', 'en' => 'Payslips sent', 'zh' => '工资单已发送'],
    'ilus_tiket'     => ['id' => 'Tiket baru', 'en' => 'New ticket', 'zh' => '新工单'],
    'ilus_tersimpan' => ['id' => 'Tersimpan', 'en' => 'Saved', 'zh' => '已保存'],
    'ilus_total'     => ['id' => 'Total', 'en' => 'Total', 'zh' => '合计'],
    // Toko
    'ilus_keranjang' => ['id' => 'Keranjang', 'en' => 'Cart', 'zh' => '购物车'],
    'ilus_toko'      => ['id' => 'Toko Bu Sari', 'en' => 'Bu Sari’s Shop', 'zh' => 'Sari 阿姨的小店'],
    'ilus_terima_kasih' => ['id' => 'Terima kasih', 'en' => 'Thank you', 'zh' => '谢谢惠顾'],
    'ilus_lunas'     => ['id' => 'Lunas', 'en' => 'Paid', 'zh' => '已付款'],
    'ilus_laba'      => ['id' => 'Laba hari ini', 'en' => 'Today’s profit', 'zh' => '今日利润'],
    'ilus_stok'      => ['id' => 'Stok menipis', 'en' => 'Low stock', 'zh' => '库存不足'],
    'ilus_stok_isi'  => ['id' => 'Kopi susu · sisa 5', 'en' => 'Milk coffee · 5 left', 'zh' => '牛奶咖啡 · 剩 5 件'],
    // Toko Online
    'ilus_website'   => ['id' => 'Website', 'en' => 'Website', 'zh' => '网站'],
    'ilus_marketplace' => ['id' => 'Marketplace', 'en' => 'Marketplace', 'zh' => '电商平台'],
    'ilus_beli'      => ['id' => 'Beli sekarang', 'en' => 'Buy now', 'zh' => '立即购买'],
    'ilus_pesanan_masuk' => ['id' => 'Pesanan masuk', 'en' => 'Incoming orders', 'zh' => '订单收件箱'],
    'ilus_dibayar'   => ['id' => 'Dibayar', 'en' => 'Paid', 'zh' => '已付款'],
    'ilus_dikemas'   => ['id' => 'Dikemas', 'en' => 'Packing', 'zh' => '打包中'],
    'ilus_dikirim'   => ['id' => 'Dikirim', 'en' => 'Shipped', 'zh' => '已发货'],
    'ilus_perjalanan' => ['id' => 'Dalam perjalanan', 'en' => 'On the way', 'zh' => '运输中'],
    'ilus_resi'      => ['id' => 'Resi', 'en' => 'Tracking', 'zh' => '运单号'],
    // Penggajian & HR
    'ilus_slip_judul' => ['id' => 'Slip gaji', 'en' => 'Payslip', 'zh' => '工资单'],
    'ilus_gaji_pokok' => ['id' => 'Gaji pokok', 'en' => 'Base salary', 'zh' => '基本工资'],
    'ilus_lembur'    => ['id' => 'Lembur 6 jam', 'en' => 'Overtime 6 h', 'zh' => '加班 6 小时'],
    'ilus_tunjangan' => ['id' => 'Tunjangan', 'en' => 'Allowance', 'zh' => '津贴'],
    'ilus_potongan'  => ['id' => 'Potongan', 'en' => 'Deductions', 'zh' => '扣款'],
    'ilus_diterima'  => ['id' => 'Total diterima', 'en' => 'Take-home pay', 'zh' => '实发工资'],
    'ilus_terkirim'  => ['id' => 'Terkirim', 'en' => 'Sent', 'zh' => '已发送'],
    'ilus_absen'     => ['id' => 'Absen masuk', 'en' => 'Clock in', 'zh' => '上班打卡'],
    'ilus_hadir'     => ['id' => 'Hadir tepat waktu', 'en' => 'On time', 'zh' => '准时到岗'],
    'ilus_disetujui' => ['id' => 'Disetujui', 'en' => 'Approved', 'zh' => '已批准'],
    'ilus_karyawan'  => ['id' => '{n} karyawan', 'en' => '{n} employees', 'zh' => '{n} 名员工'],
    // Manajemen IT
    'ilus_baru'      => ['id' => 'Baru', 'en' => 'New', 'zh' => '新建'],
    'ilus_proses'    => ['id' => 'Dikerjakan', 'en' => 'In progress', 'zh' => '处理中'],
    'ilus_selesai'   => ['id' => 'Selesai', 'en' => 'Done', 'zh' => '已完成'],
    'ilus_t_wifi'    => ['id' => 'WiFi lambat', 'en' => 'Slow WiFi', 'zh' => 'WiFi 很慢'],
    'ilus_t_password' => ['id' => 'Reset password', 'en' => 'Reset password', 'zh' => '重置密码'],
    'ilus_t_laptop'  => ['id' => 'Laptop lemot', 'en' => 'Slow laptop', 'zh' => '电脑卡顿'],
    'ilus_t_mouse'   => ['id' => 'Mouse rusak', 'en' => 'Broken mouse', 'zh' => '鼠标损坏'],
    'ilus_t_email'   => ['id' => 'Akun email', 'en' => 'Email account', 'zh' => '邮箱账号'],
    'ilus_t_printer' => ['id' => 'Printer macet', 'en' => 'Printer jam', 'zh' => '打印机卡纸'],
    'ilus_habis'     => ['id' => 'Habis dalam 30 hari', 'en' => 'Expires in 30 days', 'zh' => '30 天后到期'],
    'ilus_servis'    => ['id' => 'Servis printer', 'en' => 'Printer service', 'zh' => '打印机保养'],
    'ilus_besok'     => ['id' => 'Besok, 09:00', 'en' => 'Tomorrow, 09:00', 'zh' => '明天 09:00'],

    /* ---------- Halaman demo aplikasi ---------- */
    'demo_judul'     => ['id' => 'Demo Aplikasi — {nama}', 'en' => 'App Demos — {nama}', 'zh' => '应用演示 — {nama}'],
    'demo_info_html' => [
        'id' => '<strong>Mode demo.</strong> Ini gambaran aplikasi-aplikasi {nama}. Aplikasinya akan aktif di tahap berikutnya.',
        'en' => '<strong>Demo mode.</strong> This is a preview of the {nama} apps. They will go live in the next phase.',
        'zh' => '<strong>演示模式。</strong>这是 {nama} 各款应用的预览，应用将在下一阶段正式上线。',
    ],
    'demo_heading'   => ['id' => 'Pilih aplikasi', 'en' => 'Choose an app', 'zh' => '选择应用'],
    'demo_sub'       => [
        'id' => 'Ketuk aplikasi untuk melihat fiturnya, lalu mulai coba gratis 14 hari.',
        'en' => 'Tap an app to see its features, then start a 14-day free trial.',
        'zh' => '点击应用查看功能，然后开始 14 天免费试用。',
    ],
    'pasang_hp'      => ['id' => 'Pasang di HP', 'en' => 'Install on phone', 'zh' => '安装到手机'],
    'fitur'          => ['id' => 'Fitur di dalamnya', 'en' => 'What’s inside', 'zh' => '包含功能'],
    'segera_hadir'   => ['id' => '🚧 Segera hadir', 'en' => '🚧 Coming soon', 'zh' => '🚧 即将推出'],
    'tutup'          => ['id' => 'Tutup', 'en' => 'Close', 'zh' => '关闭'],
];
