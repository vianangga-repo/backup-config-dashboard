<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ansible Backup Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto max-w-6xl p-6">
        <div class="mb-6 flex justify-between items-center bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Ansible Backup Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Memantau dan mengunduh file hasil backup otomatis.</p>
            </div>
            <div class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                Koneksi Direktori Aktif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-5 border-b border-gray-150 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-700">Daftar File di Folder Backup</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-sm uppercase font-medium border-b border-gray-200">
                            <th class="py-3 px-6">Nama File</th>
                            <th class="py-3 px-6">Ukuran</th>
                            <th class="py-3 px-6">Terakhir Diubah</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm divide-y divide-gray-150">
                        @forelse($files as $file)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $file['name'] }}
                                </td>
                                <td class="py-4 px-6">{{ $file['size'] }}</td>
                                <td class="py-4 px-6">{{ $file['last_modified'] }}</td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('backup.download', $file['name']) }}" 
                                       class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-1.5 px-3 rounded text-xs transition-all shadow-xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 px-6 text-center text-gray-400">
                                    Tidak ada file backup yang ditemukan di dalam direktori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>