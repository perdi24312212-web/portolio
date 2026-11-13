<section id="skills" class="relative bg-slate-100/60 py-20 sm:py-28 dark:bg-slate-900/30">
    <div class="mx-auto max-w-6xl px-6">
        <div class="reveal mb-14 max-w-2xl">
            <p class="section-eyebrow">Keahlian &amp; Kompetensi</p>
            <h2 class="section-title">Teknologi &amp; Fondasi yang Dikuasai</h2>
            <p class="mt-4 text-base text-slate-600 dark:text-slate-400">
                Kombinasi pemahaman arsitektur backend berorientasi objek (Class &amp; Laravel) dan kemahiran mendesain antarmuka modern dengan Tailwind CSS.
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
                                <li class="group">
                                    <div class="mb-1.5 flex items-center justify-between text-sm">
                                        <div class="flex items-center gap-2">
                                            <span class="font-bold text-slate-900 transition-colors group-hover:text-brand-600 dark:text-slate-200 dark:group-hover:text-brand-400">
                                                {{ $skill['name'] }}
                                            </span>
                                        </div>
                                        <span class="font-mono text-xs font-bold text-brand-600 dark:text-brand-400">{{ $skill['level'] }}%</span>
                                    </div>

                                    {{-- Animated Progress Bar --}}
                                    <div class="h-2 w-full overflow-hidden rounded-full bg-slate-200/70 dark:bg-slate-800" role="progressbar" aria-valuenow="{{ $skill['level'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $skill['name'] }}">
                                        <div class="h-full rounded-full bg-gradient-to-r from-brand-600 via-indigo-500 to-violet-500 transition-all duration-1000 ease-out" style="width: {{ $skill['level'] }}%"></div>
                                    </div>

                                    @if (!empty($skill['desc']))
                                        <p class="mt-1.5 text-[11px] leading-tight text-slate-500 dark:text-slate-400">
                                            {{ $skill['desc'] }}
                                        </p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] text-slate-400 text-center dark:border-slate-800">
                        Teruji dalam praktikum &amp; proyek nyata
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

