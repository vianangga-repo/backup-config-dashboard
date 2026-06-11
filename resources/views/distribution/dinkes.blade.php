<x-app-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Distri Tandes </h1>
        <p class="text-xs text-gray-500 mt-1">Halaman backup config manajemen untuk perangkat Distribusi Dinkes.</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden w-full">
        <div class="p-5 border-b border-gray-150 bg-gray-50/50">
            <h2 class="text-sm font-bold text-gray-700">Daftar File Konfigurasi</h2>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-gray-100/70 text-gray-500 text-[11px] uppercase tracking-wider font-semibold border-b border-gray-200">
                        <th class="py-3 px-6 w-1/2">File Name</th>
                        <th class="py-3 px-6">Size</th>
                        <th class="py-3 px-6">Last Change</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
                    @forelse($files as $file)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="py-4 px-6 font-medium text-gray-900 break-all">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $file['name'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 whitespace-nowrap">{{ $file['size'] }}</td>
                            <td class="py-4 px-6 text-gray-500 whitespace-nowrap">{{ $file['last_modified'] }}</td>
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                <a href="{{ route('distri.dinkes.download', ['filename' => $file['name']]) }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-lg text-xs transition-all shadow-xs">
                                    Download
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-400 text-sm">
                                Tidak ada berkas cadangan ditemukan di dalam folder bctandes atau folder kosong.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>