<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class PortfolioController extends Controller
{
    protected function success(string $message, mixed $data, int $status = 200): array
    {
        return [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ];
    }

    protected function error(string $message, int $status = 404): array
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => null,
        ];
    }

    /**
     * Mengambil data profil publik utama.
     */
    public function profile(): array
    {
        $fallback = config('portfolio', []);
        $profile = Profile::first();

        $payload = [
            'id' => $profile ? ($profile->id ?? 1) : 1,
            'name' => $profile ? ($profile->full_name ?? $profile->name ?? $fallback['name'] ?? 'Perdi') : ($fallback['name'] ?? 'Perdi'),
            'title' => $profile ? ($profile->headline ?? $fallback['role'] ?? 'Full-Stack Web Developer') : ($fallback['role'] ?? 'Full-Stack Web Developer'),
            'email' => $profile ? ($profile->email ?? $fallback['email'] ?? 'perdi24312212@gmail.com') : ($fallback['email'] ?? 'perdi24312212@gmail.com'),
            'phone' => $profile ? ($profile->phone ?? $fallback['phone'] ?? '085319147609') : ($fallback['phone'] ?? '085319147609'),
            'bio' => $profile ? ($profile->bio ?? $fallback['short_bio'] ?? '') : ($fallback['short_bio'] ?? ''),
            'avatar_url' => $profile ? ($profile->photo_url ?? $fallback['photo'] ?? '/images/foto.jpg') : ($fallback['photo'] ?? '/images/foto.jpg'),
            'github_url' => $profile ? ($profile->github_url ?? 'https://github.com/perdi24312212') : 'https://github.com/perdi24312212',
            'linkedin_url' => $profile ? ($profile->linkedin_url ?? 'https://linkedin.com/in/perdi-informatika') : 'https://linkedin.com/in/perdi-informatika',
            'website_url' => $profile ? ($profile->website_url ?? '#') : '#',
        ];

        return $this->success('Profile retrieved successfully.', $payload);
    }

    /**
     * Mengambil daftar skill yang sudah diurutkan.
     */
    public function skills(): array
    {
        $skills = Skill::query()->orderBy('category')->orderBy('name')->get();

        $payload = array_map(function ($skill) {
            return [
                'id' => $skill['id'] ?? 0,
                'name' => $skill['name'] ?? '',
                'category' => $skill['category'] ?? '',
                'icon_class' => $skill['icon'] ?? '',
            ];
        }, $skills);

        return $this->success('Skills retrieved successfully.', [
            'total' => count($payload),
            'items' => $payload,
        ]);
    }

    /**
     * Mengambil daftar project dengan relasi skill.
     */
    public function projects(): array
    {
        $projects = config('portfolio.projects', []);
        $skillMap = [
            'Laravel' => ['id' => 1, 'name' => 'Laravel', 'category' => 'Backend'],
            'PHP OOP' => ['id' => 2, 'name' => 'PHP OOP', 'category' => 'Backend'],
            'MySQL' => ['id' => 3, 'name' => 'MySQL', 'category' => 'Database'],
            'Tailwind CSS' => ['id' => 4, 'name' => 'Tailwind CSS', 'category' => 'Frontend'],
            'JavaScript' => ['id' => 5, 'name' => 'JavaScript', 'category' => 'Frontend'],
            'Blade' => ['id' => 6, 'name' => 'Blade', 'category' => 'Frontend'],
            'GitHub' => ['id' => 7, 'name' => 'GitHub', 'category' => 'Tools'],
        ];

        $payload = array_map(function ($project) use ($skillMap) {
            $tags = $project['tags'] ?? [];
            $skills = array_values(array_filter(array_map(function ($tag) use ($skillMap) {
                return $skillMap[$tag] ?? null;
            }, $tags)));

            $slug = $project['slug'] ?? strtolower(preg_replace('/[^a-z0-9]+/i', '-', $project['title'] ?? 'project'));

            return [
                'id' => $project['id'] ?? 0,
                'title' => $project['title'] ?? '',
                'slug' => trim($slug, '-'),
                'description' => $project['description'] ?? '',
                'thumbnail_url' => $project['thumbnail_url'] ?? '',
                'demo_url' => $project['demo'] ?? '#',
                'repo_url' => $project['repo'] ?? '#',
                'is_featured' => $project['featured'] ?? false,
                'skills' => $skills,
            ];
        }, $projects);

        return $this->success('Projects retrieved successfully.', [
            'total' => count($payload),
            'items' => $payload,
        ]);
    }

    /**
     * Mengambil detail satu project berdasarkan slug.
     */
    public function projectDetail(string $slug): array
    {
        $projects = config('portfolio.projects', []);
        $project = null;

        foreach ($projects as $item) {
            $currentSlug = $item['slug'] ?? strtolower(preg_replace('/[^a-z0-9]+/i', '-', $item['title'] ?? 'project'));
            $currentSlug = trim($currentSlug, '-');

            if ($currentSlug === $slug) {
                $project = $item;
                break;
            }
        }

        if (! $project) {
            return $this->error('Project not found.', 404);
        }

        $skillMap = [
            'Laravel' => ['id' => 1, 'name' => 'Laravel', 'category' => 'Backend'],
            'PHP OOP' => ['id' => 2, 'name' => 'PHP OOP', 'category' => 'Backend'],
            'MySQL' => ['id' => 3, 'name' => 'MySQL', 'category' => 'Database'],
            'Tailwind CSS' => ['id' => 4, 'name' => 'Tailwind CSS', 'category' => 'Frontend'],
            'JavaScript' => ['id' => 5, 'name' => 'JavaScript', 'category' => 'Frontend'],
            'Blade' => ['id' => 6, 'name' => 'Blade', 'category' => 'Frontend'],
            'GitHub' => ['id' => 7, 'name' => 'GitHub', 'category' => 'Tools'],
        ];

        $projectTags = $project['tags'] ?? [];
        $projectSkills = array_values(array_filter(array_map(function ($tag) use ($skillMap) {
            return $skillMap[$tag] ?? null;
        }, $projectTags)));

        return $this->success('Project detail retrieved successfully.', [
            'id' => $project['id'] ?? 0,
            'title' => $project['title'] ?? '',
            'slug' => $slug,
            'description' => $project['description'] ?? '',
            'thumbnail_url' => $project['thumbnail_url'] ?? '',
            'demo_url' => $project['demo'] ?? '#',
            'repo_url' => $project['repo'] ?? '#',
            'is_featured' => $project['featured'] ?? false,
            'skills' => $projectSkills,
        ]);
    }

    /**
     * Mengambil daftar pengalaman kerja dan pendidikan.
     */
    public function experiences(): array
    {
        $experiences = Experience::query()->orderByRaw('is_current DESC, start_date DESC')->get();

        $payload = array_map(function ($experience) {
            return [
                'id' => $experience['id'] ?? 0,
                'title' => $experience['title'] ?? '',
                'organization' => $experience['company'] ?? $experience['organization'] ?? '',
                'type' => $experience['type'] ?? '',
                'start_date' => $experience['period'] ?? '',
                'end_date' => $experience['end_date'] ?? null,
                'is_current' => (bool) ($experience['is_current'] ?? false),
                'description' => $experience['description'] ?? '',
            ];
        }, $experiences);

        return $this->success('Experiences retrieved successfully.', [
            'total' => count($payload),
            'items' => $payload,
        ]);
    }

    /**
     * Mengambil daftar sertifikat yang telah diterbitkan.
     */
    public function certificates(): array
    {
        $certificates = Certificate::query()->orderBy('issued_date', 'desc')->get();

        $payload = array_map(function ($certificate) {
            return [
                'id' => $certificate['id'] ?? 0,
                'title' => $certificate['title'] ?? '',
                'issuer' => $certificate['issuer'] ?? '',
                'issued_date' => $certificate['issued_date'] ?? '',
                'credential_url' => $certificate['credential_url'] ?? '#',
                'description' => $certificate['description'] ?? '',
            ];
        }, $certificates);

        return $this->success('Certificates retrieved successfully.', [
            'total' => count($payload),
            'items' => $payload,
        ]);
    }
}
