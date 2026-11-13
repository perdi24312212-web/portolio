<?php

namespace App\Models;

/**
 * Class PortfolioData
 * 
 * Model Class untuk mengelola entitas portofolio mahasiswa (Perdi - NPM 24312212).
 * Menerapkan prinsip Object-Oriented Programming (OOP) pada ekosistem Laravel.
 */
class PortfolioData
{
    protected array $data;

    public function __construct(?array $data = null)
    {
        $this->data = $data ?? config('portfolio', []);
    }

    public static function make(): self
    {
        return new self();
    }

    public function all(): array
    {
        return $this->data;
    }

    public function getName(): string
    {
        return $this->data['name'] ?? 'Perdi';
    }

    public function getNpm(): string
    {
        return $this->data['npm'] ?? '24312212';
    }

    public function getRole(): string
    {
        return $this->data['role'] ?? 'Full-Stack Web Developer & Informatics Student';
    }

    public function getTagline(): string
    {
        return $this->data['tagline'] ?? '';
    }

    public function getEmail(): string
    {
        return $this->data['email'] ?? 'perdi24312212@gmail.com';
    }

    public function getPhone(): string
    {
        return $this->data['phone'] ?? '085319147609';
    }

    public function getPhoneFormatted(): string
    {
        return $this->data['phone_formatted'] ?? '+62 853-1914-7609';
    }

    public function getWhatsapp(): string
    {
        return $this->data['whatsapp'] ?? '6285319147609';
    }

    public function getStats(): array
    {
        return $this->data['stats'] ?? [];
    }

    public function getSkills(): array
    {
        return $this->data['skills'] ?? [];
    }

    public function getProjects(?string $tag = null): array
    {
        $projects = $this->data['projects'] ?? [];
        if (!$tag || $tag === 'all') {
            return $projects;
        }

        return array_values(array_filter($projects, function ($item) use ($tag) {
            return in_array($tag, $item['tags'] ?? [], true);
        }));
    }

    public function getExperience(): array
    {
        return $this->data['experience'] ?? [];
    }

    public function getEducation(): array
    {
        return $this->data['education'] ?? [];
    }

    public function getSocials(): array
    {
        return $this->data['socials'] ?? [];
    }
}
