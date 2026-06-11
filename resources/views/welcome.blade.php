<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ansible Configuration & Backup Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-900 text-slate-100 font-sans min-h-screen flex flex-col justify-between selection:bg-blue-500 selection:text-white">

    <header class="w-full max-w-7xl mx-auto px-6 py-5 flex justify-between items-center border-b border-slate-800">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
            </svg>
            <span class="text-lg font-bold tracking-wider uppercase text-slate-200">Ansible Panel</span>
        </div>

        <nav class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition shadow-md shadow-blue-900/30">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white rounded-lg transition">
                        Log in
                    </a>
                @endauth
            @endif
        </nav>
    </header>

    <main class="w-full max-w-4xl mx-auto px-6 py-16 flex-1 flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-medium mb-6">
            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
            System Monitoring & Automation Active
        </div>

        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-2xl leading-tight">
            Configuration & Backup <span class="text-transparent bg-clip-text bg-gradient-to-r draw from-blue-400 to-indigo-400">Management System</span>
        </h1>
        
        <p class="mt-6 text-base md:text-lg text-slate-400 max-w-xl leading-relaxed">
            Platform internal untuk memantau infrastruktur jaringan, log sistem Ansible, serta mengunduh file backup konfigurasi perangkat secara aman.
        </p>

        <div class="mt-10 flex flex-wrap gap-4 justify-center">
            @auth
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 px-6 py-3 font-semibold bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition shadow-lg shadow-blue-900/40 group">
                    Buka Panel Utama
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-6 py-3 font-semibold bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition shadow-lg shadow-blue-900/40 group">
                    Masuk ke Sistem
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                </a>
            @endauth
        </div>

        <div class="mt-20 grid grid-cols-1 sm:grid-cols-3 gap-6 w-full text-left">
            <div class="p-5 rounded-xl bg-slate-800/40 border border-slate-800">
                <div class="text-blue-400 font-semibold text-sm uppercase tracking-wider mb-2">01. Automation Log</div>
                <p class="text-sm text-slate-400">Melihat status riwayat eksekusi playbook Ansible secara real-time.</p>
            </div>
            <div class="p-5 rounded-xl bg-slate-800/40 border border-slate-800">
                <div class="text-blue-400 font-semibold text-sm uppercase tracking-wider mb-2">02. Config Backup</div>
                <p class="text-sm text-slate-400">Akses langsung ke folder penyimpanan backup untuk mengunduh konfigurasi terenkripsi.</p>
            </div>
            <div class="p-5 rounded-xl bg-slate-800/40 border border-slate-800">
                <div class="text-blue-400 font-semibold text-sm uppercase tracking-wider mb-2">03. Secure Access</div>
                <p class="text-sm text-slate-400">Autentikasi berbasis username lokal yang terproteksi ketat untuk tim administrator.</p>
            </div>
        </div>
    </main>

    <footer class="w-full text-center py-6 border-t border-slate-800 text-xs text-slate-500">
        &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika. All rights reserved.
    </footer>

</body>
</html>