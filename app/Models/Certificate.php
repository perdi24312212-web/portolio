<?php

namespace App\Models;

class Certificate
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
        $certificates = config('portfolio.certificates', []);

        if (! empty($certificates)) {
            return $certificates;
        }

        return [
            [
                'id' => 1,
                'title' => 'Belajar Membuat Aplikasi Web dengan Laravel',
                'issuer' => 'Dicoding Indonesia',
                'issued_date' => '2024-11-01',
                'credential_url' => 'https://www.dicoding.com/certificates/',
                'description' => 'Sertifikasi pengembangan aplikasi web dengan framework Laravel dari platform Dicoding.',
            ],
        ];
    }
}

