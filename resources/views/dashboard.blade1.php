<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Automation Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Custom scrollbar untuk tampilan terminal */
        .terminal-scroll::-webkit-scrollbar { width: 8px; }
        .terminal-scroll::-webkit-scrollbar-track { background: #1a1a1a; }
        .terminal-scroll::-webkit-scrollbar-thumb { background: #444; border-radius: 4px; }
    </style>    
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-blue-800">Cisco Automation Center</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-500">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <span class="mr-2">⚡</span> Quick Actions
        </h2>
        
        <div class="space-y-4">
    <!-- Tombol Health Check -->
    <form action="/run-ansible" method="POST">
        @csrf
        <!-- Tambahkan input hidden untuk identifikasi aksi -->
        <input type="hidden" name="action" value="health_check">
        <button type="submit" class="group w-full flex items-center justify-center bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white font-semibold py-3 px-4 rounded-lg border border-indigo-200 transition-all duration-200 shadow-sm">
            <svg class="w-5 h-5 mr-2 text-indigo-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Run Health Check
        </button>
    </form>

    <!-- Tombol Backup Config -->
    <form action="/run-ansible" method="POST">
        @csrf
        <input type="hidden" name="action" value="backup_config">
        <button type="submit" class="group w-full flex items-center justify-center bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white font-semibold py-3 px-4 rounded-lg border border-emerald-200 transition-all duration-200 shadow-sm">
            <svg class="w-5 h-5 mr-2 text-emerald-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
            </svg>
            Run Backup Config
        </button>
    </form>
</div>

        <div class="mt-6 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center italic">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path>
                </svg>
                Menjalankan otomatisasi via ansible-playbook.
            </p>
        </div>
    </div>
</div>

            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-2">
                <h2 class="text-xl font-semibold mb-4">Managed Switch</h2>
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 uppercase">Device Name</th>
                            <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 uppercase">IP Address</th>
                            <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($devices as $device)
                        <tr>
                            <td class="px-5 py-4 border-b text-sm">{{ $device->name }}</td>
                            <td class="px-5 py-4 border-b text-sm font-mono">{{ $device->ip_address }}</td>
                            <td class="px-5 py-4 border-b text-sm">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Connected</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center italic">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path>
                </svg>
                Menjalankan otomatisasi via ansible-playbook.
            </p>
        </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-lg shadow-md overflow-hidden" x-data="{ openModal: false, activeLog: '' }">
    <div class="bg-gray-800 px-6 py-4 flex justify-between items-center">
        <h2 class="text-white font-bold">Recent Activities</h2>
        <span class="text-xs text-gray-400">Database: SQLite</span>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Timestamp</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Task</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($logs as $log)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $log->created_at->format('H:i:s d/m/Y') }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $log->command }}</td>
                    <td class="px-6 py-4">
                        @if($log->status == 'success')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">SUCCESS</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">FAILED</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button 
                            @click="openModal = true; activeLog = `{{ addslashes($log->output) }}`"
                            class="text-blue-600 hover:text-blue-900 font-medium text-sm">
                            View Details
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Pop-up untuk Detail Log -->
    <div x-show="openModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50"></div>
            
            <div class="bg-gray-900 rounded-lg overflow-hidden shadow-2xl transform transition-all max-w-4xl w-full z-50">
                <div class="bg-gray-800 px-4 py-3 flex justify-between items-center border-b border-gray-700">
                    <h3 class="text-white font-bold italic font-mono text-sm">Terminal Output - Ansible</h3>
                    <button @click="openModal = false" class="text-gray-400 hover:text-white">&times;</button>
                </div>
                <div class="p-4 overflow-auto max-h-[70vh] terminal-scroll bg-black">
                    <pre class="text-green-400 font-mono text-xs leading-relaxed whitespace-pre-wrap" x-text="activeLog"></pre>
                </div>
                <div class="bg-gray-800 px-4 py-3 text-right">
                    <button @click="openModal = false" class="bg-gray-700 text-white px-4 py-2 rounded text-sm hover:bg-gray-600">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>