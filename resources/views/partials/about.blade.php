<section id="about" class="py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-6">
        <div class="reveal grid gap-14 lg:grid-cols-[0.85fr_1.15fr]">
            {{-- Left Column: Title & Key Highlights --}}
            <div>
                <p class="section-eyebrow">Tentang Saya</p>
                <h2 class="section-title">
                    Mengembangkan solusi web dengan fokus pada kebutuhan pengguna.
                </h2>

                <p class="mt-6 text-base leading-relaxed text-slate-600 sm:text-lg dark:text-slate-400">
                    Saya <strong class="text-slate-900 dark:text-white">{{ $p['name'] }}</strong>, web developer yang berfokus pada pengembangan aplikasi menggunakan PHP dan Laravel.
                </p>

                {{-- Feature Cards --}}
                <div class="mt-8 space-y-4">
                    <div class="group flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm transition-all hover:border-brand-500/50 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/60">
                        <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-xl text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                            💻
                        </div>
                        <div>
                            <h3 class="font-display text-sm font-bold text-slate-900 dark:text-white">Pengembangan Backend</h3>
                            <p class="mt-1 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                Menggunakan PHP dan Laravel untuk membangun alur aplikasi web, mengelola data, dan menyusun fitur backend.
                            </p>
                        </div>
                    </div>

                    <div class="group flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm transition-all hover:border-violet-500/50 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/60">
                        <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-xl text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">
                            🎨
                        </div>
                        <div>
                            <h3 class="font-display text-sm font-bold text-slate-900 dark:text-white">Antarmuka Responsif</h3>
                            <p class="mt-1 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                Membuat halaman yang rapi dan dapat digunakan dengan nyaman di berbagai ukuran layar.
                            </p>
                        </div>
                    </div>

                    <div class="group flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm transition-all hover:border-rose-500/50 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/60">
                        <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-xl text-rose-600 dark:bg-rose-500/10 dark:text-rose-400">
                            🏛️
                        </div>
                        <div>
                            <h3 class="font-display text-sm font-bold text-slate-900 dark:text-white">Kolaborasi &amp; Pembelajaran</h3>
                            <p class="mt-1 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                Aktif belajar dan berkolaborasi melalui kegiatan pengembangan web dan organisasi kampus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Detailed Narrative & Profile Attributes --}}
            <div class="space-y-6">
                <div class="card !p-8">
                    <h3 class="font-display text-xl font-bold text-slate-900 dark:text-white">
                        Profil &amp; Dedikasi
                    </h3>

                    <div class="mt-4 space-y-4 text-base leading-relaxed text-slate-600 dark:text-slate-300">
                        @foreach ($p['about'] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>

                    {{-- Structured Attributes Table/Grid --}}
                    <div class="mt-8 grid gap-4 border-t border-slate-200/80 pt-6 sm:grid-cols-2 dark:border-slate-800">
                        <div class="flex items-center justify-between rounded-xl bg-slate-50 p-3.5 dark:bg-slate-800/50">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Nama</span>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $p['name'] }}</p>
                            </div>
                            <span class="text-xs text-brand-600 dark:text-brand-400 font-bold">Web Developer</span>
                        </div>

                        <div class="flex items-center justify-between rounded-xl bg-slate-50 p-3.5 dark:bg-slate-800/50">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Fokus</span>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">PHP &amp; Laravel</p>
                            </div>
                            <span class="text-xs text-slate-500">Web App</span>
                        </div>

                        <div class="flex items-center justify-between rounded-xl bg-slate-50 p-3.5 dark:bg-slate-800/50">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Pendidikan</span>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">S1 Informatika</p>
                            </div>
                            <span class="text-xs text-slate-500">Informatika</span>
                        </div>

                        <div class="flex items-center justify-between rounded-xl bg-slate-50 p-3.5 dark:bg-slate-800/50">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Lokasi</span>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $p['location'] }}</p>
                            </div>
                            <span class="text-xs text-emerald-600 font-semibold">Indonesia</span>
                        </div>

                        <div class="flex items-center justify-between rounded-xl bg-slate-50 p-3.5 sm:col-span-2 dark:bg-slate-800/50">
                            <div class="truncate mr-2">
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Email</span>
                                <p class="text-sm font-bold text-slate-900 truncate dark:text-white">{{ $p['email'] }}</p>
                            </div>
                            <button type="button" data-copy="{{ $p['email'] }}" class="shrink-0 rounded-lg bg-brand-50 px-3 py-1.5 text-xs font-semibold text-brand-700 transition hover:bg-brand-100 dark:bg-brand-500/10 dark:text-brand-300">
                                Salin Email
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

