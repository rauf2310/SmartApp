<?php
/**
 * ============================================================
 *  PENGATURAN WEBSITE
 *  Nama usaha, nomor WhatsApp, daftar aplikasi, harga, dan FAQ
 *  cukup diubah di file ini. Semua halaman otomatis ikut berubah.
 *
 *  Teks yang tampil ditulis dalam 3 bahasa:
 *  ['id' => 'Indonesia', 'en' => 'English', 'zh' => '中文 (Mandarin)']
 *  Kalau terjemahan en/zh kosong, otomatis memakai teks Indonesia.
 *  Teks tombol & judul bagian ada di bahasa.php.
 * ============================================================
 */

define('UMKM', true);
date_default_timezone_set('Asia/Jakarta');

/* ------------------------------------------------------------
 *  Bahasa yang tersedia. Dipilih lewat link ?lang=en,
 *  lalu diingat di cookie selama 1 tahun.
 * ------------------------------------------------------------ */
$daftar_bahasa = [
    'id' => ['nama' => 'Bahasa Indonesia', 'singkat' => 'ID', 'kode' => 'id'],
    'en' => ['nama' => 'English',          'singkat' => 'EN', 'kode' => 'en'],
    'zh' => ['nama' => '中文',              'singkat' => '中', 'kode' => 'zh-CN'],
];

$lang    = 'id';
$diminta = $_GET['lang'] ?? null;
$diingat = $_COOKIE['lang'] ?? null;
if (is_string($diminta) && isset($daftar_bahasa[$diminta])) {
    $lang = $diminta;
    setcookie('lang', $lang, [
        'expires'  => time() + 31536000,
        'path'     => rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/',
        'samesite' => 'Lax',
    ]);
} elseif (is_string($diingat) && isset($daftar_bahasa[$diingat])) {
    $lang = $diingat;
}

$site = [
    'nama'      => 'SmartApp',
    'tagline'   => [
        'id' => 'Banyak aplikasi siap pakai untuk usaha dan kantormu',
        'en' => 'Ready-to-use apps for your business and office',
        'zh' => '为你的生意和办公室准备的多款现成应用',
    ],
    'deskripsi' => [
        'id' => 'Aplikasi kasir toko, toko online, penggajian, manajemen IT, notepad, dan lainnya. Setiap aplikasi bisa dicoba gratis 14 hari, langsung di HP, tablet, atau laptop.',
        'en' => 'Store POS, online store, payroll, IT management, notepad, and more apps. Every app comes with a 14-day free trial, right on your phone, tablet, or laptop.',
        'zh' => '店铺收银、网店、薪资、IT 管理、记事本等多款应用。每款应用均可免费试用 14 天，手机、平板、电脑都能用。',
    ],
    // {nama} otomatis diganti nama usaha
    'pesan_wa'  => [
        'id' => 'Halo {nama}, saya ingin coba gratis 14 hari.',
        'en' => 'Hi {nama}, I would like to start a 14-day free trial.',
        'zh' => '你好 {nama}，我想免费试用 14 天。',
    ],
    'whatsapp'    => '6289505885475',   // GANTI dengan nomormu. Format 62xxx (tanpa + dan tanpa 0 di depan)
    'email'       => 'raufdzulmajid23@gmail.com', // GANTI dengan emailmu
    'warna'       => '#0E7C66',         // warna bar atas HP saat dibuka sebagai aplikasi (mode terang)
    'warna_gelap' => '#050E0B',         // warna bar atas HP di mode gelap
];

/**
 * Daftar aplikasi yang dijual. Setiap aplikasi dijual terpisah dan bisa dicoba gratis 14 hari.
 * Setiap aplikasi (kecuali 'lainnya') otomatis punya halaman sendiri: produk.php?app=kode
 *
 * kode  : nama pendek tanpa spasi. 'lainnya' ditampilkan sebagai kotak "aplikasi lainnya".
 * status: 'tersedia' (sudah bisa dipakai) atau 'segera' (masih dikembangkan)
 * url   : alamat aplikasinya (misalnya https://kasir.contoh.com/daftar).
 *         Kosongkan dulu kalau aplikasinya belum jadi -> tombol "Coba gratis" diarahkan ke WhatsApp.
 * judul : judul besar di halaman produk. Bagian dalam [kurung siku] diberi warna sorot.
 * fitur : [ikon, nama fitur, penjelasan fitur]
 * alur  : langkah cara kerja aplikasi: [judul langkah, penjelasan]
 */
