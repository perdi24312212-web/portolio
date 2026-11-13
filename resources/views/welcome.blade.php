<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio Web | Setup Laravel</title>
    <style>
        :root { color-scheme: light; font-family: "Segoe UI", sans-serif; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 32px; color: #172033; background: #f3f6fb; }
        main { width: min(680px, 100%); text-align: center; }
        h1 { margin: 0; font-size: clamp(2rem, 5vw, 3.5rem); }
        main p { color: #526078; line-height: 1.6; }
        .portfolio-link { display: inline-flex; margin-top: 12px; padding: 12px 18px; border-radius: 8px; background: #172033; color: white; text-decoration: none; }
        .identity-card { position: fixed; right: 24px; bottom: 24px; width: min(360px, calc(100vw - 32px)); padding: 18px; border-radius: 12px; background: #1e40af; color: white; box-shadow: 0 12px 30px rgb(15 23 42 / 24%); text-align: left; }
        .identity-card h2 { margin: 0 0 10px; font-size: 1.15rem; }
        .identity-card p { margin: 6px 0; color: white; font-size: .95rem; }
        @media (max-width: 760px) {
            body { display: flex; flex-direction: column; justify-content: center; gap: 24px; padding: 40px 20px; }
            .identity-card { position: static; width: min(360px, 100%); margin: 0 auto; }
        }
    </style>
</head>
<body>
    <main>
        <h1>Portofolio Web</h1>
        <p>Latihan 4a: setup Laravel, struktur MVC, dan koneksi MySQL.</p>
        <a class="portfolio-link" href="{{ url('/portfolio') }}">Buka website portofolio</a>
    </main>

    <aside class="identity-card" aria-label="Status aplikasi dan identitas mahasiswa">
        <h2>Perdi</h2>
        <p>NPM: 24312212</p>
        <p>Kelas: Informatika Angkatan 2024</p>
        <p>Laravel {{ app()->version() }} Berjalan</p>
        <p>DB: {{ DB::connection()->getDatabaseName() }} Terhubung</p>
    </aside>
</body>
</html>
