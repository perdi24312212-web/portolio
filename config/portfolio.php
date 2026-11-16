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
    'role' => 'Web Developer | PHP, Laravel & MySQL',
    'tagline' => 'Web developer yang berfokus pada pengembangan aplikasi menggunakan PHP dan Laravel, dari pengelolaan data hingga antarmuka web yang responsif.',
    'short_bio' => 'Saya berfokus pada pengembangan aplikasi web, pengelolaan data, dan antarmuka yang mudah digunakan.',
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
        'Saya mengembangkan aplikasi web menggunakan PHP dan Laravel, dengan perhatian pada struktur aplikasi, pengelolaan data, dan kebutuhan pengguna.',
        'Saat ini saya menempuh pendidikan S1 Informatika dan aktif memperdalam pengembangan web melalui proyek serta kegiatan organisasi.',
        'Saya terbuka untuk kesempatan kerja dan kolaborasi yang memberi ruang untuk belajar, berkontribusi, dan mengembangkan solusi digital.',
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
            'description' => 'Berpartisipasi dalam kegiatan organisasi dan berkolaborasi dalam kegiatan kemahasiswaan.',
        ],
        [
            'period' => '2024 - Sekarang',
            'title' => 'Freelance Web Developer & Projects',
            'company' => 'Studi Mandiri & Klien Lokal',
            'location' => 'Remote / Bandar Lampung',
            'description' => 'Mengembangkan kemampuan melalui proyek mandiri yang berfokus pada website dan sistem informasi menggunakan Laravel.',
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