$apps = [
    [
        'kode'   => 'toko',
        'nama'   => ['id' => 'Toko', 'en' => 'Store', 'zh' => '店铺'],
        'ikon'   => '🏪',
        'warna'  => '#0E7C66',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'Warung, toko & UMKM', 'en' => 'Stalls, shops & small businesses', 'zh' => '小店、商铺和中小微企业'],
        'judul'  => ['id' => 'Kasir toko yang [cepat dan rapi]', 'en' => 'A store cashier that is [fast and tidy]', 'zh' => '[快速又整洁]的店铺收银'],
        'desc'   => [
            'id' => 'Kasir dan pembukuan untuk toko fisik. Transaksi di Kasir otomatis mengurangi Stok dan langsung masuk ke Laporan.',
            'en' => 'Point of sale and bookkeeping for physical stores. A sale in Cashier automatically updates Stock and goes straight into Reports.',
            'zh' => '实体店收银与记账。收银完成后自动扣减库存，并直接计入报表。',
        ],
        'fitur'  => [
            ['🧾', ['id' => 'Kasir', 'en' => 'Cashier', 'zh' => '收银'], [
                'id' => 'Catat penjualan dalam hitungan detik, kembalian dihitung otomatis, struk bisa dikirim lewat WhatsApp.',
                'en' => 'Record sales in seconds, change is calculated automatically, and receipts can be sent via WhatsApp.',
                'zh' => '几秒钟完成收银，自动计算找零，收据可通过 WhatsApp 发送。',
            ]],
            ['📦', ['id' => 'Stok', 'en' => 'Stock', 'zh' => '库存'], [
                'id' => 'Stok berkurang otomatis setiap ada penjualan, dan ada peringatan saat barang hampir habis.',
                'en' => 'Stock goes down automatically with every sale, with alerts when items run low.',
                'zh' => '每笔销售自动扣减库存，库存不足时自动提醒。',
            ]],
            ['💰', ['id' => 'Keuangan', 'en' => 'Finance', 'zh' => '财务'], [
                'id' => 'Catat pemasukan dan pengeluaran, laba rugi dihitung otomatis setiap hari.',
                'en' => 'Record income and expenses, with profit and loss calculated every day.',
                'zh' => '记录收支，每天自动计算盈亏。',
            ]],
            ['👥', ['id' => 'Pelanggan', 'en' => 'Customers', 'zh' => '客户'], [
                'id' => 'Simpan data dan riwayat belanja pelanggan untuk promo dan member.',
                'en' => 'Keep customer details and purchase history for promos and memberships.',
                'zh' => '保存客户资料和购买记录，用于促销和会员。',
            ]],
            ['📊', ['id' => 'Laporan', 'en' => 'Reports', 'zh' => '报表'], [
                'id' => 'Grafik penjualan harian, mingguan, dan bulanan yang mudah dibaca.',
                'en' => 'Easy-to-read daily, weekly, and monthly sales charts.',
                'zh' => '清晰易懂的日、周、月销售图表。',
            ]],
            ['📒', ['id' => 'Hutang-piutang', 'en' => 'Debts', 'zh' => '应收应付'], [
                'id' => 'Catat hutang pelanggan dan supplier, lalu kirim pengingat lewat WhatsApp.',
                'en' => 'Track customer and supplier debts, then send reminders via WhatsApp.',
                'zh' => '记录客户和供应商的欠款，并通过 WhatsApp 发送提醒。',
            ]],
        ],
        'alur'   => [
            [['id' => 'Tambah produk', 'en' => 'Add products', 'zh' => '添加商品'], [
                'id' => 'Masukkan nama, harga, dan stok barang. Bisa satu per satu atau sekaligus.',
                'en' => 'Enter item names, prices, and stock, one by one or in bulk.',
                'zh' => '录入商品名称、价格和库存，可逐个或批量添加。',
            ]],
            [['id' => 'Jualan di kasir', 'en' => 'Sell at the counter', 'zh' => '收银销售'], [
                'id' => 'Pilih barang, terima tunai atau QRIS, dan struk langsung jadi.',
                'en' => 'Pick items, take cash or QRIS, and the receipt is ready.',
                'zh' => '选择商品，收取现金或 QRIS，收据即刻生成。',
            ]],
            [['id' => 'Pantau laporan', 'en' => 'Check your reports', 'zh' => '查看报表'], [
                'id' => 'Lihat omzet, laba, dan barang terlaris kapan saja dari HP.',
                'en' => 'See revenue, profit, and best sellers anytime from your phone.',
                'zh' => '随时在手机上查看营业额、利润和畅销商品。',
            ]],
        ],
    ],
    [
        'kode'   => 'toko-online',
        'nama'   => ['id' => 'Toko Online', 'en' => 'Online Store', 'zh' => '网店'],
        'ikon'   => '🛒',
        'warna'  => '#DB2777',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'Penjual online & reseller', 'en' => 'Online sellers & resellers', 'zh' => '网商和分销商'],
        'judul'  => ['id' => 'Kelola semua [toko online] dari satu dashboard', 'en' => 'Run every [online store] from one dashboard', 'zh' => '一个后台管理所有[网店]'],
        'desc'   => [
            'id' => 'Punya website toko sendiri dan kelola pesanan dari berbagai marketplace di satu tempat. Stok selalu sama di semua channel.',
            'en' => 'Get your own store website and manage orders from multiple marketplaces in one place. Stock stays in sync across every channel.',
            'zh' => '拥有自己的网店，并在一个地方管理多个电商平台的订单，所有渠道库存始终同步。',
        ],
        'fitur'  => [
            ['🌐', ['id' => 'Website toko', 'en' => 'Store website', 'zh' => '店铺网站'], [
                'id' => 'Toko online dengan alamat sendiri, siap dibagikan ke pelanggan tanpa perlu keahlian teknis.',
                'en' => 'An online store at your own address, ready to share with customers, no technical skills needed.',
                'zh' => '拥有独立网址的网店，无需技术即可分享给顾客。',
            ]],
            ['🛍️', ['id' => 'Katalog produk', 'en' => 'Product catalog', 'zh' => '商品目录'], [
                'id' => 'Foto, harga, varian, dan stok produk diatur sekali, lalu tampil di semua channel.',
                'en' => 'Set product photos, prices, variants, and stock once, and show them on every channel.',
                'zh' => '商品图片、价格、规格和库存只需设置一次，所有渠道同步展示。',
            ]],
            ['🔄', ['id' => 'Sinkron marketplace', 'en' => 'Marketplace sync', 'zh' => '电商平台同步'], [
                'id' => 'Pesanan dan stok dari berbagai marketplace tersinkron otomatis, jadi tidak ada barang terjual dobel.',
                'en' => 'Orders and stock from multiple marketplaces sync automatically, so nothing gets oversold.',
                'zh' => '多个电商平台的订单和库存自动同步，避免超卖。',
            ]],
            ['💬', ['id' => 'Pesanan via WhatsApp', 'en' => 'Orders via WhatsApp', 'zh' => 'WhatsApp 下单'], [
                'id' => 'Pembeli bisa pesan langsung lewat WhatsApp, dan pesanannya otomatis tercatat.',
                'en' => 'Customers can order straight from WhatsApp, and orders are recorded automatically.',
                'zh' => '顾客可直接通过 WhatsApp 下单，订单自动记录。',
            ]],
            ['🚚', ['id' => 'Ongkir & resi', 'en' => 'Shipping & tracking', 'zh' => '运费与物流单号'], [
                'id' => 'Cek ongkir berbagai kurir, cetak label, dan lacak resi dari satu layar.',
                'en' => 'Compare courier rates, print labels, and track shipments from one screen.',
                'zh' => '在一个界面比较快递运费、打印面单并追踪物流。',
            ]],
            ['💳', ['id' => 'Pembayaran online', 'en' => 'Online payments', 'zh' => '在线支付'], [
                'id' => 'Terima transfer bank, e-wallet, dan QRIS. Status pembayaran langsung terlihat.',
                'en' => 'Accept bank transfers, e-wallets, and QRIS, with payment status shown instantly.',
                'zh' => '支持银行转账、电子钱包和 QRIS，付款状态一目了然。',
            ]],
        ],
        'alur'   => [
            [['id' => 'Upload produk', 'en' => 'Upload products', 'zh' => '上传商品'], [
                'id' => 'Masukkan produk sekali, langsung tampil di website toko dan marketplace.',
                'en' => 'Add products once and they appear on your store website and marketplaces.',
                'zh' => '商品只需上传一次，即可同步到店铺网站和电商平台。',
            ]],
            [['id' => 'Pesanan masuk', 'en' => 'Orders come in', 'zh' => '订单汇总'], [
                'id' => 'Pesanan dari website, WhatsApp, dan marketplace terkumpul di satu dashboard.',
                'en' => 'Orders from your website, WhatsApp, and marketplaces gather in one dashboard.',
                'zh' => '网站、WhatsApp 和电商平台的订单汇总到一个后台。',
            ]],
            [['id' => 'Kemas & kirim', 'en' => 'Pack & ship', 'zh' => '打包发货'], [
                'id' => 'Cetak label, pilih kurir, dan nomor resi otomatis dikirim ke pembeli.',
                'en' => 'Print labels, choose a courier, and the tracking number goes to the buyer automatically.',
                'zh' => '打印面单、选择快递，物流单号自动发送给买家。',
            ]],
            [['id' => 'Pantau penjualan', 'en' => 'Track sales', 'zh' => '查看销售'], [
                'id' => 'Lihat produk terlaris dan omzet tiap channel dalam satu laporan.',
                'en' => 'See best sellers and revenue per channel in one report.',
                'zh' => '在一份报表中查看畅销商品和各渠道营业额。',
            ]],
        ],
    ],
    [
        'kode'   => 'penggajian',
        'nama'   => ['id' => 'Penggajian & HR', 'en' => 'Payroll & HR', 'zh' => '薪资与人事'],
        'ikon'   => '💼',
        'warna'  => '#7C3AED',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'UMKM & perusahaan', 'en' => 'Small businesses & companies', 'zh' => '中小企业和公司'],
        'judul'  => ['id' => 'Urus [gaji karyawan] tanpa ribet', 'en' => 'Payroll [without the hassle]', 'zh' => '轻松搞定[员工工资]'],
        'desc'   => [
            'id' => 'Urus absensi, cuti, dan gaji karyawan tanpa ribet. Gaji dihitung otomatis dan slip gaji langsung dikirim ke karyawan.',
            'en' => 'Handle staff attendance, leave, and salaries with ease. Pay is calculated automatically and payslips go straight to your staff.',
            'zh' => '轻松管理员工考勤、请假和工资。工资自动计算，工资单直接发送给员工。',
        ],
        'fitur'  => [
            ['👤', ['id' => 'Data karyawan', 'en' => 'Employee data', 'zh' => '员工档案'], [
                'id' => 'Simpan data, jabatan, dan dokumen karyawan di satu tempat yang aman.',
                'en' => 'Keep staff details, positions, and documents in one secure place.',
                'zh' => '在一个安全的地方保存员工资料、职位和文件。',
            ]],
            ['⏰', ['id' => 'Absensi', 'en' => 'Attendance', 'zh' => '考勤'], [
                'id' => 'Karyawan absen lewat HP, lengkap dengan jam masuk dan lokasi.',
                'en' => 'Staff clock in from their phones, with time and location recorded.',
                'zh' => '员工用手机打卡，自动记录时间和地点。',
            ]],
            ['🏖️', ['id' => 'Cuti & izin', 'en' => 'Leave requests', 'zh' => '请假管理'], [
                'id' => 'Pengajuan cuti dan izin disetujui online, saldo cuti terpotong otomatis.',
                'en' => 'Leave requests are approved online, and leave balances update automatically.',
                'zh' => '请假在线审批，假期余额自动扣减。',
            ]],
            ['🧮', ['id' => 'Hitung gaji otomatis', 'en' => 'Automatic payroll', 'zh' => '自动算薪'], [
                'id' => 'Gaji, lembur, tunjangan, dan potongan dihitung otomatis dari data absensi.',
                'en' => 'Salaries, overtime, allowances, and deductions are calculated from attendance data.',
                'zh' => '根据考勤数据自动计算工资、加班费、津贴和扣款。',
            ]],
            ['📄', ['id' => 'Slip gaji digital', 'en' => 'Digital payslips', 'zh' => '电子工资单'], [
                'id' => 'Slip gaji terkirim ke HP karyawan, tidak perlu dicetak lagi.',
                'en' => 'Payslips go straight to staff phones, no printing needed.',
                'zh' => '工资单直接发送到员工手机，无需打印。',
            ]],
            ['📈', ['id' => 'Laporan SDM', 'en' => 'HR reports', 'zh' => '人事报表'], [
                'id' => 'Rekap kehadiran, lembur, dan biaya gaji per bulan dalam satu laporan.',
                'en' => 'Monthly attendance, overtime, and payroll costs in one report.',
                'zh' => '每月考勤、加班和薪资成本汇总在一份报表中。',
            ]],
        ],
        'alur'   => [
            [['id' => 'Masukkan data karyawan', 'en' => 'Add your staff', 'zh' => '录入员工'], [
                'id' => 'Isi data karyawan, gaji pokok, dan tunjangan sekali saja.',
                'en' => 'Enter staff details, base pay, and allowances just once.',
                'zh' => '员工资料、基本工资和津贴只需录入一次。',
            ]],
            [['id' => 'Karyawan absen dari HP', 'en' => 'Staff clock in by phone', 'zh' => '手机打卡'], [
                'id' => 'Kehadiran, lembur, dan cuti tercatat otomatis setiap hari.',
                'en' => 'Attendance, overtime, and leave are recorded every day.',
                'zh' => '每天自动记录出勤、加班和请假。',
            ]],
            [['id' => 'Gajian sekali klik', 'en' => 'Run payroll in one click', 'zh' => '一键发薪'], [
                'id' => 'Gaji dihitung otomatis dan slip gaji langsung dikirim ke karyawan.',
                'en' => 'Pay is calculated automatically and payslips go out to staff.',
                'zh' => '工资自动计算，工资单即时发送给员工。',
            ]],
        ],
    ],
    [
        'kode'   => 'it',
        'nama'   => ['id' => 'Manajemen IT', 'en' => 'IT Management', 'zh' => 'IT 管理'],
        'ikon'   => '💻',
        'warna'  => '#2563EB',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'Perusahaan & kantor', 'en' => 'Companies & offices', 'zh' => '企业和办公室'],
        'judul'  => ['id' => 'Semua [aset IT kantor] tercatat rapi', 'en' => 'Every [office IT asset] neatly tracked', 'zh' => '[办公室 IT 资产]一目了然'],
        'desc'   => [
            'id' => 'Kelola aset IT perusahaan, laporan masalah dari karyawan, dan lisensi software dalam satu tempat. Jelas siapa memegang perangkat apa.',
            'en' => 'Manage company IT assets, issue reports from staff, and software licenses in one place. Always know who has which device.',
            'zh' => '在一个地方管理企业 IT 资产、员工报修和软件许可证，谁在用哪台设备一目了然。',
        ],
        'fitur'  => [
            ['🖥️', ['id' => 'Inventaris aset', 'en' => 'Asset inventory', 'zh' => '资产清单'], [
                'id' => 'Catat laptop, printer, dan perangkat lain beserta pemegang dan lokasinya.',
                'en' => 'Record laptops, printers, and other devices along with who has them and where.',
                'zh' => '记录电脑、打印机等设备及其使用人和位置。',
            ]],
            ['🎫', ['id' => 'Tiket helpdesk', 'en' => 'Helpdesk tickets', 'zh' => '服务工单'], [
                'id' => 'Karyawan melapor masalah lewat formulir, dan tim IT memantaunya sampai selesai.',
                'en' => 'Staff report issues through a form, and the IT team tracks them until resolved.',
                'zh' => '员工通过表单报修，IT 团队跟进直至解决。',
            ]],
            ['🔑', ['id' => 'Lisensi software', 'en' => 'Software licenses', 'zh' => '软件许可证'], [
                'id' => 'Pantau lisensi dan tanggal kedaluwarsanya supaya tidak ada yang terlewat.',
                'en' => 'Track licenses and expiry dates so nothing slips through.',
                'zh' => '跟踪软件许可证及到期日，避免遗漏。',
            ]],
            ['🛠️', ['id' => 'Jadwal maintenance', 'en' => 'Maintenance schedule', 'zh' => '维护计划'], [
                'id' => 'Atur jadwal perawatan rutin dan dapat pengingat otomatis.',
                'en' => 'Schedule routine maintenance and get automatic reminders.',
                'zh' => '安排定期维护并自动提醒。',
            ]],
            ['📋', ['id' => 'Laporan IT', 'en' => 'IT reports', 'zh' => 'IT 报表'], [
                'id' => 'Lihat jumlah aset, tiket, dan biaya IT dalam satu laporan.',
                'en' => 'See assets, tickets, and IT costs in one report.',
                'zh' => '在一份报表中查看资产、工单和 IT 成本。',
            ]],
        ],
        'alur'   => [
            [['id' => 'Data aset', 'en' => 'Record assets', 'zh' => '登记资产'], [
                'id' => 'Masukkan perangkat kantor dan siapa yang memakainya.',
                'en' => 'Add office devices and who uses them.',
                'zh' => '录入办公设备及其使用人。',
            ]],
            [['id' => 'Terima laporan', 'en' => 'Receive reports', 'zh' => '接收报修'], [
                'id' => 'Karyawan melapor masalah, dan tiket langsung masuk ke tim IT.',
                'en' => 'Staff report issues and tickets go straight to the IT team.',
                'zh' => '员工报修后，工单直接送达 IT 团队。',
            ]],
            [['id' => 'Pantau & rawat', 'en' => 'Monitor & maintain', 'zh' => '监控维护'], [
                'id' => 'Lacak status tiket, lisensi, dan jadwal maintenance di satu tempat.',
                'en' => 'Track tickets, licenses, and maintenance in one place.',
                'zh' => '在一个地方跟踪工单、许可证和维护计划。',
            ]],
        ],
    ],
    [
        'kode'   => 'notepad',
        'nama'   => ['id' => 'Notepad', 'en' => 'Notepad', 'zh' => '记事本'],
        'ikon'   => '📝',
        'warna'  => '#D97706',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'Pribadi & tim', 'en' => 'Personal & teams', 'zh' => '个人和团队'],
        'judul'  => ['id' => 'Semua [catatan penting] di satu tempat', 'en' => 'All your [important notes] in one place', 'zh' => '所有[重要笔记]集中一处'],
        'desc'   => [
            'id' => 'Tulis catatan, daftar tugas, dan ide. Tersimpan online, jadi bisa dibuka lagi dari perangkat mana saja.',
            'en' => 'Write notes, to-do lists, and ideas. Saved online, so you can open them again from any device.',
            'zh' => '记录笔记、待办事项和灵感。云端保存，任何设备都能随时打开。',
        ],
        'fitur'  => [
            ['✍️', ['id' => 'Catatan cepat', 'en' => 'Quick notes', 'zh' => '快速笔记'], [
                'id' => 'Tulis ide atau informasi penting dalam hitungan detik.',
                'en' => 'Jot down ideas or key information in seconds.',
                'zh' => '几秒钟记下灵感或重要信息。',
            ]],
            ['✅', ['id' => 'Daftar tugas', 'en' => 'To-do lists', 'zh' => '待办清单'], [
                'id' => 'Buat to-do list lengkap dengan centang dan tenggat waktu.',
                'en' => 'Create to-do lists with checkboxes and due dates.',
                'zh' => '创建带勾选和截止日期的待办清单。',
            ]],
            ['🏷️', ['id' => 'Label & pencarian', 'en' => 'Labels & search', 'zh' => '标签与搜索'], [
                'id' => 'Kelompokkan catatan dengan label dan temukan lagi dengan cepat.',
                'en' => 'Group notes with labels and find them again quickly.',
                'zh' => '用标签分类笔记，快速找到所需内容。',
            ]],
            ['☁️', ['id' => 'Sinkron semua perangkat', 'en' => 'Sync across devices', 'zh' => '多设备同步'], [
                'id' => 'Catatan tersimpan online dan sama persis di HP, tablet, dan laptop.',
                'en' => 'Notes are saved online and stay the same on phone, tablet, and laptop.',
                'zh' => '笔记云端保存，手机、平板、电脑内容一致。',
            ]],
            ['🤝', ['id' => 'Bagikan ke tim', 'en' => 'Share with your team', 'zh' => '与团队共享'], [
                'id' => 'Bagikan catatan ke rekan kerja dan edit bersama.',
                'en' => 'Share notes with coworkers and edit them together.',
                'zh' => '与同事共享笔记并共同编辑。',
            ]],
        ],
        'alur'   => [
            [['id' => 'Tulis', 'en' => 'Write', 'zh' => '记录'], [
                'id' => 'Buat catatan atau daftar tugas dari perangkat apa saja.',
                'en' => 'Create notes or to-do lists from any device.',
                'zh' => '在任何设备上创建笔记或待办清单。',
            ]],
            [['id' => 'Rapikan', 'en' => 'Organize', 'zh' => '整理'], [
                'id' => 'Beri label dan warna supaya mudah dicari.',
                'en' => 'Add labels and colors so they are easy to find.',
                'zh' => '添加标签和颜色，方便查找。',
            ]],
            [['id' => 'Bagikan', 'en' => 'Share', 'zh' => '分享'], [
                'id' => 'Ajak tim membaca dan mengedit catatan yang sama.',
                'en' => 'Invite your team to read and edit the same notes.',
                'zh' => '邀请团队查看和编辑同一份笔记。',
            ]],
        ],
    ],
    [
        'kode'   => 'lainnya',
        'nama'   => ['id' => 'Aplikasi Lainnya', 'en' => 'More Apps', 'zh' => '更多应用'],
        'ikon'   => '✨',
        'warna'  => '#0891B2',
        'status' => 'segera',
        'url'    => '',
        'untuk'  => ['id' => 'Sesuai kebutuhanmu', 'en' => 'Built around your needs', 'zh' => '按需而定'],
        'desc'   => [
            'id' => 'Aplikasi baru akan terus ditambahkan, dan semuanya bisa dicoba gratis 14 hari. Butuh aplikasi khusus? Ceritakan ke kami.',
            'en' => 'New apps will keep being added, each with a 14-day free trial. Need a specific app? Tell us about it.',
            'zh' => '我们会持续推出新应用，每款都可免费试用 14 天。需要特定的应用？欢迎告诉我们。',
        ],
        'fitur'  => [
            ['🚀', ['id' => 'Terus bertambah', 'en' => 'Always growing', 'zh' => '持续增加']],
            ['🎁', ['id' => 'Trial 14 hari', 'en' => '14-day trial', 'zh' => '试用 14 天']],
            ['💡', ['id' => 'Bisa request', 'en' => 'Request an app', 'zh' => '可提需求']],
        ],
    ],
];

