<footer class="border-t border-slate-200/80 bg-white py-12 transition-colors dark:border-slate-800/80 dark:bg-[#070b14]">
    <div class="mx-auto max-w-6xl px-6">
        <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
            {{-- Brand info --}}
            <div class="text-center sm:text-left">
                <a href="#home" class="font-display text-lg font-extrabold text-slate-900 dark:text-white">
                    Perdi<span class="text-brand-600 dark:text-brand-400">.dev</span>
                </a>
                <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                    Mahasiswa S1 Informatika (NPM: <span class="font-mono text-brand-600 dark:text-brand-400 font-semibold">{{ $p['npm'] }}</span>) · Web Developer
                </p>
            </div>

            {{-- Tech Stack Pills --}}
            <div class="flex flex-wrap items-center justify-center gap-2 text-[11px] font-semibold text-slate-500">
                <span class="rounded-lg bg-slate-100 px-2.5 py-1 dark:bg-slate-800 dark:text-slate-300">PHP OOP Class</span>
                <span class="rounded-lg bg-brand-50 px-2.5 py-1 text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">Laravel MVC</span>
                <span class="rounded-lg bg-violet-50 px-2.5 py-1 text-violet-700 dark:bg-violet-500/10 dark:text-violet-300">Tailwind CSS</span>
            </div>

            {{-- Back to top button --}}
            <div class="text-center sm:text-right">
                <a href="#home" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 hover:underline dark:text-brand-400">
                    <span>Kembali ke atas</span>
                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                </a>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 dark:border-slate-800/80">
            <p>&copy; {{ date('Y') }} {{ $p['name'] }} (NPM: {{ $p['npm'] }}). Hak Cipta Dilindungi.</p>
            <p class="mt-2 sm:mt-0">Himpunan Mahasiswa Informatika · Bandar Lampung</p>
        </div>
    </div>
</footer>

