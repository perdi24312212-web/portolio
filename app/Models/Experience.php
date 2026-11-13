<?php

namespace App\Models;

class Experience
{
    public static function query(): self
    {
        return new self();
    }

    public function orderByRaw(string $sql): self
    {
        return $this;
    }

    public function orderBy(string $column, string $direction = 'asc'): self
    {
        return $this;
    }

    public function get(): array
    {
        return config('portfolio.experience', []);
    }
}