/**
 * Paket harga, berlaku untuk SETIAP aplikasi (per aplikasi, per bulan).
 * Harga tahunan = harga bulanan x KALI_TAHUNAN.
 * harga 0 = paket trial gratis selama HARI_TRIAL hari.
 */
define('KALI_TAHUNAN', 10); // bayar 10 bulan untuk 12 bulan = hemat 2 bulan
define('HARI_TRIAL', 14);   // lama masa coba gratis

$paket = [
    [
        'nama'     => ['id' => 'Trial', 'en' => 'Trial', 'zh' => '试用版'],
        'harga'    => 0,
        'ket'      => ['id' => 'Coba dulu, bayar belakangan', 'en' => 'Try first, pay later', 'zh' => '先试用，后付费'],
        'unggulan' => false,
        'fitur'    => [
            'id' => ['Semua fitur aplikasi', 'Gratis 14 hari penuh', 'Tanpa bayar di muka', 'Bantuan via WhatsApp'],
            'en' => ['Every app feature', 'Free for a full 14 days', 'Nothing to pay upfront', 'Help via WhatsApp'],
            'zh' => ['应用全部功能', '整整 14 天免费', '无需预付费用', 'WhatsApp 支持'],
        ],
    ],
    [
        'nama'     => ['id' => 'Basic', 'en' => 'Basic', 'zh' => '基础版'],
        'harga'    => 49000,
        'ket'      => ['id' => 'Untuk usaha kecil', 'en' => 'For small businesses', 'zh' => '适合小微企业'],
        'unggulan' => true,
        'fitur'    => [
            'id' => ['Fitur inti aplikasi', '2 pengguna', 'Data tersimpan online', 'Pembaruan gratis', 'Bantuan via WhatsApp'],
            'en' => ['Core app features', '2 users', 'Data stored online', 'Free updates', 'Help via WhatsApp'],
            'zh' => ['应用核心功能', '2 位用户', '数据云端保存', '免费更新', 'WhatsApp 支持'],
        ],
    ],
    [
        'nama'     => ['id' => 'Pro', 'en' => 'Pro', 'zh' => '专业版'],
        'harga'    => 99000,
        'ket'      => ['id' => 'Untuk usaha dan tim yang berkembang', 'en' => 'For growing businesses and teams', 'zh' => '适合成长中的企业和团队'],
        'unggulan' => false,
        'fitur'    => [
            'id' => ['Semua fitur aplikasi', '5 pengguna', 'Ekspor data ke Excel & PDF', 'Pembaruan gratis', 'Bantuan prioritas'],
            'en' => ['Every app feature', '5 users', 'Export data to Excel & PDF', 'Free updates', 'Priority support'],
            'zh' => ['应用全部功能', '5 位用户', '导出 Excel 和 PDF', '免费更新', '优先客服支持'],
        ],
    ],
];

