<aside class="fixed inset-y-0 left-0 z-50 w-64 min-w-[256px] max-w-[256px] h-screen bg-slate-900 text-slate-300 border-r border-slate-800 flex flex-col justify-between">
    
    <div class="flex flex-col flex-1 overflow-y-auto h-full">
        <div class="h-16 min-h-[4rem] flex items-center px-6 border-b border-slate-800 gap-2 shrink-0 bg-slate-900 sticky top-0 z-10">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
            </svg>
            <span class="font-black text-sm uppercase tracking-wider text-slate-100">Backup<span class="text-blue-500">Config</span></span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white font-bold' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                <span>All Backups</span>
            </a>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-slate-800 text-slate-400 hover:text-slate-200 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        <span>BGP Router</span>
                    </div>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="mt-1 ml-6 pl-2 border-l border-slate-800 space-y-1">
                    <a href="{{route('under.development')}}" class="block px-4 py-2 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200">BGP NOC</a>
                    <a href="{{route('under.develop')}}" class="block px-4 py-2 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200">BGP DRC</a>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-slate-800 text-slate-400 hover:text-slate-200 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>Distribution Switch</span>
                    </div>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="mt-1 ml-6 pl-2 border-l border-slate-800 space-y-1">
                    <a href="{{route('distri.dinkes')}}" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Dinkes</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Gunung Anyar</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Jimerto</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Sawahan</a>
                    <a href="{{route('distri.tandes')}}" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Tandes</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Lakarsantri</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Joyoboyo</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Menanggal</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Bratang</a>
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Dinsos</a>
                    
                    <a href="#" class="block px-4 py-1.5 text-xs rounded-lg text-slate-400 hover:bg-slate-800 hover:text-slate-200 flex items-center gap-1.5"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Distri Semampir</a>
                    
                </div>
            </div>

        </nav>
    </div>

    <div class="p-4 border-t border-slate-800 bg-slate-950/60 text-center text-[10px] text-slate-500 shrink-0">
        &copy; {{ date('Y') }} Vian Angga.
    </div>
</aside>