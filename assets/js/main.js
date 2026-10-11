/* UMKMku — interaksi & animasi halaman (JavaScript biasa, tanpa library) */
(function () {
  'use strict';

  const root = document.documentElement;
  const kurangiGerak = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  // Efek kursor hanya untuk mouse (bukan layar sentuh)
  const pakaiMouse = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  // ---------- 1. Mode terang / gelap ----------
  const tombolTema = document.querySelector('[data-tombol-tema]');
  const metaWarna = document.querySelector('meta[name="theme-color"]');

  function pasangTema(tema) {
    root.dataset.tema = tema;
    if (tombolTema) tombolTema.setAttribute('aria-pressed', String(tema === 'gelap'));
    if (metaWarna && metaWarna.dataset[tema]) metaWarna.content = metaWarna.dataset[tema];
  }

  function temaTersimpan() {
    try { return localStorage.getItem('tema'); } catch (e) { return null; }
  }

  pasangTema(root.dataset.tema === 'gelap' ? 'gelap' : 'terang');

  if (tombolTema) {
    tombolTema.addEventListener('click', () => {
      const baru = root.dataset.tema === 'gelap' ? 'terang' : 'gelap';
      try { localStorage.setItem('tema', baru); } catch (e) { /* mode privat */ }

      if (!document.startViewTransition || kurangiGerak) {
        pasangTema(baru);
        return;
      }

      // Tema baru muncul sebagai lingkaran yang membesar dari tombol (View Transitions API)
      const r = tombolTema.getBoundingClientRect();
      const x = r.left + r.width / 2;
      const y = r.top + r.height / 2;
      const jari = Math.hypot(Math.max(x, window.innerWidth - x), Math.max(y, window.innerHeight - y));

      root.classList.add('ganti-tema');
      const transisi = document.startViewTransition(() => pasangTema(baru));
      transisi.ready.then(() => {
        root.animate(
          { clipPath: [`circle(0px at ${x}px ${y}px)`, `circle(${jari}px at ${x}px ${y}px)`] },
          { duration: 700, easing: 'cubic-bezier(.22, 1, .36, 1)', pseudoElement: '::view-transition-new(root)' }
        );
      }).catch(() => {});
      transisi.finished.finally(() => root.classList.remove('ganti-tema'));
    });
  }

  // Ikuti pengaturan HP/laptop selama pengunjung belum memilih sendiri
  const mediaGelap = window.matchMedia('(prefers-color-scheme: dark)');
  if (mediaGelap.addEventListener) {
    mediaGelap.addEventListener('change', (e) => {
      if (!temaTersimpan()) pasangTema(e.matches ? 'gelap' : 'terang');
    });
  }

  // ---------- 2. Pilihan bahasa ----------
  const pilihBahasa = document.querySelector('[data-bahasa]');
  if (pilihBahasa) {
    const tombolBahasa = pilihBahasa.querySelector('[data-tombol-bahasa]');
    const aturBahasa = (buka) => {
      pilihBahasa.classList.toggle('buka', buka);
      tombolBahasa.setAttribute('aria-expanded', String(buka));
    };

    tombolBahasa.addEventListener('click', () => aturBahasa(!pilihBahasa.classList.contains('buka')));
    document.addEventListener('click', (e) => {
      if (!pilihBahasa.contains(e.target)) aturBahasa(false);
    });
    pilihBahasa.addEventListener('focusout', (e) => {
      if (!pilihBahasa.contains(e.relatedTarget)) aturBahasa(false);
    });
    pilihBahasa.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && pilihBahasa.classList.contains('buka')) {
        aturBahasa(false);
        tombolBahasa.focus();
      }
    });

    // Setelah ganti bahasa, langsung kembali ke bagian yang sedang dibaca
    pilihBahasa.querySelectorAll('[data-ganti-bahasa]').forEach((link) => {
      link.addEventListener('click', () => {
        const bagian = Array.from(document.querySelectorAll('main section[id]'))
          .filter((s) => s.getBoundingClientRect().top <= 120)
          .pop();
        if (bagian && window.scrollY > 200) link.hash = bagian.id;
      });
    });
  }

  // ---------- 3. Menu di HP (tombol garis tiga) ----------
  const tombolMenu = document.querySelector('[data-tombol-menu]');
  const menu = document.querySelector('[data-menu]');
  const diLuarMenu = document.querySelectorAll('main, footer, .wa-melayang');

  function aturMenu(buka) {
    tombolMenu.setAttribute('aria-expanded', String(buka));
    tombolMenu.querySelector('.sr-only').textContent = buka ? tombolMenu.dataset.tutup : tombolMenu.dataset.buka;
    menu.classList.toggle('terbuka', buka);
    root.classList.toggle('menu-terbuka', buka);
    // Selama menu terbuka, isi halaman di belakangnya tidak bisa difokus
    diLuarMenu.forEach((el) => { el.inert = buka; });
  }

  if (tombolMenu && menu) {
    tombolMenu.addEventListener('click', () => {
      aturMenu(tombolMenu.getAttribute('aria-expanded') !== 'true');
    });
    // Tutup menu setelah salah satu link diklik
    menu.addEventListener('click', (e) => {
      if (e.target.closest('a')) aturMenu(false);
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menu.classList.contains('terbuka')) {
        aturMenu(false);
        tombolMenu.focus();
      }
    });
    // Kalau layar dilebarkan sampai tampilan laptop, tutup menu HP
    const mediaLaptop = window.matchMedia('(min-width: 900px)');
    if (mediaLaptop.addEventListener) {
      mediaLaptop.addEventListener('change', (e) => { if (e.matches) aturMenu(false); });
    }
  }

  // ---------- 3b. Menu "Produk" ----------
  // Laptop: terbuka saat kursor di atasnya. HP: terbuka/tutup saat diketuk (di dalam menu layar penuh).
  const layarLebar = window.matchMedia('(min-width: 900px)');
  document.querySelectorAll('[data-dropdown]').forEach((dd) => {
    const tombol = dd.querySelector('[data-dropdown-tombol]');
    let jedaTutup = null;
    const atur = (buka) => {
      clearTimeout(jedaTutup);
      dd.classList.toggle('buka', buka);
      tombol.setAttribute('aria-expanded', String(buka));
    };
    const pakaiHover = () => pakaiMouse && layarLebar.matches;

    tombol.addEventListener('click', () => {
      // Di laptop klik selalu membuka (menutupnya cukup geser kursor keluar / Escape)
      atur(pakaiHover() ? true : !dd.classList.contains('buka'));
    });
    dd.addEventListener('mouseenter', () => { if (pakaiHover()) atur(true); });
    dd.addEventListener('mouseleave', () => {
      if (pakaiHover()) jedaTutup = setTimeout(() => atur(false), 160);
    });
    dd.addEventListener('focusout', (e) => {
      if (layarLebar.matches && !dd.contains(e.relatedTarget)) atur(false);
    });
    dd.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && dd.classList.contains('buka')) {
        e.stopPropagation();
        atur(false);
        tombol.focus();
      }
    });
    document.addEventListener('click', (e) => {
      if (layarLebar.matches && !dd.contains(e.target)) atur(false);
    });
  });

  // ---------- 4. Header kapsul & garis kemajuan saat di-scroll ----------
  const kepala = document.querySelector('[data-kepala]');
  const progres = document.querySelector('.progres-gulir');
  const timelineDidukung = window.CSS && CSS.supports && CSS.supports('animation-timeline: scroll()');
  let antreScroll = false;

  function cekScroll() {
    antreScroll = false;
    const y = window.scrollY;
    if (kepala) kepala.classList.toggle('bergulir', y > 12);
    if (progres && !timelineDidukung) {
      const maks = root.scrollHeight - window.innerHeight;
      progres.style.transform = 'scaleX(' + (maks > 0 ? y / maks : 0) + ')';
    }
  }
  window.addEventListener('scroll', () => {
    if (!antreScroll) {
      antreScroll = true;
      requestAnimationFrame(cekScroll);
    }
  }, { passive: true });
  cekScroll();

  // Tandai menu sesuai bagian yang sedang dibaca
  const linkMenu = Array.from(document.querySelectorAll('.nav > a[href*="#"]'));
  if (linkMenu.length && 'IntersectionObserver' in window) {
    const petaBagian = new Map();
    linkMenu.forEach((a) => {
      const bagian = document.getElementById(a.hash.slice(1));
      if (bagian) petaBagian.set(bagian, a);
    });
    const pengintai = new IntersectionObserver((daftar) => {
      daftar.forEach((item) => {
        const link = petaBagian.get(item.target);
        if (item.isIntersecting) {
          linkMenu.forEach((a) => a.classList.toggle('aktif', a === link));
        } else {
          link.classList.remove('aktif');
        }
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    petaBagian.forEach((_, bagian) => pengintai.observe(bagian));
  }

  // ---------- 5. Pilihan harga bulanan / tahunan ----------
  const grupPeriode = document.querySelector('.pilih-periode');
  const tombolPeriode = document.querySelectorAll('[data-periode]');

  // Penanda hijau bergeser ke tombol yang aktif
  function geserPenanda() {
    const aktif = grupPeriode && grupPeriode.querySelector('[aria-pressed="true"]');
    if (!aktif) return;
    grupPeriode.style.setProperty('--x', aktif.offsetLeft + 'px');
    grupPeriode.style.setProperty('--w', aktif.offsetWidth + 'px');
  }
  if (grupPeriode) {
    geserPenanda();
    requestAnimationFrame(() => requestAnimationFrame(() => grupPeriode.classList.add('siap')));
    window.addEventListener('resize', geserPenanda);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(geserPenanda);
  }

  tombolPeriode.forEach((tombol) => {
    tombol.addEventListener('click', () => {
      const periode = tombol.dataset.periode; // "bulanan" atau "tahunan"
      tombolPeriode.forEach((t) => t.setAttribute('aria-pressed', String(t === tombol)));
      geserPenanda();
      document.querySelectorAll('[data-bulanan]').forEach((el) => {
        el.textContent = el.dataset[periode];
        // Ulangi animasi ganti harga
        el.classList.remove('ganti');
        void el.offsetWidth;
        el.classList.add('ganti');
      });
    });
  });

  // ---------- 6. Angka yang dihitung naik ----------
  const formatAngka = new Intl.NumberFormat('id-ID');

  function hitung(el) {
    const target = Number(el.dataset.hitung) || 0;
    const awalan = el.dataset.awalan || '';
    const akhiran = el.dataset.akhiran || '';
    const tulis = (n) => { el.textContent = awalan + formatAngka.format(n) + akhiran; };

    if (kurangiGerak) { tulis(target); return; }
    tulis(0);
    const durasi = Number(el.dataset.durasi) || 1800;
    setTimeout(() => {
      const mulai = performance.now();
      const jalan = (sekarang) => {
        const p = Math.min((sekarang - mulai) / durasi, 1);
        tulis(Math.round(target * (1 - Math.pow(1 - p, 4)))); // cepat di awal, melambat di akhir
        if (p < 1) requestAnimationFrame(jalan);
      };
      requestAnimationFrame(jalan);
    }, Number(el.dataset.tunda) || 0);
  }

  // ---------- 7. Animasi muncul saat di-scroll ----------
  const elAmati = document.querySelectorAll('.muncul, [data-amati], [data-hitung]');
  if ('IntersectionObserver' in window) {
    const pengamat = new IntersectionObserver((daftar) => {
      let urutan = 0;
      daftar.forEach((item) => {
        if (!item.isIntersecting) return;
        const el = item.target;
        // Yang muncul bersamaan diberi jeda bergantian
        el.style.setProperty('--tunda', Math.min(urutan++, 6) * 90 + 'ms');
        el.classList.add('tampil');
        if ('hitung' in el.dataset) hitung(el);
        pengamat.unobserve(el);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    elAmati.forEach((el) => pengamat.observe(el));
  } else {
    elAmati.forEach((el) => {
      el.classList.add('tampil');
      if ('hitung' in el.dataset) hitung(el);
    });
  }

  // ---------- 8. Efek kursor: cahaya di kartu, ilustrasi miring 3D, tombol magnet ----------
  if (pakaiMouse && !kurangiGerak) {
    // Cahaya mengikuti kursor. Kartu di dekatnya ikut menyala tepinya.
    document.querySelectorAll('[data-sorot-grup]').forEach((grup) => {
      const kartu = grup.matches('[data-sorot]') ? [grup] : grup.querySelectorAll('[data-sorot]');
      grup.addEventListener('pointermove', (e) => {
        kartu.forEach((k) => {
          const r = k.getBoundingClientRect();
          k.style.setProperty('--mx', (e.clientX - r.left) + 'px');
          k.style.setProperty('--my', (e.clientY - r.top) + 'px');
        });
      });
    });

    // Ilustrasi di hero miring mengikuti posisi kursor
    const tilt = document.querySelector('[data-tilt]');
    if (tilt) {
      const area = tilt.closest('section') || document.body;
      const batasi = (n) => Math.max(-1, Math.min(1, n));
      area.addEventListener('pointermove', (e) => {
        const r = tilt.getBoundingClientRect();
        const x = batasi((e.clientX - r.left) / r.width - 0.5);
        const y = batasi((e.clientY - r.top) / r.height - 0.5);
        tilt.style.setProperty('--ry', (x * 16).toFixed(2) + 'deg');
        tilt.style.setProperty('--rx', (-y * 12).toFixed(2) + 'deg');
      });
      area.addEventListener('pointerleave', () => {
        tilt.style.setProperty('--rx', '0deg');
        tilt.style.setProperty('--ry', '0deg');
      });
    }

    // Tombol sedikit "tertarik" ke arah kursor
    document.querySelectorAll('[data-magnet]').forEach((el) => {
      el.addEventListener('pointermove', (e) => {
        const r = el.getBoundingClientRect();
        el.style.setProperty('--tx', ((e.clientX - r.left - r.width / 2) * 0.25).toFixed(1) + 'px');
        el.style.setProperty('--ty', ((e.clientY - r.top - r.height / 2) * 0.35).toFixed(1) + 'px');
      });
      el.addEventListener('pointerleave', () => {
        el.style.setProperty('--tx', '0px');
        el.style.setProperty('--ty', '0px');
      });
    });
  }

  // ---------- 9. Tombol "Pasang Aplikasi" (PWA) ----------
  // Tombol hanya muncul kalau browser mendukung (misalnya Chrome di Android / laptop).
  let promptPasang = null;
  const tombolPasang = document.querySelectorAll('[data-pasang]');

  window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    promptPasang = e;
    tombolPasang.forEach((t) => { t.hidden = false; });
  });

  tombolPasang.forEach((t) => {
    t.addEventListener('click', async () => {
      if (!promptPasang) return;
      promptPasang.prompt();
      await promptPasang.userChoice;
      promptPasang = null;
      tombolPasang.forEach((x) => { x.hidden = true; });
    });
  });

  window.addEventListener('appinstalled', () => {
    tombolPasang.forEach((x) => { x.hidden = true; });
  });

  // ---------- 10. Jendela info aplikasi (halaman demo) ----------
  const dialog = document.querySelector('[data-dialog-app]');
  if (dialog) {
    const ikon = dialog.querySelector('[data-d-ikon]');
    const nama = dialog.querySelector('[data-d-nama]');
    const desc = dialog.querySelector('[data-d-desc]');
    const fitur = dialog.querySelector('[data-d-fitur]');
    const wa = dialog.querySelector('[data-d-wa]');

    document.querySelectorAll('[data-app]').forEach((app) => {
      app.addEventListener('click', () => {
        const d = app.dataset;
        ikon.textContent = d.ikon;
        dialog.style.setProperty('--warna', d.warna);
        nama.textContent = d.nama;
        desc.textContent = d.desc;
        // Daftar fitur di dalam aplikasi: [[ikon, nama], ...]
        if (fitur) {
          fitur.replaceChildren(...JSON.parse(d.fitur || '[]').map((f) => {
            const li = document.createElement('li');
            li.textContent = f[0] + ' ' + f[1];
            return li;
          }));
        }
        wa.href = d.wa;
        if (d.cta) wa.textContent = d.cta;
        if (typeof dialog.showModal === 'function') {
          dialog.showModal();
        } else {
          dialog.setAttribute('open', '');
        }
      });
    });

    // Klik di luar kotak = tutup
    dialog.addEventListener('click', (e) => {
      if (e.target === dialog) dialog.close();
    });
  }

  // ---------- 11. Daftarkan service worker (syarat PWA, butuh HTTPS) ----------
  if ('serviceWorker' in navigator && (location.protocol === 'https:' || location.hostname === 'localhost')) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('sw.js').catch(() => {});
    });
  }
})();