/**
 * Pertanyaan yang sering ditanyakan: [pertanyaan, jawaban] untuk tiap bahasa
 */
$faq = [
    [
        'id' => ['Apakah harus membeli semua aplikasi?', 'Tidak. Setiap aplikasi dijual terpisah, jadi kamu cukup membayar aplikasi yang kamu pakai. Masing-masing bisa dicoba gratis selama 14 hari.'],
        'en' => ['Do I have to buy every app?', 'No. Each app is sold separately, so you only pay for the apps you use. Each one comes with a 14-day free trial.'],
        'zh' => ['必须购买所有应用吗？', '不需要。每款应用单独销售，只需为你使用的应用付费，每款都可免费试用 14 天。'],
    ],
    [
        'id' => ['Apa yang terjadi setelah trial 14 hari selesai?', 'Kamu bisa memilih paket untuk terus memakai aplikasinya. Kalau tidak lanjut, tidak ada tagihan apa pun.'],
        'en' => ['What happens after the 14-day trial?', 'You can choose a plan to keep using the app. If you do not continue, you will not be charged anything.'],
        'zh' => ['14 天试用结束后会怎样？', '你可以选择套餐继续使用。如果不续用，不会产生任何费用。'],
    ],
    [
        'id' => ['Apakah harus install aplikasi?', 'Tidak. Aplikasinya cukup dibuka di browser HP, tablet, atau laptop. Kalau mau terasa seperti aplikasi biasa, kamu bisa memasangnya ke layar utama HP tanpa lewat Play Store.'],
        'en' => ['Do I need to install anything?', 'No. The apps open right in the browser on your phone, tablet, or laptop. If you want them to feel like regular apps, you can add them to your home screen without going through the Play Store.'],
        'zh' => ['需要安装吗？', '不需要。应用直接在手机、平板或电脑的浏览器中打开。如果想像普通 App 一样使用，可以直接添加到手机主屏幕，无需通过应用商店。'],
    ],
    [
        'id' => ['Apakah bisa dipakai di HP dengan spesifikasi rendah?', 'Bisa. Tampilannya ringan dan cukup memakai browser seperti Chrome atau Safari versi terbaru.'],
        'en' => ['Does it work on low-end phones?', 'Yes. It is lightweight and only needs an up-to-date browser such as Chrome or Safari.'],
        'zh' => ['配置较低的手机能用吗？', '可以。界面轻量，只需使用最新版的 Chrome 或 Safari 等浏览器。'],
    ],
    [
        'id' => ['Apakah data usaha saya aman?', 'Data disimpan di server dan hanya bisa dibuka dengan akunmu, jadi tetap aman walaupun HP hilang atau rusak.'],
        'en' => ['Is my business data safe?', 'Your data is stored on our servers and can only be opened with your account, so it stays safe even if your phone is lost or broken.'],
        'zh' => ['我的生意数据安全吗？', '数据保存在服务器上，只有登录你的账号才能查看，即使手机丢失或损坏也安全无忧。'],
    ],
    [
        'id' => ['Bagaimana cara membayar langganan?', 'Selama trial 14 hari tidak ada biaya. Setelah itu pembayaran bisa lewat transfer bank, e-wallet, atau QRIS.'],
        'en' => ['How do I pay for a subscription?', 'There is no charge during the 14-day trial. After that you can pay by bank transfer, e-wallet, or QRIS.'],
        'zh' => ['如何支付订阅费用？', '14 天试用期内不收取任何费用。之后可通过银行转账、电子钱包或 QRIS 付款。'],
    ],
    [
        'id' => ['Kapan aplikasinya bisa mulai dipakai?', 'Saat ini aplikasi masih dalam tahap pengembangan. Hubungi kami lewat WhatsApp supaya kamu jadi yang pertama dikabari saat aplikasi sudah bisa dipakai.'],
        'en' => ['When can I start using the apps?', 'The apps are still in development. Contact us on WhatsApp to be the first to know when they are ready.'],
        'zh' => ['什么时候可以开始使用？', '应用目前仍在开发中。通过 WhatsApp 联系我们，应用上线时你将第一时间收到通知。'],
    ],
];

