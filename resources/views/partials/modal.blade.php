{{-- Project Detail Modal --}}
<div id="project-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-950/70 p-4 backdrop-blur-sm sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="flex min-h-full items-center justify-center">
        <div class="relative w-full max-w-2xl rounded-2xl border border-slate-200 bg-white p-6 shadow-2xl transition-all dark:border-slate-800 dark:bg-slate-900 sm:p-8">
            {{-- Close Button --}}
            <button type="button" id="modal-close" aria-label="Tutup modal"
                    class="absolute top-5 right-5 flex size-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 hover:border-slate-400 hover:text-slate-900 dark:border-slate-800 dark:text-slate-400 dark:hover:text-white">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="flex items-center gap-2 mb-2">
                <span id="modal-badge" class="rounded-full bg-brand-50 px-3 py-1 text-xs font-bold text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">
                    Laravel MVC Class
                </span>
                <span class="text-xs text-slate-400 font-mono">Perdi · 24312212</span>
            </div>

            <h3 id="modal-title" class="font-display text-2xl font-bold text-slate-900 dark:text-white">
                Judul Proyek
            </h3>

            <p id="modal-desc" class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-300">
                Deskripsi proyek.
            </p>

            {{-- Architecture Code Snippet Simulation --}}
            <div class="mt-6 rounded-xl bg-slate-950 p-4 font-mono text-xs text-slate-300 border border-slate-800">
                <div class="flex items-center justify-between pb-2 mb-2 border-b border-slate-800 text-slate-400">
                    <span class="flex items-center gap-1.5">
                        <span class="size-2.5 rounded-full bg-rose-500"></span>
                        <span class="size-2.5 rounded-full bg-amber-500"></span>
                        <span class="size-2.5 rounded-full bg-emerald-500"></span>
                        <span class="ml-2 text-[11px] font-sans">app/Http/Controllers/PerdiController.php</span>
                    </span>
                    <span class="text-[10px] text-brand-400">PHP 8 Class</span>
                </div>
                <pre class="overflow-x-auto text-[11px] leading-relaxed"><code class="text-indigo-300">&lt;?php</code>
<span class="text-purple-400">namespace</span> App\Http\Controllers;

<span class="text-purple-400">class</span> <span class="text-yellow-300">ProjectController</span> <span class="text-purple-400">extends</span> Controller {
    <span class="text-purple-400">public function</span> <span class="text-blue-400">index</span>() {
        <span class="text-slate-400">// Modul dibuat oleh Perdi (NPM: 24312212)</span>
        <span class="text-purple-400">return</span> view(<span class="text-emerald-300">'projects.show'</span>, [
            <span class="text-emerald-300">'framework'</span> => <span class="text-emerald-300">'Laravel + Tailwind CSS'</span>
        ]);
    }
}</pre>
            </div>

            {{-- Feature Highlights in Modal --}}
            <div class="mt-6">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Fitur &amp; Kemampuan:</h4>
                <ul id="modal-features" class="space-y-2 text-xs text-slate-700 dark:text-slate-300">
                    {{-- Generated via JS --}}
                </ul>
            </div>

            {{-- Actions --}}
            <div class="mt-8 flex flex-wrap gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a id="modal-repo" href="#" target="_blank" rel="noopener noreferrer"
                   class="btn-primary flex-1 text-center justify-center">
                    <span>Lihat Repository GitHub</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <button type="button" id="modal-close-btn" class="btn-outline">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
