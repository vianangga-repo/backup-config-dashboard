<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-[calc(100vh-12rem)] px-4 py-8 text-center animate-fade-in">
        
        <div class="relative mb-8 flex items-center justify-center">
            <div class="absolute w-44 h-44 bg-blue-400/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute w-24 h-24 bg-emerald-400/10 rounded-full blur-lg animate-ping duration-1000"></div>

            <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl text-slate-400 w-52">
                <div class="flex justify-between gap-1 mb-2 border-b border-slate-800 pb-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <div class="flex gap-1">
                        <span class="w-3 h-2 bg-slate-700 rounded-xs"></span>
                        <span class="w-3 h-2 bg-blue-500 rounded-xs"></span>
                        <span class="w-3 h-2 bg-slate-700 rounded-xs"></span>
                        <span class="w-3 h-2 bg-emerald-500 rounded-xs"></span>
                    </div>
                </div>
                <div class="bg-slate-950 p-2.5 rounded-lg border border-slate-800 font-mono text-[10px] text-left text-emerald-400 space-y-1">
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-ping"></span>
                        <span>bgp_router# sh ip bgp</span>
                    </div>
                    <div class="text-slate-500 text-[9px] truncate">Connecting to neighbor...</div>
                </div>
                <div class="mt-3 flex justify-end gap-1.5 text-[9px] font-bold tracking-wider text-slate-500 uppercase">
                    <span>Te-0/1/0</span>
                    <span class="text-emerald-400 animate-pulse">UP</span>
                </div>
            </div>
        </div>

        <div class="max-w-md">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200 mb-4 shadow-2xs">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                Optimasi Jalur Jaringan
            </span>

            <h1 class="text-2xl font-black text-slate-900 tracking-tight sm:text-3xl">
                Modul Sedang Dikonfigurasi
            </h1>
            
            <p class="mt-3 text-sm text-slate-500 leading-relaxed">
                Tim IT Network Administrator sedang melakukan interkoneksi routing tabel dan sinkronisasi berkas otomatis Ansible di segmen perangkat ini.
            </p>
        </div>

        <div class="mt-8 w-full max-w-lg bg-slate-900 border border-slate-800 text-left rounded-xl p-4 font-mono text-xs text-slate-300 shadow-lg overflow-hidden relative">
            <div class="flex items-center gap-1.5 border-b border-slate-800 pb-2 mb-2 text-slate-500 text-[11px]">
                <span class="w-2.5 h-2.5 rounded-full bg-red-500/80 inline-block"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/80 inline-block"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-green-500/80 inline-block"></span>
                <span class="ml-2 font-sans font-medium select-none">Terminal - ansible-playbook</span>
            </div>
            <div class="space-y-1 text-[11px] leading-5">
                <p class="text-slate-500">[TASK] <span class="text-blue-400">Gathering Facts from Network Devices ...</span></p>
                <p class="text-emerald-400">[OK] <span class="text-slate-300">Success establishing connection to 172.17.200.2</span></p>
                <p class="text-amber-400">[PLAYBOOK] <span class="text-slate-300">Applying changes to Core Distribution Switch ...</span></p>
                <p class="text-slate-500 animate-pulse"><span class="bg-slate-700 text-white px-1 py-0.5 rounded text-[9px] mr-1">RUNNING</span> <span class="text-slate-400">Please wait, compiling playbook variables..._</span></p>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white hover:bg-slate-800 font-bold text-xs rounded-xl shadow-xs transition-all hover:scale-[1.02] active:scale-[0.98]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard Utama
            </a>
        </div>

    </div>
</x-app-layout>