/**
 * Klien & testimoni untuk bagian "Sudah dipakai di berbagai perusahaan dan toko".
 *
 * !!! SEMUA DATA DI BAWAH INI MASIH CONTOH !!!
 * Ganti dengan nama klien dan testimoni ASLI (dengan izin klien) sebelum website dipublikasikan.
 * Testimoni karangan yang ditampilkan seolah-olah asli bisa menyesatkan calon pelanggan.
 * Kosongkan array (= []) untuk menyembunyikan bagiannya.
 */
$klien = [
    ['nama' => 'Toko Sinar Cahaya',    'ikon' => '🏪'],
    ['nama' => 'PT. CMBP', 'ikon' => '🏢'],
    // ['nama' => 'Kafe Contoh',         'ikon' => '☕'],
    ['nama' => 'Cilupba',         'ikon' => '🛒'],
    ['nama' => 'CV Wijaya Ekspres',    'ikon' => '🏭'],
    // ['nama' => 'Butik Contoh',        'ikon' => '👗'],
];

// app: kode aplikasi yang dipakai (lihat 'kode' di $apps). bintang: 1-5
$testimoni = [
    [
        'nama'    => 'Bu Rina',
        'peran'   => ['id' => 'Pemilik', 'en' => 'Owner', 'zh' => '店主'],
        'usaha'   => 'Toko Contoh Jaya',
        'app'     => 'toko',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Dulu tutup toko harus hitung uang satu jam. Sekarang laporan penjualan langsung jadi.',
            'en' => 'Closing the shop used to mean an hour of counting cash. Now the sales report is ready instantly.',
            'zh' => '以前关店要花一个小时点钱，现在销售报表马上就出来。',
        ],
    ],
    [
        'nama'    => 'Pak Hendra',
        'peran'   => ['id' => 'Manajer HR', 'en' => 'HR Manager', 'zh' => '人事经理'],
        'usaha'   => 'PT Contoh Sejahtera',
        'app'     => 'penggajian',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Hitung gaji 40 karyawan yang biasanya dua hari, sekarang selesai dalam beberapa menit.',
            'en' => 'Payroll for 40 employees used to take two days. Now it is done in minutes.',
            'zh' => '过去 40 名员工的工资要算两天，现在几分钟就搞定。',
        ],
    ],
    [
        'nama'    => 'Kak Sinta',
        'peran'   => ['id' => 'Pemilik', 'en' => 'Owner', 'zh' => '店主'],
        'usaha'   => 'Kafe Contoh',
        'app'     => 'notepad',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Resep, daftar belanja, dan jadwal shift ada di satu catatan yang bisa dibuka semua barista.',
            'en' => 'Recipes, shopping lists, and shift schedules live in one note every barista can open.',
            'zh' => '配方、采购清单和排班表都在同一个笔记里，每位咖啡师都能查看。',
        ],
    ],
    [
        'nama'    => 'Mbak Dewi',
        'peran'   => ['id' => 'Pemilik', 'en' => 'Owner', 'zh' => '店主'],
        'usaha'   => 'Butik Contoh',
        'app'     => 'toko-online',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Pesanan dari WhatsApp dan marketplace masuk ke satu tempat. Tidak ada lagi barang terjual dobel.',
            'en' => 'Orders from WhatsApp and marketplaces land in one place. No more selling the same item twice.',
            'zh' => 'WhatsApp 和电商平台的订单都汇总到一处，再也不会超卖了。',
        ],
    ],
    [
        'nama'    => 'Mas Arif',
        'peran'   => ['id' => 'Staf IT', 'en' => 'IT Staff', 'zh' => 'IT 专员'],
        'usaha'   => 'CV Contoh Makmur',
        'app'     => 'it',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Semua laptop dan lisensi kantor tercatat rapi. Keluhan karyawan tidak tercecer di chat lagi.',
            'en' => 'Every office laptop and license is neatly recorded. Staff issues no longer get lost in chats.',
            'zh' => '办公室所有电脑和许可证都记录得清清楚楚，员工报修也不再散落在聊天记录里。',
        ],
    ],
    [
        'nama'    => 'Pak Joko',
        'peran'   => ['id' => 'Pemilik', 'en' => 'Owner', 'zh' => '店主'],
        'usaha'   => 'Contoh Mart',
        'app'     => 'toko',
        'bintang' => 5,
        'isi'     => [
            'id' => 'Stok menipis langsung ketahuan, jadi tidak ada lagi pembeli yang pulang dengan tangan kosong.',
            'en' => 'Low stock shows up right away, so customers no longer leave empty-handed.',
            'zh' => '库存不足马上就能发现，顾客再也不会空手而归。',
        ],
    ],
];

