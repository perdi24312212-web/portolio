<section id="experience" class="bg-slate-100/60 py-20 sm:py-28 dark:bg-slate-900/30">
    <div class="mx-auto max-w-6xl px-6">
        <div class="reveal mb-14 max-w-2xl">
            <p class="section-eyebrow">Rekam Jejak</p>
            <h2 class="section-title">Pendidikan, Organisasi &amp; Pengalaman</h2>
            <p class="mt-3 text-slate-600 dark:text-slate-400">
                Perjalanan akademik di program studi S1 Informatika dan keikutsertaan aktif dalam organisasi kemahasiswaan serta pengembangan web.
            </p>
        </div>

        <div class="grid gap-12 lg:grid-cols-2">
            @foreach (['Pendidikan Akademik' => $p['education'], 'Organisasi & Pengalaman' => $p['experience']] as $heading => $items)
                <div class="reveal">
                    <div class="mb-8 flex items-center gap-3">
                        <span class="flex size-9 items-center justify-center rounded-xl bg-brand-50 text-base text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                            {{ $heading === 'Pendidikan Akademik' ? '🎓' : '💼' }}
                        </span>
                        <h3 class="font-display text-xl font-bold text-slate-900 dark:text-white">{{ $heading }}</h3>
                    </div>


                    <ol class="relative space-y-8 border-l-2 border-brand-500/30 pl-8 ml-3 dark:border-brand-500/20">
                        @foreach ($items as $item)
                            <li class="relative">
                                {{-- Timeline Dot --}}
                                <span class="absolute -left-[41px] top-1 flex size-5 items-center justify-center rounded-full bg-brand-600 text-[10px] text-white shadow-md shadow-brand-500/50">
                                    <span class="size-2 rounded-full bg-white"></span>
                                </span>

                                <div class="card !p-5 transition hover:border-brand-500/40 hover:shadow-md">
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <span class="rounded-full bg-brand-50 px-2.5 py-0.5 text-[11px] font-bold text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">
                                            {{ $item['period'] }}
                                        </span>
                                        @if (!empty($item['location']))
                                            <span class="text-xs text-slate-400">📍 {{ $item['location'] }}</span>
                                        @endif
                                    </div>

                                    <h4 class="mt-2.5 font-display text-base font-bold text-slate-900 dark:text-white">
                                        {{ $item['title'] }}
                                    </h4>

                                    <p class="text-xs font-semibold text-brand-600 dark:text-brand-400">
                                        {{ $item['company'] }}
                                    </p>

                                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-slate-400">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
</section>

