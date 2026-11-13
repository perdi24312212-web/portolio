<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $profile = Profile::create([
            'full_name' => 'Perdi',
            'headline' => 'Full-Stack Web Developer & Mahasiswa S1 Informatika',
            'bio' => 'Mahasiswa S1 Informatika (NPM: 24312212) yang fokus membangun aplikasi web modern menggunakan PHP, Laravel, dan Tailwind CSS.',
            'photo_url' => 'images/foto.jpg',
            'cv_url' => null,
            'email' => 'perdi24312212@gmail.com',
            'phone' => '085319147609',
            'location' => 'Bandar Lampung, Indonesia',
            'github_url' => 'https://github.com/perdi24312212',
            'linkedin_url' => 'https://linkedin.com/in/perdi-informatika',
            'instagram_url' => null,
        ]);

        $html = Skill::create(['name' => 'HTML5', 'category' => 'Frontend', 'level' => 'Advanced', 'icon' => 'html5']);
        $tailwind = Skill::create(['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 'Advanced', 'icon' => 'tailwind']);
        $js = Skill::create(['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 'Intermediate', 'icon' => 'javascript']);
        $php = Skill::create(['name' => 'PHP', 'category' => 'Backend', 'level' => 'Intermediate', 'icon' => 'php']);
        $laravel = Skill::create(['name' => 'Laravel', 'category' => 'Backend', 'level' => 'Intermediate', 'icon' => 'laravel']);
        $mysql = Skill::create(['name' => 'MySQL', 'category' => 'Database', 'level' => 'Intermediate', 'icon' => 'mysql']);
        $git = Skill::create(['name' => 'Git & GitHub', 'category' => 'Tools', 'level' => 'Advanced', 'icon' => 'git']);

        $project1 = Project::create([
            'title' => 'Aplikasi Portofolio Personal Responsif',
            'slug' => Str::slug('Aplikasi Portofolio Personal Responsif'),
            'summary' => 'Portfolio personal responsif dengan desain modern.',
            'description' => 'Website portofolio personal responsif dengan desain modern, teknologi frontend modern, dan struktur layout yang komunikatif.',
            'thumbnail_url' => null,
            'demo_url' => null,
            'github_url' => 'https://github.com/perdi24312212/portfolio-personal',
            'is_featured' => true,
        ]);
        $project1->skills()->sync([$html->id, $tailwind->id, $js->id]);

        $project2 = Project::create([
            'title' => 'Sistem Informasi Kasir Sederhana',
            'slug' => Str::slug('Sistem Informasi Kasir Sederhana'),
            'summary' => 'Kasir sederhana berbasis web untuk kebutuhan transaksi.',
            'description' => 'Aplikasi kasir sederhana untuk mengelola transaksi, stok, dan laporan dasar usaha kecil.',
            'thumbnail_url' => null,
            'demo_url' => null,
            'github_url' => 'https://github.com/perdi24312212/kasir-sederhana',
            'is_featured' => false,
        ]);
        $project2->skills()->sync([$git->id]);

        $project3 = Project::create([
            'title' => 'RESTful API Manajemen Pengguna',
            'slug' => Str::slug('RESTful API Manajemen Pengguna'),
            'summary' => 'API CRUD pengguna berbasis Laravel dan MySQL.',
            'description' => 'API RESTful untuk mengelola pengguna dengan autentikasi, validasi, dan data store di MySQL.',
            'thumbnail_url' => null,
            'demo_url' => null,
            'github_url' => 'https://github.com/perdi24312212/api-user-management',
            'is_featured' => true,
        ]);
        $project3->skills()->sync([$php->id, $laravel->id, $mysql->id]);

        Experience::create([
            'title' => 'Mahasiswa S1 Teknik Informatika',
            'organization' => 'Universitas Lampung',
            'type' => 'Pendidikan',
            'start_date' => '2023-09-01',
            'end_date' => null,
            'is_current' => true,
            'description' => 'Menempuh studi S1 Teknik Informatika dengan fokus pada perangkat lunak, database, dan web development.',
        ]);

        Experience::create([
            'title' => 'Staff Divisi Humas HMIF',
            'organization' => 'Himpunan Mahasiswa Informatika',
            'type' => 'Organisasi',
            'start_date' => '2024-01-10',
            'end_date' => null,
            'is_current' => true,
            'description' => 'Mengelola komunikasi publik, dokumentasi kegiatan, dan publikasi acara organisasi.',
        ]);

        Certificate::create([
            'title' => 'Belajar Dasar Pemrograman Web',
            'issuer' => 'Dicoding Academy',
            'issued_date' => '2024-03-15',
            'credential_url' => 'https://www.dicoding.com/certificates/',
            'description' => 'Sertifikat dasar pemrograman web untuk pengembangan frontend dan logika dasar web.',
        ]);
    }
}