// Ambil teks sesuai bahasa yang sedang dipilih
$site  = terjemahkan($site);
$site['pesan_wa'] = strtr($site['pesan_wa'], ['{nama}' => $site['nama']]);
$apps  = terjemahkan($apps);
$paket = terjemahkan($paket);
$faq   = terjemahkan($faq);
$testimoni = terjemahkan($testimoni);

// Teks tombol, menu, dan judul bagian
require __DIR__ . '/bahasa.php';

/* ------------------------------------------------------------
 *  Fungsi bantuan
 * ------------------------------------------------------------ */

// Amankan teks sebelum ditampilkan di HTML
function e($teks)
{
    return htmlspecialchars((string) $teks, ENT_QUOTES, 'UTF-8');
}

// 49000 -> "Rp 49.000"
function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Link chat WhatsApp, bisa dengan pesan otomatis
function link_wa($pesan = '')
{
    global $site;
    $url = 'https://wa.me/' . $site['whatsapp'];
    return $pesan === '' ? $url : $url . '?text=' . rawurlencode($pesan);
}

// Alamat halaman produk sebuah aplikasi, misalnya produk.php?app=toko-online
function link_produk($app)
{
    return 'produk.php?app=' . rawurlencode($app['kode']);
}

// "Bu Rina" -> "BR" (huruf awal untuk foto profil bulat)
function inisial($nama)
{
    $huruf = '';
    foreach (preg_split('/\s+/u', trim($nama)) as $kata) {
        $huruf .= mb_strtoupper(mb_substr($kata, 0, 1));
    }
    return mb_substr($huruf, 0, 2);
}

