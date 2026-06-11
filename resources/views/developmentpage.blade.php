<x-app-layout>
    <div class="min-h-[calc(100vh-4rem)] p-6 sm:p-8 flex items-center justify-center transition-colors duration-300" style="background-color: #0f172a;">
        
        <div class="max-w-xl w-full p-8 rounded-2xl border border-slate-800 shadow-2xl text-center relative overflow-hidden" style="background-color: #1e293b;">
            
            <div class="absolute top-[-20%] left-[30%] w-40 h-40 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="flex justify-center mb-6">
                <div class="relative flex items-center justify-center w-20 h-20 rounded-2xl border border-slate-700/60 shadow-inner bg-slate-950">
                    <span class="absolute inline-flex h-10 w-10 rounded-xl bg-blue-500/20 animate-ping"></span>
                    
                    <svg class="w-10 h-10 text-blue-400 relative z-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z"></path>
                    </svg>
                </div>
            </div>

            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-blue-500/10 text-blue-400 border border-blue-500/20 mb-4">
                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-pulse"></span>
                Status: In Progress
            </div>

            <h1 class="text-2xl font-black text-white tracking-tight sm:text-3xl">
                Module Under <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Development</span>
            </h1>
            
            <p class="mt-3 text-sm text-slate-400 leading-relaxed max-w-md mx-auto">
                Kami sedang melakukan sinkronisasi modul ini dengan <span class="font-mono text-blue-400 font-semibold">Ansible Engine</span>. Fitur ini akan segera tersedia setelah proses pengujian selesai.
            </p>

            <div class="my-6 border-t border-slate-700/50"></div>

            <div class="border border-slate-800 text-left rounded-xl p-4 font-mono text-xs text-slate-300 space-y-1.5 shadow-inner bg-slate-950">
                <div class="flex gap-1.5 mb-2 border-b border-slate-900 pb-2 text-slate-600 text-[10px] items-center">
                    <span class="w-2 h-2 rounded-full bg-red-500/70"></span>
                    <span class="w-2 h-2 rounded-full bg-yellow-500/70"></span>
                    <span class="w-2 h-2 rounded-full bg-green-500/70"></span>
                    <span class="ml-1 font-sans">terminal — ansible-playbook</span>
                </div>
                <p class="text-slate-500"><span class="text-slate-700">$</span> ansible-playbook setup_module.yml</p>
                <p class="text-emerald-400 font-medium">[OK] <span class="text-slate-300">Checking network connectivity...</span></p>
                <p class="text-emerald-400 font-medium">[OK] <span class="text-slate-300">Fetching core configurations...</span></p>
                <p class="text-blue-400 font-medium animate-pulse">[WAIT] <span class="text-slate-400">Compiling UI dark components..._</span></p>
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md transition-all hover:scale-[1.02] active:scale-[0.98] shadow-blue-900/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Dashboard Utama
                </a>
            </div>

        </div>
    </div>
</x-app-layout>