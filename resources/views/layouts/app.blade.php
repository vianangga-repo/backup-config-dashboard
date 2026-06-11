<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Backup Config Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    
    <div class="min-h-screen w-full flex bg-gray-50">
        
        @include('layouts.navigation')

        <div class="flex-1 flex flex-col min-w-0 min-h-screen" style="margin-left: 256px;">
            
            <header class="bg-white border-b border-gray-200 h-16 min-h-[4rem] flex items-center justify-between px-6 sticky top-0 z-40 w-full">
                <div></div>
                
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Admin</span>
                        <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 border border-red-150 text-xs font-bold rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-6 w-full mx-auto flex-1 overflow-x-hidden">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>