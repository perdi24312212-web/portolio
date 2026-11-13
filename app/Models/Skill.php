<?php

namespace App\Models;

class Skill
{
    public static function query(): self
    {
        return new self();
    }

    public function orderBy(string $column, string $direction = 'asc'): self
    {
        return $this;
    }

    public function get(): array
    {
        $skills = config('portfolio.skills', []);
        $items = [];

        foreach ($skills as $group => $list) {
            foreach ($list as $skill) {
                $items[] = [
                    'id' => count($items) + 1,
                    'name' => $skill['name'] ?? '',
                    'category' => $group,
                    'icon' => $skill['icon'] ?? strtolower(str_replace(' ', '-', ($skill['name'] ?? 'skill'))),
                ];
            }
        }

        usort($items, fn($a, $b) => [$a['category'], $a['name']] <=> [$b['category'], $b['name']]);

        return $items;
    }
}

