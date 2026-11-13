<?php

/*
|--------------------------------------------------------------------------
| Data Portofolio — Perdi (NPM: 24312212)
|--------------------------------------------------------------------------
| Konfigurasi data portofolio resmi berbasis Laravel & Tailwind CSS.
*/

return [
    'name' => 'Perdi',
    'full_title' => 'Perdi — S1 Informatika',
    'npm' => '24312212',
    'role' => 'Full-Stack Web Developer & Informatics Student',
    'tagline' => 'Mahasiswa S1 Informatika (NPM: 24312212) yang berfokus menciptakan aplikasi web modern, performa tinggi, dan antarmuka interaktif menggunakan Laravel, PHP OOP Class, dan Tailwind CSS.',
    'short_bio' => 'Passionate dalam rekayasa perangkat lunak, arsitektur Clean Code berbasis Class, dan perancangan antarmuka pengguna yang memukau.',
    'location' => 'Bandar Lampung, Indonesia',
    'email' => 'perdi24312212@gmail.com',
    'alt_email' => 'perdi24312212@fmail.com',
    'phone' => '085319147609',
    'phone_formatted' => '+62 853-1914-7609',
    'whatsapp' => '6285319147609',
    'cv_url' => '#contact',
    'available' => true,
    'photo' => 'images/foto.jpg',

    'about' => [
        'Saya adalah seorang mahasiswa program studi S1 Informatika angkatan 2024 dengan NPM 24312212. Saya memiliki minat mendalam pada pengembangan aplikasi web, perancangan basis data, dan arsitektur sistem berbasis Object-Oriented Programming (OOP Class) dengan Framework Laravel.',
        'Aktif dalam organisasi kemahasiswaan HIMA Informatika, saya terbiasa berkolaborasi dalam tim, memecahkan masalah komputasi, serta mengeksplorasi teknologi web mutakhir seperti Tailwind CSS, REST API, dan ekosistem modern Laravel.',
        'Saya berdedikasi untuk selalu menulis kode yang rapi, terstruktur, mudah di-maintenance, dan menghadirkan pengalaman pengguna (UI/UX) yang intuitif dan berestetika tinggi.',
    ],

    'stats' => [
        ['value' => '24312212', 'label' => 'NPM Mahasiswa'],
        ['value' => '15+', 'label' => 'Proyek & Eksplorasi'],
        ['value' => '10+', 'label' => 'Tech Stack Dikuasai'],
        ['value' => '100%', 'label' => 'Komitmen & Antusiasme'],
    ],

    'socials' => [
        [
            'name' => 'WhatsApp',
            'url' => 'https://wa.me/6285319147609?text=Halo%20Perdi%2C%20saya%20tertarik%20berkolaborasi%20dengan%20Anda',
            'icon' => 'whatsapp',
            'label' => '+62 853-1914-7609',
        ],
        [
            'name' => 'Email',
            'url' => 'mailto:perdi24312212@gmail.com',
            'icon' => 'mail',
            'label' => 'perdi24312212@gmail.com',
        ],
        [
            'name' => 'GitHub',
            'url' => 'https://github.com/perdi24312212',
            'icon' => 'github',
            'label' => 'github.com/perdi24312212',
        ],
        [
            'name' => 'LinkedIn',
            'url' => 'https://linkedin.com/in/perdi-informatika',
            'icon' => 'linkedin',
            'label' => 'linkedin.com/in/perdi',
        ],
    ],

    // level: 0-100
    'skills' => [
        'Backend & Architecture' => [
            ['name' => 'Laravel Framework', 'level' => 88, 'icon' => 'laravel', 'desc' => 'Routing, MVC, Eloquent ORM, Blade, Middleware, Auth'],
            ['name' => 'PHP OOP & Classes', 'level' => 85, 'icon' => 'php', 'desc' => 'Object Oriented, Clean Code, Controller Classes, Service Layer'],
            ['name' => 'MySQL Database', 'level' => 82, 'icon' => 'mysql', 'desc' => 'Schema Design, Relasi, Query Optimization, Migrations'],
            ['name' => 'RESTful API', 'level' => 80, 'icon' => 'api', 'desc' => 'JSON Endpoints, API Auth, Postman Testing, Integrasi Client'],
        ],
        'Frontend & UI/UX' => [
            ['name' => 'Tailwind CSS', 'level' => 92, 'icon' => 'tailwind', 'desc' => 'Utility-First, Responsive Design, Dark Mode, Custom Themes'],
            ['name' => 'JavaScript (ES6+)', 'level' => 78, 'icon' => 'js', 'desc' => 'DOM Manipulation, Fetch API, Async/Await, Micro-interactions'],
            ['name' => 'Blade Templating', 'level' => 88, 'icon' => 'blade', 'desc' => 'Components, Directives, Layouts, Dynamic Rendering'],
            ['name' => 'Responsive UI Design', 'level' => 85, 'icon' => 'ui', 'desc' => 'Mobile First, Glassmorphism, Micro-animations, Accessibility'],
        ],
        'Tools & Lingkungan Kerja' => [
            ['name' => 'Git & GitHub', 'level' => 82, 'icon' => 'git', 'desc' => 'Version Control, Branching, Pull Requests, Repository Collab'],
            ['name' => 'XAMPP & Apache', 'level' => 90, 'icon' => 'xampp', 'desc' => 'Local Server Setup, Virtual Hosts, PHP Configuration'],
            ['name' => 'VS Code & Extensions', 'level' => 92, 'icon' => 'vscode', 'desc' => 'Productive workflow, Blade Snippets, Linter, GitLens'],
            ['name' => 'Figma & UI Prototype', 'level' => 75, 'icon' => 'figma', 'desc' => 'Wireframing, High-fidelity Layouts, Color Systems'],
        ],
    ],

    'projects' => [
        [
            'id' => 'sim-kelas',
            'title' => 'Sistem Manajemen Kelas & Tugas Online',
            'badge' => 'Laravel MVC Class',
            'category' => 'Web App',
            'description' => 'Aplikasi e-classroom interaktif dengan arsitektur Class Controller Laravel. Menyediakan fitur manajemen materi, absensi mahasiswa, penugasan otomatis, dan penilaian real-time.',
            'tags' => ['Laravel', 'PHP OOP', 'Tailwind CSS', 'MySQL'],
            'demo' => '#',
            'repo' => 'https://github.com/perdi24312212/sim-kelas',
            'features' => ['Sistem Autentikasi Role (Dosen & Mahasiswa)', 'Upload & Validasi Tugas File', 'Dashboard Statistik Nilai'],
        ],
        [
            'id' => 'pos-kasir',
            'title' => 'Aplikasi Point of Sale (POS) & Inventori',
            'badge' => 'Full-Stack',
            'category' => 'Web App',
            'description' => 'Sistem kasir dan pembukuan stok toko UMKM. Dibuat dengan modul class PHP terstruktur, cetak nota struk otomatis, serta visualisasi grafik penjualan bulanan.',
            'tags' => ['Laravel', 'Tailwind CSS', 'MySQL', 'Chart.js'],
            'demo' => '#',
            'repo' => 'https://github.com/perdi24312212/pos-inventori',
            'features' => ['Transaksi Kasir Kilat (Scan/Cari)', 'Laporan Keuntungan & Rugi', 'Export Data Excel & PDF'],
        ],
        [
            'id' => 'portal-hima',
            'title' => 'Website Portal Informasi HIMA Informatika',
            'badge' => 'Organisasi',
            'category' => 'Portal',
            'description' => 'Platform resmi publikasi kegiatan, artikel teknologi, pendaftaran divisi anggota, dan dokumentasi event organisasi Himpunan Mahasiswa Informatika.',
            'tags' => ['Laravel', 'Tailwind CSS', 'Blade', 'Responsive'],
            'demo' => '#',
            'repo' => 'https://github.com/perdi24312212/portal-hima',
            'features' => ['Desain Beridentitas Almamater', 'Formulir Registrasi Online', 'Dark & Light Theme Mode'],
        ],
        [
            'id' => 'antrean-layanan',
            'title' => 'Sistem Antrean Layanan Akademik Kampus',
            'badge' => 'Real-time',
            'category' => 'Service',
            'description' => 'Aplikasi antrean loket pelayanan mahasiswa terintegrasi dengan pemanggilan nomor otomatis, layar display antrean, dan estimasi waktu tunggu.',
            'tags' => ['PHP OOP', 'Laravel', 'Tailwind CSS', 'JavaScript'],
            'demo' => '#',
            'repo' => 'https://github.com/perdi24312212/sistem-antrean',
            'features' => ['Display Monitor Loket Antrean', 'Voice Audio Calling Notification', 'Audit Trail Log Pelayanan'],
        ],
    ],

    'experience' => [
        [
            'period' => '2024 - Sekarang',
            'title' => 'Pengembang Web & Anggota Aktif',
            'company' => 'HIMA Informatika (Himpunan Mahasiswa Informatika)',
            'location' => 'Bandar Lampung',
            'description' => 'Berpartisipasi aktif dalam divisi teknologi dan riset. Mengembangkan aplikasi penunjang kegiatan kemahasiswaan dan workshop pemrograman dasar.',
        ],
        [
            'period' => '2024 - Sekarang',
            'title' => 'Freelance Web Developer & Projects',
            'company' => 'Studi Mandiri & Klien Lokal',
            'location' => 'Remote / Bandar Lampung',
            'description' => 'Mengerjakan pembuatan website profil, portal administrasi data, dan sistem informasi berbasis framework Laravel serta Tailwind CSS.',
        ],
    ],

    'education' => [
        [
            'period' => '2024 - Sekarang',
            'title' => 'S1 Teknik Informatika',
            'company' => 'Fakultas Teknik & Ilmu Komputer (FTIK)',
            'location' => 'Bandar Lampung, Indonesia',
            'description' => 'NPM: 24312212. Mempelajari Struktur Data, Pemrograman Berorientasi Objek (OOP Class), Rekayasa Perangkat Lunak, Basis Data, dan Arsitektur Web Modern.',
        ],
    ],
];

