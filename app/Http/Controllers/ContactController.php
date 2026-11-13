<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['prohibited'], // honeypot anti-spam
        ]);

        $body = "Dari: {$data['name']} <{$data['email']}>\n"
            ."Subjek: ".($data['subject'] ?? '-')."\n\n"
            .$data['message'];

        try {
            Mail::raw($body, function ($mail) use ($data) {
                $mail->to(config('portfolio.email'))
                    ->replyTo($data['email'], $data['name'])
                    ->subject('[Portofolio] '.($data['subject'] ?: 'Pesan baru'));
            });
        } catch (\Throwable $e) {
            // Jika SMTP belum diatur, pesan tetap tersimpan di storage/logs/laravel.log
            Log::warning('Pesan kontak (mail gagal): '.$body);
        }

        return redirect()->to(route('home').'#contact')
            ->with('status', 'Terima kasih! Pesan Anda sudah terkirim, saya akan segera membalas.');
    }
}