// Link tombol "Coba gratis 14 hari" sebuah aplikasi:
// ke alamat aplikasinya kalau 'url' sudah diisi, kalau belum ke WhatsApp.
function link_trial($app)
{
    if (!empty($app['url'])) {
        return $app['url'];
    }
    return link_wa($app['kode'] === 'lainnya' ? t('wa_request') : t('wa_trial', ['{app}' => $app['nama']]));
}

// Tambahkan ?v=waktu-file-diubah, supaya browser selalu memuat CSS/JS terbaru setelah kamu edit
function aset($path)
{
    $file = __DIR__ . '/' . $path;
    return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
}

// Ubah semua ['id' => .., 'en' => .., 'zh' => ..] menjadi teks bahasa yang sedang dipakai
function terjemahkan($data)
{
    global $lang;
    if (!is_array($data)) {
        return $data;
    }
    if (isset($data['id']) && !array_diff_key($data, ['id' => 1, 'en' => 1, 'zh' => 1])) {
        return $data[$lang] ?? $data['id'];
    }
    return array_map('terjemahkan', $data);
}

// Ambil teks dari bahasa.php. {nama} otomatis diganti nama usaha.
// Kunci yang berakhiran _html boleh berisi tag HTML (ditampilkan tanpa e()).
function t($kunci, $ganti = [])
{
    global $teks, $site;
    $hasil = terjemahkan($teks[$kunci] ?? $kunci);
    if (is_array($hasil)) {
        return $hasil;
    }
    $ganti += ['{nama}' => $site['nama']];
    if (substr($kunci, -5) === '_html') {
        $ganti = array_map('e', $ganti);
    }
    return strtr($hasil, $ganti);
}

