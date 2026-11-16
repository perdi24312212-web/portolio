<section id="home" class="relative overflow-hidden pt-32 pb-20 sm:pt-40 sm:pb-28">
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="absolute -top-32 left-1/2 h-[420px] w-[600px] -translate-x-1/2 rounded-full bg-gradient-to-tr from-brand-600/20 via-violet-600/15 to-slate-400/10 blur-3xl dark:from-brand-600/20 dark:via-violet-600/15 dark:to-slate-700/10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:24px_24px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_75%)] dark:bg-[radial-gradient(#1e293b_1px,transparent_1px)]"></div>
    </div>

    <div class="mx-auto grid max-w-6xl items-center gap-12 px-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="reveal">
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50/90 px-3.5 py-1 text-xs font-bold text-brand-700 shadow-sm backdrop-blur dark:border-brand-500/30 dark:bg-brand-500/10 dark:text-brand-300">
                    PHP · Laravel · Web Development
                </span>
                @if ($p['available'])
                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/90 px-3 py-1 text-xs font-semibold text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
                        <span class="size-2 rounded-full bg-emerald-500"></span>
                        Terbuka untuk kesempatan kerja
                    </span>
                @endif
            </div>

            <h1 class="mt-6 font-display text-4xl font-black leading-tight tracking-tight text-slate-900 sm:text-6xl dark:text-white">
                Halo, saya {{ $p['name'] }}.
                <span class="mt-2 block bg-gradient-to-r from-brand-600 via-indigo-600 to-violet-500 bg-clip-text text-transparent dark:from-brand-400 dark:via-indigo-300 dark:to-violet-400">
                    Saya membangun aplikasi web yang bermanfaat.
                </span>
            </h1>

            <p class="mt-4 font-display text-xl font-bold text-slate-700 sm:text-2xl dark:text-slate-200">
                Web Developer <span class="font-normal text-slate-400">|</span> PHP, Laravel &amp; MySQL
            </p>

            <p class="mt-4 max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg dark:text-slate-400">
                {{ $p['short_bio'] }} Saya tertarik mengembangkan fitur backend, API, dan antarmuka yang mudah digunakan.
            </p>

            <div class="mt-6 flex flex-wrap items-center gap-2">
                <span class="tech-pill">Laravel</span>
                <span class="tech-pill">PHP</span>
                <span class="tech-pill">MySQL</span>
                <span class="tech-pill">JavaScript</span>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="#projects" class="btn-primary">
                    <span>Lihat Proyek</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ asset('downloads/Perdi-CV.pdf') }}" download="Perdi-CV.pdf" class="btn-outline">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0l-4-4m4 4l4-4M4 19.5A2.5 2.5 0 006.5 22h11A2.5 2.5 0 0020 19.5"/></svg>
                    <span>Download CV</span>
                </a>
                <a href="mailto:{{ $p['email'] }}" class="btn-outline">
                    <span>Hubungi Saya</span>
                </a>
                @foreach ($p['socials'] as $social)
                    @if ($social['name'] === 'GitHub')
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="btn-outline">
                            <span>Lihat GitHub</span>
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        </a>
                    @endif
                @endforeach
            </div>

            <p class="mt-6 text-sm text-slate-500 dark:text-slate-400">
                <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $p['location'] }}</span>
                <span class="mx-2" aria-hidden="true">·</span>
                <a href="mailto:{{ $p['email'] }}" class="underline decoration-slate-300 underline-offset-4 hover:text-brand-600 dark:decoration-slate-600 dark:hover:text-brand-400">{{ $p['email'] }}</a>
            </p>
        </div>

        <div class="reveal mx-auto w-full max-w-sm">
            <div class="relative">
                <div class="absolute -inset-3 rounded-[2rem] bg-gradient-to-tr from-brand-600 via-violet-600 to-slate-400 opacity-30 blur-2xl" aria-hidden="true"></div>
                <figure class="relative overflow-hidden rounded-[1.8rem] border border-white/80 bg-slate-900 shadow-2xl dark:border-slate-700">
                    <img src="{{ asset('images/foto.jpg') }}" alt="Foto {{ $p['name'] }}"
                         width="960" height="1280" fetchpriority="high"
                         class="aspect-[3/4] w-full object-cover object-top">
                    <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/95 to-transparent p-6 pt-20">
                        <span class="font-display text-xl font-bold text-white">{{ $p['name'] }}</span>
                        <span class="mt-1 block text-sm text-slate-300">{{ $p['role'] }}</span>
                    </figcaption>
                </figure>
                <div class="absolute -bottom-4 -left-4 hidden rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-lg sm:block dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-xs font-semibold text-slate-500 dark:text-slate-400">Fokus saat ini</p>
                    <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">Web Development</p>
                </div>
            </div>
        </div>
    </div>
</section>
