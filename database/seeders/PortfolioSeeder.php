<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Certificate;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ----------------------------------------------------------------
        // 1. Profile
        // ----------------------------------------------------------------
        Profile::create([
            'full_name'      => 'Perdi',
            'headline'       => 'Full-Stack Web Developer & Mahasiswa S1 Informatika',
            'bio'            => 'Mahasiswa S1 Informatika (NPM: 24312212) yang berfokus membangun aplikasi web modern menggunakan Laravel, PHP OOP Class, dan Tailwind CSS. Aktif di HIMA Informatika dan berpengalaman dalam pengembangan sistem informasi berbasis web.',
            'photo_url'      => 'images/foto.jpg',
            'cv_url'         => null,
            'email'          => 'perdi24312212@gmail.com',
            'phone'          => '085319147609',
            'location'       => 'Bandar Lampung, Indonesia',
            'github_url'     => 'https://github.com/perdi24312212',
            'linkedin_url'   => 'https://linkedin.com/in/perdi-informatika',
            'instagram_url'  => null,
        ]);

        // ----------------------------------------------------------------
        // 2. Skills (7 skill, kategori bervariasi)
        // ----------------------------------------------------------------
        $skills = Skill::insert([
            ['name' => 'Laravel',         'category' => 'Backend',   'level' => 'Advanced',      'icon' => 'laravel',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP OOP',         'category' => 'Backend',   'level' => 'Advanced',      'icon' => 'php',      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL',           'category' => 'Database',  'level' => 'Intermediate',  'icon' => 'mysql',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tailwind CSS',    'category' => 'Frontend',  'level' => 'Advanced',      'icon' => 'tailwind', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript ES6+', 'category' => 'Frontend',  'level' => 'Intermediate',  'icon' => 'js',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Git & GitHub',    'category' => 'Tools',     'level' => 'Intermediate',  'icon' => 'git',      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'VS Code',         'category' => 'Tools',     'level' => 'Advanced',      'icon' => 'vscode',   'created_at' => now(), 'updated_at' => now()],
        ]);

        $skillLaravel  = Skill::where('name', 'Laravel')->first();
        $skillPhp      = Skill::where('name', 'PHP OOP')->first();
        $skillMysql    = Skill::where('name', 'MySQL')->first();
        $skillTailwind = Skill::where('name', 'Tailwind CSS')->first();
        $skillJs       = Skill::where('name', 'JavaScript ES6+')->first();
        $skillGit      = Skill::where('name', 'Git & GitHub')->first();

        // ----------------------------------------------------------------
        // 3. Projects (3 project + sync ke skill)
        // ----------------------------------------------------------------
        $project1 = Project::create([
            'title'         => 'Sistem Manajemen Kelas & Tugas Online',
            'slug'          => Str::slug('Sistem Manajemen Kelas & Tugas Online'),
            'summary'       => 'Aplikasi e-classroom interaktif berbasis Laravel MVC.',
            'description'   => 'Aplikasi manajemen kelas virtual lengkap dengan arsitektur Class Controller Laravel. Menyediakan fitur manajemen materi, absensi mahasiswa, penugasan otomatis, dan penilaian real-time dengan sistem role Dosen & Mahasiswa.',
            'thumbnail_url' => null,
            'demo_url'      => null,
            'github_url'    => 'https://github.com/perdi24312212/sim-kelas',
            'is_featured'   => true,
        ]);
        $project1->skills()->sync([
            $skillLaravel->id,
            $skillPhp->id,
            $skillMysql->id,
            $skillTailwind->id,
        ]);

        $project2 = Project::create([
            'title'         => 'Aplikasi Point of Sale (POS) & Inventori',
            'slug'          => Str::slug('Aplikasi Point of Sale POS dan Inventori'),
            'summary'       => 'Sistem kasir dan manajemen stok untuk UMKM.',
            'description'   => 'Sistem kasir dan pembukuan stok toko UMKM. Dibuat dengan modul class PHP terstruktur, cetak nota struk otomatis, serta visualisasi grafik penjualan bulanan menggunakan Chart.js.',
            'thumbnail_url' => null,
            'demo_url'      => null,
            'github_url'    => 'https://github.com/perdi24312212/pos-inventori',
            'is_featured'   => true,
        ]);
        $project2->skills()->sync([
            $skillLaravel->id,
            $skillPhp->id,
            $skillMysql->id,
            $skillTailwind->id,
            $skillJs->id,
        ]);

        $project3 = Project::create([
            'title'         => 'Website Portal Informasi HIMA Informatika',
            'slug'          => Str::slug('Website Portal Informasi HIMA Informatika'),
            'summary'       => 'Platform publikasi kegiatan organisasi mahasiswa informatika.',
            'description'   => 'Platform resmi publikasi kegiatan, artikel teknologi, pendaftaran divisi anggota, dan dokumentasi event HIMA Informatika. Dilengkapi dark/light mode dan desain responsif.',
            'thumbnail_url' => null,
            'demo_url'      => null,
            'github_url'    => 'https://github.com/perdi24312212/portal-hima',
            'is_featured'   => false,
        ]);
        $project3->skills()->sync([
            $skillLaravel->id,
            $skillTailwind->id,
            $skillJs->id,
            $skillGit->id,
        ]);

        // ----------------------------------------------------------------
        // 4. Experiences (2 pengalaman)
        // ----------------------------------------------------------------
        Experience::create([
            'title'        => 'Pengembang Web & Anggota Aktif',
            'organization' => 'HIMA Informatika',
            'type'         => 'Organisasi',
            'start_date'   => '2024-09-01',
            'end_date'     => null,
            'is_current'   => true,
            'description'  => 'Aktif di divisi teknologi, mengembangkan aplikasi kemahasiswaan dan workshop pemrograman dasar.',
        ]);

        Experience::create([
            'title'        => 'S1 Teknik Informatika',
            'organization' => 'Fakultas Teknik & Ilmu Komputer (FTIK)',
            'type'         => 'Pendidikan',
            'start_date'   => '2024-09-01',
            'end_date'     => null,
            'is_current'   => true,
            'description'  => 'NPM: 24312212. Mempelajari Struktur Data, OOP, Rekayasa Perangkat Lunak, Basis Data, dan Arsitektur Web.',
        ]);

        // ----------------------------------------------------------------
        // 5. Certificate (1 sertifikat)
        // ----------------------------------------------------------------
        Certificate::create([
            'title'          => 'Belajar Membuat Aplikasi Web dengan Laravel',
            'issuer'         => 'Dicoding Indonesia',
            'issued_date'    => '2024-11-01',
            'credential_url' => 'https://www.dicoding.com/certificates/',
            'description'    => 'Sertifikasi pengembangan aplikasi web dengan framework Laravel dari platform Dicoding.',
        ]);
    }
}