// Judul dengan animasi muncul per kata. Bagian di dalam [kurung siku] diberi warna sorot.
// Bahasa Mandarin tidak memakai spasi, jadi dipecah per huruf.
function judul_animasi($teks)
{
    global $lang;
    $html = '';
    $i    = 0;
    $tambah = function ($bagian) use (&$html, &$i, $lang) {
        $potongan = $lang === 'zh'
            ? preg_split('//u', $bagian, -1, PREG_SPLIT_NO_EMPTY)
            : preg_split('/(\s+)/u', $bagian, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        foreach ($potongan as $p) {
            $html .= trim($p) === '' ? ' ' : '<span class="kata" style="--i:' . $i++ . '">' . e($p) . '</span>';
        }
    };

    // [1] sebelum sorot, [2] teks sorot, [3] tanda baca yang menempel, [4] sesudahnya
    if (preg_match('/^(.*?)\[(.+?)\]([^\s\p{L}\p{N}]*)(.*)$/su', $teks, $m)) {
        $tambah($m[1]);
        $html .= '<span class="kata" style="--i:' . $i++ . '"><span class="sorot">' . e($m[2])
            . '<svg class="coretan" viewBox="0 0 200 12" preserveAspectRatio="none"><path pathLength="1" d="M3 9C40 3 80 2 112 5s62 6 85-1"/></svg>'
            . '</span>' . e($m[3]) . '</span>';
        $tambah($m[4]);
    } else {
        $tambah($teks);
    }

    return '<span class="sr-only">' . e(str_replace(['[', ']'], '', $teks)) . '</span><span aria-hidden="true">' . $html . '</span>';
}
