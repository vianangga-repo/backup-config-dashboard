<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\AnsibleLog;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('dashboard', [
        //     'devices' => Device::all(),
        //     'logs' => AnsibleLog::latest()->take(5)->get()
        // ]);

        // Ambil semua data dari tabel devices
        $devices = \App\Models\Device::all(); 
        $logs = \App\Models\AnsibleLog::latest()->take(5)->get();

        // Pastikan variabel 'devices' dikirim ke view
        return view('dashboard', compact('devices', 'logs'));
        
    }

    public function runCommand(Request $request)
{
    $ansiblePath = rtrim(env('ANSIBLE_PATH'), '/'); // Membersihkan spasi atau garis miring berlebih
    $playbookPath = $ansiblePath . DIRECTORY_SEPARATOR . 'check_status.yml';
    $playbookPath = $ansiblePath . DIRECTORY_SEPARATOR . 'backupdist.yml';
    $inventoryPath = $ansiblePath . DIRECTORY_SEPARATOR . 'hosts';

    // Cek apakah file ada sebelum dijalankan
    if (!file_exists($playbookPath)) {
        return back()->with('error', "File playbook tidak ditemukan di: $playbookPath");
    }

    $process = new Process([
        'ansible-playbook', 
        '-i', $inventoryPath, 
        $playbookPath
    ]);
    
    $process->setWorkingDirectory($ansiblePath);
    $process->run();

    // Simpan Log ke SQLite
    \App\Models\AnsibleLog::create([
        'device_name' => 'All Cisco Devices',
        'command' => 'Check Status Playbook',
        'output' => $process->getOutput() ?: $process->getErrorOutput(),
        'status' => $process->isSuccessful() ? 'success' : 'failed',
    ]);

    return back()->with('message', 'Proses selesai diperiksa.');

    $currentUser = shell_exec('whoami');
    dd($currentUser); // Ini akan menghentikan program dan menampilkan user (misal: www-data atau kominfo)
}
}
