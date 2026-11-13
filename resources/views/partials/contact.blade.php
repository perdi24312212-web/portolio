<section id="contact" class="py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-6">
        <div class="reveal grid gap-12 lg:grid-cols-[0.85fr_1.15fr]">
            {{-- Contact Information Column --}}
            <div>
                <p class="section-eyebrow">Hubungi Saya</p>
                <h2 class="section-title">Mari Berdiskusi &amp; Berkolaborasi</h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600 sm:text-lg dark:text-slate-400">
                    Tertarik mengembangkan proyek aplikasi web dengan Laravel &amp; Tailwind CSS, atau ingin berdiskusi seputar dunia informatika? Silakan hubungi saya melalui jalur di bawah ini.
                </p>

                {{-- Contact Method Cards --}}
                <div class="mt-8 space-y-3.5">
                    {{-- Email Card --}}
                    <div class="card !p-4 flex items-center justify-between transition hover:border-brand-500/40">
                        <div class="flex items-center gap-3.5 truncate mr-2">
                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                                ✉️
                            </div>
                            <div class="truncate">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Email Resmi</span>
                                <a href="mailto:{{ $p['email'] }}" class="block truncate text-sm font-bold text-slate-900 hover:text-brand-600 dark:text-white dark:hover:text-brand-400">
                                    {{ $p['email'] }}
                                </a>
                            </div>
                        </div>
                        <button type="button" data-copy="{{ $p['email'] }}" title="Salin Email"
                                class="shrink-0 rounded-lg border border-slate-200 bg-white px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:border-brand-500 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                            Salin
                        </button>
                    </div>

                    {{-- WhatsApp Card --}}
                    <div class="card !p-4 flex items-center justify-between transition hover:border-emerald-500/40">
                        <div class="flex items-center gap-3.5">
                            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">
                                💬
                            </div>
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">WhatsApp / Telepon</span>
                                <a href="https://wa.me/{{ $p['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="block text-sm font-bold text-slate-900 hover:text-emerald-600 dark:text-white">
                                    {{ $p['phone'] }}
                                </a>
                            </div>
                        </div>
                        <a href="https://wa.me/{{ $p['whatsapp'] }}?text=Halo%20Perdi%2C%20saya%20tertarik%20berdiskusi%20dengan%20Anda" target="_blank" rel="noopener noreferrer"
                           class="shrink-0 rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-bold text-white shadow-sm transition hover:bg-emerald-700">
                            Chat WA
                        </a>
                    </div>

                    {{-- Campus / Academic Card --}}
                    <div class="card !p-4 flex items-center gap-3.5">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">
                            🎓
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Identitas Akademik</span>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">
                                Perdi · NPM: <span class="font-mono text-brand-600 dark:text-brand-400">{{ $p['npm'] }}</span>
                            </p>
                            <p class="text-xs text-slate-500">S1 Informatika — Bandar Lampung</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Interactive Contact Form Card --}}
            <div class="card !p-8 shadow-xl">
                <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4 dark:border-slate-800">
                    <div>
                        <h3 class="font-display text-lg font-bold text-slate-900 dark:text-white">Kirim Pesan Langsung</h3>
                        <p class="text-xs text-slate-500">Formulir tervalidasi dengan proteksi Anti-Spam</p>
                    </div>
                    <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-mono font-bold text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                        Laravel POST
                    </span>
                </div>

                @if (session('status'))
                    <div role="status" class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
                        ✓ {{ session('status') }}
                    </div>
                @endif

                <form id="contact-form" method="POST" action="{{ route('contact.send') }}" class="space-y-4" novalidate>
                    @csrf
                    {{-- Honeypot anti-spam --}}
                    <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Nama Anda</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" aria-label="Nama Anda" class="field" placeholder="Masukkan nama Anda">
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Email Anda</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" aria-label="Email Anda" class="field" placeholder="nama@email.com">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Subjek Diskusi</label>
                        <input id="subject" name="subject" type="text" value="{{ old('subject') }}" autocomplete="off" aria-label="Subjek Diskusi" class="field" placeholder="Contoh: Kolaborasi Proyek / Pertanyaan">
                        @error('subject') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Pesan</label>
                        <textarea id="message" name="message" rows="4" required autocomplete="off" aria-label="Pesan Anda" class="field" placeholder="Tuliskan pesan atau kebutuhan Anda di sini...">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                        <button type="submit" id="submit-contact" class="btn-primary flex-1">
                            <span>Kirim Pesan</span>
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>

                        <button type="button" id="send-wa-quick" class="btn-whatsapp flex-1">
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.174.086.275.072.376-.044.102-.115.434-.506.549-.68.116-.173.232-.144.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/></svg>
                            <span>Kirim ke WhatsApp</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

