<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="theme-color" content="#4f46e5">
    <meta name="color-scheme" content="light dark">
    <meta name="author" content="{{ $p['name'] }}">
    <meta name="keywords" content="Perdi, Full-Stack Web Developer, PHP Laravel, Tailwind CSS, Portfolio, Informatika, NPM 24312212">
    <title>{{ $p['name'] }} — {{ $p['role'] }} (NPM: {{ $p['npm'] }})</title>
    <meta name="description" content="{{ $p['tagline'] }}">
    <link rel="canonical" href="{{ config('app.url', 'https://yourdomain.com') }}/">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Perdi Portfolio">
    <meta property="og:title" content="{{ $p['name'] }} — {{ $p['role'] }}">
    <meta property="og:description" content="{{ $p['tagline'] }}">
    <meta property="og:url" content="{{ config('app.url', 'https://yourdomain.com') }}/">
    <meta property="og:image" content="{{ asset('images/foto.jpg') }}">
    <meta property="og:image:alt" content="Perdi portfolio profile image">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $p['name'] }} — {{ $p['role'] }}">
    <meta name="twitter:description" content="{{ $p['tagline'] }}">
    <meta name="twitter:image" content="{{ asset('images/foto.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🚀</text></svg>">

    {{-- Fonts: Plus Jakarta Sans & Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN + Configuration for 100% Reliable Render --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        maroon: {
                            50: '#fdf2f4',
                            100: '#fce7eb',
                            500: '#be123c',
                            600: '#9f1239',
                            700: '#881337',
                            800: '#701a31',
                            900: '#4c0519',
                        },
                        darkbg: '#0a0f1d',
                        darkcard: '#111827',
                        darkborder: '#1f293d',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    animation: {
                        'float-slow': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'gradient-x': 'gradientX 10s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.05)' },
                        },
                        gradientX: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        }
                    }
                }
            }
        };
    </script>

    {{-- Custom CSS Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Dark Mode Init Script (No FOUC) --}}
    <script>
        (function() {
            try {
                const stored = localStorage.getItem('theme');
                if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased transition-colors duration-300 dark:bg-[#070b14] dark:text-slate-200">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-xl focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white focus:shadow-lg">
        Lewati ke konten
    </a>

    {{-- Background Ambient Glow Elements --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
        <div class="absolute -top-40 left-1/4 h-[500px] w-[500px] rounded-full bg-brand-500/10 blur-[120px] dark:bg-brand-600/15"></div>
        <div class="absolute top-1/3 -right-20 h-[450px] w-[450px] rounded-full bg-violet-500/10 blur-[130px] dark:bg-purple-600/15"></div>
        <div class="absolute bottom-10 left-1/3 h-[500px] w-[500px] rounded-full bg-rose-500/10 blur-[140px] dark:bg-maroon-600/15"></div>
    </div>

    @include('partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Floating Action Bar (WhatsApp & Scroll to Top) --}}
    <div class="fixed bottom-6 right-6 z-40 flex flex-col items-center gap-3">
        <button id="scroll-to-top" type="button" aria-label="Kembali ke atas"
                class="hidden size-11 items-center justify-center rounded-full border border-slate-200 bg-white/90 text-slate-700 shadow-lg backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:border-brand-500 hover:text-brand-600 dark:border-slate-800 dark:bg-slate-900/90 dark:text-slate-300 dark:hover:text-brand-400">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>
        </button>

        <a href="https://wa.me/{{ $p['whatsapp'] }}?text=Halo%20Perdi%2C%20saya%20melihat%20portofolio%20web%20Anda" target="_blank" rel="noopener noreferrer"
           aria-label="Chat WhatsApp"
           class="group relative flex size-12 items-center justify-center rounded-full bg-emerald-500 text-white shadow-lg shadow-emerald-500/30 transition-all duration-300 hover:scale-110 hover:bg-emerald-600">
            <span class="absolute -top-1 -right-1 flex size-3.5">
                <span class="absolute inline-flex size-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex size-3.5 rounded-full bg-emerald-300"></span>
            </span>
            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.174.086.275.072.376-.044.102-.115.434-.506.549-.68.116-.173.232-.144.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
            </svg>
            <span class="pointer-events-none absolute right-14 whitespace-nowrap rounded-lg bg-slate-900 px-2.5 py-1 text-xs font-semibold text-white opacity-0 shadow-lg transition-opacity group-hover:opacity-100 dark:bg-slate-800">
                Hubungi Perdi
            </span>
        </a>
    </div>

    {{-- Interactive Toast Container --}}
    <div id="toast-container" class="fixed top-20 right-6 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "{{ $p['name'] }}",
      "jobTitle": "{{ $p['role'] }}",
      "description": "{{ $p['tagline'] }}",
      "email": "mailto:{{ $p['email'] }}",
      "telephone": "{{ $p['phone_formatted'] }}",
      "url": "{{ config('app.url', 'https://yourdomain.com') }}/",
      "sameAs": [
        "https://github.com/perdi24312212",
        "https://wa.me/6285319147609"
      ],
      "knowsAbout": [
        "Laravel",
        "PHP",
        "MySQL",
        "Tailwind CSS",
        "REST API",
        "Web Development"
      ]
    }
    </script>

    {{-- Main Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

