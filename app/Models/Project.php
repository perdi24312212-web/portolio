<?php

namespace App\Models;

class Project
{
    protected array $filter = [];

    public static function query(): self
    {
        return new self();
    }

    public function with(string $relation): self
    {
        return $this;
    }

    public function orderBy(string $column, string $direction = 'asc'): self
    {
        return $this;
    }

    public function where(string $column, string $value): self
    {
        $this->filter = [$column => $value];
        return $this;
    }

    public function first(): ?array
    {
        $projects = config('portfolio.projects', []);
        $slug = $this->filter['slug'] ?? null;

        foreach ($projects as $project) {
            if ($slug && ($project['id'] ?? $project['title']) === $slug) {
                return $project;
            }
        }

        return null;
    }

    public function get(): array
    {
        return config('portfolio.projects', []);
    }

    public function __construct()
    {
        $this->filter = [];
    }
}

