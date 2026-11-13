@php
    $nav = [
        'about' => 'Tentang',
        'services' => 'Layanan',
        'skills' => 'Keahlian',
        'projects' => 'Proyek',
        'testimonials' => 'Review',
        'experience' => 'Perjalanan',
        'contact' => 'Kontak',
    ];
@endphp

<header class="fixed inset-x-0 top-0 z-40 border-b border-slate-200/80 bg-white/85 backdrop-blur-xl transition-all duration-300 dark:border-slate-800/80 dark:bg-[#070b14]/85">
    <nav class="mx-auto flex h-20 max-w-6xl items-center justify-between px-6" aria-label="Navigasi utama">
        {{-- Logo Brand --}}
        <a href="#home" class="group flex items-center gap-3">
            <div class="flex size-11 items-center justify-center rounded-2xl bg-gradient-to-tr from-brand-600 via-indigo-600 to-violet-600 text-white shadow-md shadow-brand-500/25 transition-transform duration-300 group-hover:scale-105">
                <span class="font-display text-xl font-black">P</span>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-display text-lg font-extrabold tracking-tight text-slate-900 dark:text-white">
                        Perdi<span class="text-brand-600 dark:text-brand-400">.dev</span>
                    </span>
                    <span class="rounded-md border border-brand-200 bg-brand-50 px-2 py-0.5 text-[10px] font-bold text-brand-700 dark:border-brand-500/30 dark:bg-brand-500/10 dark:text-brand-300">
                        NPM {{ $p['npm'] }}
                    </span>
                </div>
                <p class="text-[11px] font-medium text-slate-500 dark:text-slate-400">S1 Informatika · Web Dev</p>
            </div>
        </a>

        {{-- Desktop Navigation --}}
        <ul class="hidden items-center gap-1 rounded-full border border-slate-200/80 bg-slate-100/70 p-1.5 backdrop-blur md:flex dark:border-slate-800 dark:bg-slate-900/70">
            @foreach ($nav as $id => $label)
                <li>
                    <a href="#{{ $id }}" data-nav
                       class="rounded-full px-4 py-2 text-sm font-medium text-slate-600 transition-all duration-200 hover:text-brand-600 dark:text-slate-300 dark:hover:text-white">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Actions: Theme Toggle & WhatsApp CTA --}}
        <div class="flex items-center gap-3">
            {{-- Dark Mode Toggle --}}
            <button type="button" data-theme-toggle aria-label="Ganti tema"
                    class="flex size-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-brand-400 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-brand-500 dark:hover:text-brand-400">
                <svg class="hidden size-5 dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0-1.414-1.414M7.05 7.05 5.636 5.636M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/></svg>
                <svg class="size-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 0 1 8.646 3.646 9.003 9.003 0 0 0 12 21a9.003 9.003 0 0 0 8.354-5.646z"/></svg>
            </button>

            {{-- WhatsApp Contact CTA Button --}}
            <a href="https://wa.me/{{ $p['whatsapp'] }}" target="_blank" rel="noopener noreferrer"
               class="hidden items-center gap-2 rounded-xl bg-gradient-to-r from-brand-600 to-indigo-600 px-4 py-2.5 text-xs font-bold text-white shadow-md shadow-brand-500/25 transition-all hover:scale-105 hover:shadow-lg sm:inline-flex">
                <span>Hubungi</span>
                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/></svg>
            </a>

            {{-- Mobile Menu Trigger --}}
            <button id="menu-btn" type="button" aria-label="Buka navigasi" aria-expanded="false" aria-controls="mobile-menu"
                    class="flex size-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 md:hidden dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200">
                <svg id="menu-icon-open" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="menu-icon-close" class="hidden size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </nav>

    {{-- Mobile Menu Drawer --}}
    <div id="mobile-menu" class="hidden border-b border-slate-200 bg-white/95 px-6 py-5 backdrop-blur-xl md:hidden dark:border-slate-800 dark:bg-[#0a0f1d]/95">
        <div class="mb-4 flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
            <div>
                <p class="font-display text-sm font-bold text-slate-900 dark:text-white">{{ $p['name'] }}</p>
                <p class="text-xs text-brand-600 dark:text-brand-400">NPM: {{ $p['npm'] }} · S1 Informatika</p>
            </div>
            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Tersedia
            </span>
        </div>
        <ul class="space-y-1">
            @foreach ($nav as $id => $label)
                <li>
                    <a href="#{{ $id }}" class="flex items-center justify-between rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-brand-50 hover:text-brand-600 dark:text-slate-200 dark:hover:bg-slate-800 dark:hover:text-brand-400">
                        <span>{{ $label }}</span>
                        <svg class="size-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex gap-2">
            <a href="https://wa.me/{{ $p['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="flex-1 text-center py-2.5 text-xs font-bold text-white bg-emerald-600 rounded-xl shadow">
                WhatsApp
            </a>
            <a href="mailto:{{ $p['email'] }}" class="flex-1 text-center py-2.5 text-xs font-bold text-slate-800 dark:text-white bg-slate-100 dark:bg-slate-800 rounded-xl">
                Email
            </a>
        </div>
    </div>
</header>

