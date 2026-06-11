<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Under Development</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-200 min-h-screen flex items-center justify-center relative overflow-hidden" style="background-color: #020617;">

    <div class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] bg-blue-500/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50vw] h-[50vw] bg-indigo-500/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-xl w-full mx-4 p-8 rounded-3xl shadow-2xl text-center relative z-10 border border-slate-800" style="background-color: rgba(15, 23, 42, 0.8); backdrop-filter: blur(24px);">
        
        <div class="flex justify-center mb-6">
            <div class="relative flex items-center justify-center w-20 h-20 rounded-2xl border border-slate-800 shadow-inner" style="background-color: #020617;">
                <span class="absolute inline-flex h-10 w-10 rounded-xl bg-blue-400/20 animate-ping"></span>
                
                <svg class="w-9 h-9 text-blue-400 relative z-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>

        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-blue-500/10 text-blue-400 border border-blue-500/20 mb-4">
            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-pulse"></span>
            Environment: Backup Config Panel
        </div>

        <h1 class="text-3xl font-black text-white tracking-tight sm:text-4xl">
            Application Under <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Development</span>
        </h1>
        
        <p class="mt-4 text-sm text-slate-400 leading-relaxed max-w-md mx-auto">
            Halaman atau modul yang Anda tuju saat ini sedang dalam proses perancangan arsitektur sistem backend dan integrasi panel kontrol otomatis.
        </p>

        <div class="my-6 border-t border-slate-800/80"></div>

        <div class="border border-slate-800 text-left rounded-xl p-4 font-mono text-xs text-slate-300 space-y-1 shadow-inner" style="background-color: #020617;">
            <p class="text-slate-500"><span class="text-slate-600">#</span> systemctl status backend-panel</p>
            <p class="text-amber-400"><span class="bg-amber-500/10 text-amber-400 px-1 rounded text-[10px] mr-1 font-sans font-bold">INFO</span> Initializing database migrations...</p>
            <p class="text-emerald-400"><span class="bg-emerald-500/10 text-emerald-400 px-1 rounded text-[10px] mr-1 font-sans font-bold">OK</span> Laravel Framework v11.51.0 (PHP 8.5)</p>
            <p class="text-slate-500 animate-pulse">&gt; Compiling template components... _</p>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ url()->previous() }}" class="px-5 py-2.5 hover:bg-slate-800 text-slate-300 hover:text-white font-bold text-xs rounded-xl border border-slate-700 transition-all" style="background-color: #1e293b;">
                Kembali Halaman Sebelumnya
            </a>
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md transition-all shadow-blue-900/20">
                Masuk ke Dashboard Utama
            </a>
        </div>

        <p class="mt-10 text-[10px] text-slate-600 tracking-wider uppercase font-semibold">
            &copy; {{ date('Y') }} Vian Angga.
        </p>
    </div>

</body>
</html>