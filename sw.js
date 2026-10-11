// Service worker: syarat agar website bisa dipasang di HP, dan tetap tampil saat sinyal hilang.
// Strategi: selalu ambil dari internet dulu, kalau gagal (offline) pakai salinan terakhir.
// Kalau kamu mengubah file ini, naikkan angka versi di bawah (v1 -> v2).
const CACHE = 'umkmku-v2';
const OFFLINE = 'offline.html';

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE)
      .then((cache) => Promise.allSettled([OFFLINE, 'assets/img/logo-ikon.png'].map((url) => cache.add(url))))
      .then(() => self.skipWaiting())
  );
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys()
      .then((keys) => Promise.all(keys.filter((key) => key !== CACHE).map((key) => caches.delete(key))))
      .then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', (event) => {
  const req = event.request;
  if (req.method !== 'GET' || new URL(req.url).origin !== self.location.origin) return;

  event.respondWith(
    fetch(req)
      .then((res) => {
        if (res.ok) {
          const salinan = res.clone();
          caches.open(CACHE).then((cache) => cache.put(req, salinan));
        }
        return res;
      })
      .catch(() =>
        caches.match(req).then((tersimpan) =>
          tersimpan || (req.mode === 'navigate' ? caches.match(OFFLINE) : Response.error())
        )
      )
  );
});
