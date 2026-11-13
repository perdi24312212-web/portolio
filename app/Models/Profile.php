<?php

namespace App\Models;

class Profile
{
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function first(): ?self
    {
        $data = config('portfolio', []);

        if (empty($data)) {
            return null;
        }

        return new self([
            'id' => 1,
            'full_name' => $data['name'] ?? 'Perdi',
            'headline' => $data['role'] ?? 'Full-Stack Web Developer',
            'bio' => $data['short_bio'] ?? '',
            'photo_url' => $data['photo'] ?? '/images/foto.jpg',
            'cv_url' => $data['cv_url'] ?? '#',
            'email' => $data['email'] ?? 'perdi24312212@gmail.com',
            'phone' => $data['phone'] ?? '085319147609',
            'github_url' => 'https://github.com/perdi24312212',
            'linkedin_url' => 'https://linkedin.com/in/perdi-informatika',
            'website_url' => '#',
        ]);
    }

    public function __get(string $name)
    {
        return $this->attributes[$name] ?? null;
    }
}

