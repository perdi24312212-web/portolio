<section id="home" class="relative overflow-hidden pt-32 pb-20 sm:pt-40 sm:pb-28">
    {{-- Ambient Background Glows --}}
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="absolute -top-32 left-1/2 h-[420px] w-[600px] -translate-x-1/2 rounded-full bg-gradient-to-tr from-brand-600/25 via-violet-600/20 to-maroon-600/20 blur-3xl dark:from-brand-600/20 dark:via-violet-600/15 dark:to-maroon-600/15"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:24px_24px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_75%)] dark:bg-[radial-gradient(#1e293b_1px,transparent_1px)]"></div>
    </div>

    <div class="mx-auto grid max-w-6xl items-center gap-12 px-6 lg:grid-cols-[1.2fr_0.8fr]">
        {{-- Left Content Column --}}
        <div class="reveal order-2 lg:order-1">
            {{-- Top Badge: Student & Availability --}}
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50/90 px-3.5 py-1 text-xs font-bold text-brand-700 shadow-sm backdrop-blur dark:border-brand-500/30 dark:bg-brand-500/10 dark:text-brand-300">
                    <span class="size-2 rounded-full bg-brand-600 animate-ping"></span>
                    S1 Informatika · NPM {{ $p['npm'] }}
                </span>

                @if ($p['available'])
                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/90 px-3 py-1 text-xs font-semibold text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
                        <span class="relative flex size-2">
                            <span class="absolute inline-flex size-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex size-2 rounded-full bg-emerald-500"></span>
                        </span>
                        Terbuka untuk Kolaborasi
                    </span>
                @endif
            </div>

            {{-- Main Headline --}}
            <h1 class="mt-6 font-display text-4xl font-black leading-tight tracking-tight text-slate-900 sm:text-6xl dark:text-white">
                Saya membangun
                <span class="block bg-gradient-to-r from-brand-600 via-indigo-600 to-violet-500 bg-clip-text text-transparent dark:from-brand-400 dark:via-indigo-300 dark:to-violet-400">
                    web yang rapi &amp; siap kerja.
                </span>
            </h1>

            {{-- Sub-Headline / Roles --}}
            <p class="mt-3 font-display text-xl font-bold text-slate-700 sm:text-2xl dark:text-slate-200">
                Full-Stack Web Developer &amp; Mahasiswa Informatika
            </p>

            {{-- Tagline --}}
            <p class="mt-4 max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg dark:text-slate-400">
                Saya fokus pada pembuatan aplikasi digital yang bersih, cepat, dan mudah dikembangkan — mulai dari
                <span class="font-semibold text-brand-600 dark:text-brand-400">PHP OOP Class</span>,
                <span class="font-semibold text-indigo-600 dark:text-indigo-400">Laravel</span>, hingga
                <span class="font-semibold text-violet-600 dark:text-violet-400">UI yang modern dan responsif</span>.
            </p>

            <div class="mt-6 flex flex-wrap items-center gap-2">
                <span class="tech-pill">Laravel</span>
                <span class="tech-pill">PHP OOP</span>
                <span class="tech-pill">Tailwind CSS</span>
                <span class="tech-pill">REST API</span>
            </div>

            {{-- Quick Copy Information Bar --}}
            <div class="mt-6 flex flex-wrap items-center gap-2 text-xs font-mono">
                <button type="button" data-copy="{{ $p['npm'] }}" title="Klik untuk salin NPM"
                        class="copy-pill inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-slate-700 shadow-sm transition hover:border-brand-400 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                    <span class="text-slate-400 font-sans">NPM:</span>
                    <span class="font-bold">{{ $p['npm'] }}</span>
                    <svg class="size-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </button>

                <button type="button" data-copy="{{ $p['email'] }}" title="Klik untuk salin Email"
                        class="copy-pill inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-slate-700 shadow-sm transition hover:border-brand-400 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                    <span class="text-slate-400 font-sans">Email:</span>
                    <span class="font-bold">{{ $p['email'] }}</span>
                    <svg class="size-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </button>

                <button type="button" data-copy="{{ $p['phone'] }}" title="Klik untuk salin Telepon"
                        class="copy-pill inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-slate-700 shadow-sm transition hover:border-brand-400 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                    <span class="text-slate-400 font-sans">Telp:</span>
                    <span class="font-bold">{{ $p['phone'] }}</span>
                    <svg class="size-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </button>
            </div>

            {{-- CTAs --}}
            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="#projects" class="btn-primary">
                    <span>Lihat Proyek</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/></svg>
                </a>
                <button type="button" id="download-cv" class="btn-outline">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0l-4-4m4 4l4-4M4 19.5A2.5 2.5 0 006.5 22h11A2.5 2.5 0 0020 19.5"/></svg>
                    <span>Download CV</span>
                </button>
                <a href="https://wa.me/{{ $p['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.174.086.275.072.376-.044.102-.115.434-.506.549-.68.116-.173.232-.144.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/></svg>
                    <span>WhatsApp</span>
                </a>
                <a href="#contact" class="btn-outline">
                    <span>Hubungi Saya</span>
                </a>
            </div>

            {{-- Stat Cards --}}
            <dl class="mt-10 grid grid-cols-2 gap-4 border-t border-slate-200/80 pt-8 sm:grid-cols-4 dark:border-slate-800">
                @foreach ($p['stats'] as $stat)
                    <div class="rounded-xl border border-slate-200/70 bg-white/70 p-3.5 backdrop-blur dark:border-slate-800 dark:bg-slate-900/60 stat-card">
                        <dt class="font-display text-2xl font-black text-slate-900 sm:text-3xl dark:text-white">{{ $stat['value'] }}</dt>
                        <dd class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        {{-- Right Column: Perdi's Photo & Floating Interactive Badges --}}
        <div class="reveal order-1 mx-auto w-full max-w-sm lg:order-2">
            <div class="relative">
                {{-- Glow Rings Behind Photo --}}
                <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-brand-600 via-violet-600 to-rose-600 opacity-40 blur-2xl animate-pulse" aria-hidden="true"></div>
                <div class="absolute -inset-1 rounded-[2.5rem] bg-gradient-to-br from-brand-500 via-indigo-500 to-violet-600 opacity-70" aria-hidden="true"></div>

                {{-- Photo Container --}}
                <figure class="relative overflow-hidden rounded-[2.2rem] border-2 border-white/80 bg-slate-900 shadow-2xl dark:border-slate-700">
                    <img src="{{ asset('images/foto.jpg') }}" alt="Foto {{ $p['name'] }} — NPM {{ $p['npm'] }}"
                         width="960" height="1280" fetchpriority="high"
                         class="aspect-[3/4] w-full object-cover object-top transition-transform duration-700 hover:scale-105">
                    
                    {{-- Overlay Caption on Image --}}
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent p-6 pt-20">
                        <div class="flex items-center justify-between">
                            <div>
                                <figcaption class="font-display text-xl font-bold text-white">{{ $p['name'] }}</figcaption>
                                <p class="text-xs font-semibold text-brand-300">NPM: {{ $p['npm'] }}</p>
                            </div>
                            <span class="rounded-lg bg-white/10 px-2.5 py-1 text-[11px] font-bold text-white backdrop-blur">
                                Informatika '24
                            </span>
                        </div>
                    </div>
                </figure>

                {{-- Floating Badge 1: Top Right --}}
                <div class="absolute -top-4 -right-4 hidden rounded-2xl border border-slate-200 bg-white/95 px-4 py-3 shadow-xl backdrop-blur transition hover:scale-105 sm:flex items-center gap-3 dark:border-slate-700 dark:bg-slate-900/95">
                    <div class="flex size-9 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                        🎓
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Status Mahasiswa</p>
                        <p class="font-display text-xs font-black text-slate-900 dark:text-white">S1 Informatika</p>
                    </div>
                </div>

                {{-- Floating Badge 2: Bottom Left --}}
                <div class="absolute -left-6 bottom-16 hidden rounded-2xl border border-slate-200 bg-white/95 px-4 py-3 shadow-xl backdrop-blur transition hover:scale-105 sm:flex items-center gap-3 dark:border-slate-700 dark:bg-slate-900/95">
                    <div class="flex size-9 items-center justify-center rounded-xl bg-violet-50 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">
                        ⚡
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Arsitektur</p>
                        <p class="font-display text-xs font-black text-slate-900 dark:text-white">Laravel &amp; Tailwind</p>
                    </div>
                </div>

                {{-- Floating Badge 3: Bottom Right (Organization) --}}
                <div class="absolute -right-4 -bottom-4 hidden rounded-2xl border border-slate-200 bg-white/95 px-3.5 py-2.5 shadow-xl backdrop-blur transition hover:scale-105 sm:flex items-center gap-2 dark:border-slate-700 dark:bg-slate-900/95">
                    <span class="size-2 rounded-full bg-rose-500 animate-ping"></span>
                    <p class="text-xs font-bold text-slate-800 dark:text-slate-200">🏛️ HIMA Informatika</p>
                </div>
            </div>
        </div>
    </div>
</section>

