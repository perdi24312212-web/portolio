@php
    $allTags = collect($p['projects'])->pluck('tags')->flatten()->unique()->values();
@endphp

<section id="projects" class="py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-6">
        {{-- Section Header & Filter Controls --}}
        <div class="reveal mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="section-eyebrow">Portofolio Karya</p>
                <h2 class="section-title">Proyek Unggulan &amp; Eksplorasi</h2>
                <p class="mt-3 text-slate-600 dark:text-slate-400">
                    Aplikasi web nyata yang dibangun menggunakan arsitektur Laravel Controller Class, clean OOP, dan Tailwind CSS.
                </p>
            </div>

            {{-- Filter Pills --}}
            <div class="flex flex-wrap gap-2 text-xs font-semibold">
                <button type="button" data-filter="all" class="filter-btn active rounded-full bg-brand-600 px-4 py-2 text-white shadow-md shadow-brand-500/25 transition">
                    Semua ({{ count($p['projects']) }})
                </button>
                @foreach (['Laravel', 'Tailwind CSS', 'PHP OOP', 'MySQL'] as $tag)
                    <button type="button" data-filter="{{ $tag }}"
                            class="filter-btn rounded-full border border-slate-300 bg-white px-4 py-2 text-slate-700 transition hover:border-brand-500 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:text-white">
                        {{ $tag }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Projects Grid --}}
        <div class="grid gap-8 md:grid-cols-2">
            @foreach ($p['projects'] as $index => $project)
                <article data-tags="{{ implode('|', $project['tags']) }}"
                         class="card reveal group flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-500/50 hover:shadow-xl dark:hover:border-brand-500/40">
                    <div>
                        {{-- Card Visual Banner --}}
                        <div class="relative mb-6 aspect-video overflow-hidden rounded-xl bg-gradient-to-br from-slate-900 via-brand-950 to-slate-900 p-6 flex flex-col justify-between border border-slate-800">
                            {{-- Decorative Background Grid --}}
                            <div class="absolute inset-0 bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:16px_16px] opacity-25"></div>
                            
                            <div class="relative z-10 flex items-center justify-between">
                                <span class="rounded-full bg-brand-500/20 px-3 py-1 text-xs font-bold text-brand-300 backdrop-blur border border-brand-500/30">
                                    {{ $project['badge'] ?? 'Web App' }}
                                </span>
                                <span class="font-mono text-2xl font-black text-white/30">
                                    0{{ $index + 1 }}
                                </span>
                            </div>


                            <div class="relative z-10">
                                <div class="inline-flex items-center gap-2 rounded-lg bg-black/40 px-3 py-1.5 backdrop-blur border border-white/10 text-xs font-mono text-slate-200">
                                    <span class="size-2 rounded-full bg-emerald-400"></span>
                                    <span>Class / Controller MVC</span>
                                </div>
                            </div>
                        </div>

                        {{-- Category & Title --}}
                        <div class="flex items-center justify-between text-xs text-brand-600 dark:text-brand-400 font-bold mb-1">
                            <span>{{ $project['category'] ?? 'Aplikasi Web' }}</span>
                            <span class="text-slate-400 font-mono">Perdi · 24312212</span>
                        </div>

                        <h3 class="font-display text-xl font-bold text-slate-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">
                            {{ $project['title'] }}
                        </h3>

                        <p class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-400">
                            {{ $project['description'] }}
                        </p>

                        {{-- Key Features List --}}
                        @if (!empty($project['features']))
                            <div class="mt-4 rounded-xl bg-slate-50 p-3.5 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800">
                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Fitur Utama:</p>
                                <ul class="space-y-1.5 text-xs text-slate-600 dark:text-slate-300">
                                    @foreach ($project['features'] as $feat)
                                        <li class="flex items-center gap-2">
                                            <span class="text-brand-600 dark:text-brand-400">✓</span>
                                            <span>{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {{-- Tags & Actions --}}
                    <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800">
                        <ul class="flex flex-wrap gap-1.5 mb-5">
                            @foreach ($project['tags'] as $tag)
                                <li class="rounded-md bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-700 dark:bg-slate-800 dark:text-slate-300">
                                    {{ $tag }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="flex items-center justify-between text-xs font-bold">
                            <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 text-slate-700 hover:text-brand-600 dark:text-slate-300 dark:hover:text-brand-400 transition">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                <span>Source Code</span>
                            </a>

                            <button type="button" data-project-modal="{{ $project['id'] }}"
                                    class="inline-flex items-center gap-1 text-brand-600 hover:text-brand-700 dark:text-brand-400 dark:hover:underline">
                                <span>Pratinjau Modul</span>
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

