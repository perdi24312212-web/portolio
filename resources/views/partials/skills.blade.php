<section id="skills" class="relative bg-slate-100/60 py-20 sm:py-28 dark:bg-slate-900/30">
    <div class="mx-auto max-w-6xl px-6">
        <div class="reveal mb-14 max-w-2xl">
            <p class="section-eyebrow">Keahlian &amp; Kompetensi</p>
            <h2 class="section-title">Teknologi yang Saya Gunakan</h2>
            <p class="mt-4 text-base text-slate-600 dark:text-slate-400">
                Ringkasan teknologi dan area yang saya pelajari serta gunakan dalam pengembangan web.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @foreach ($p['skills'] as $group => $items)
                <div class="card reveal flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4 dark:border-slate-800">
                            <h3 class="font-display text-lg font-bold text-slate-900 dark:text-white">{{ $group }}</h3>
                            <span class="rounded-full bg-brand-50 px-2.5 py-0.5 text-xs font-bold text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">
                                {{ count($items) }} Skill
                            </span>
                        </div>

                        <ul class="mt-6 space-y-6">
                            @foreach ($items as $skill)
                                <li class="group border-b border-slate-100 pb-4 last:border-0 last:pb-0 dark:border-slate-800">
                                    <span class="font-bold text-slate-900 transition-colors group-hover:text-brand-600 dark:text-slate-200 dark:group-hover:text-brand-400">
                                        {{ $skill['name'] }}
                                    </span>
                                    @if (!empty($skill['desc']))
                                        <p class="mt-1.5 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                            {{ $skill['desc'] }}
                                        </p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] text-slate-400 text-center dark:border-slate-800">
                        Terus belajar dan mengembangkan kemampuan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

