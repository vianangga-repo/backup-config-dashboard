<?php

namespace App\Http\Controllers;

use App\Models\AnsibleLog;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class NetworkController extends Controller
{
    public function runPlaybook()
    {
        // 1. Absolute Path folder Ansible
        $ansibleBaseDir = env('ANSIBLE_PATH'); 
        
        $playbookPath = $ansibleBaseDir . '/check_status.yml';
       
        $inventoryPath = $ansibleBaseDir . '/hosts';

        // 2. Jalankan Process dengan Working Directory (setWorkingDirectory)
        // agar Ansible bisa menemukan file pendukung seperti ansible.cfg atau group_vars
        $process = new Process([
            'ansible-playbook', 
            '-i', $inventoryPath, 
            $playbookPath
        ]);

        $process->setWorkingDirectory($ansibleBaseDir);
        $process->setTimeout(300);

        try {
            $process->mustRun();
            return response()->json([
                'status' => 'success',
                'output' => $process->getOutput()
            ]);
        } catch (ProcessFailedException $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

     public function runPlaybookBackup()
{
    // 1. Absolute Path folder Ansible
    $ansibleBaseDir = env('ANSIBLE_PATH'); 
    $playbookPath = $ansibleBaseDir . '/backupdist.yml';
    $inventoryPath = $ansibleBaseDir . '/hosts';

    // 2. Jalankan Process
    $process = new Process([
        'ansible-playbook', 
        '-i', $inventoryPath, 
        $playbookPath
    ]);

    $process->setWorkingDirectory($ansibleBaseDir);
    $process->setTimeout(300);

    try {
        $process->run(); // Gunakan run() agar kita bisa menangkap output meskipun gagal
        
        // $output = $process->getOutput() ?: $process->getErrorOutput();
        // $isSuccessful = $process->isSuccessful();

        // // 3. Logika Parsing Nama Perangkat (Opsional)
        // // Mencari nama host di dalam bracket [nama_host] pada baris "changed: [host]" atau "ok: [host]"
        // preg_match('/\[(.*?)\]/', $output, $matches);
        // $deviceName = $matches[1] ?? 'Multiple/Unknown';

        // // 4. Simpan ke Database SQLite melalui Model
        // AnsibleLog::create([
        //     'device_name' => $deviceName,
        //     'command'     => 'Backup Configuration',
        //     'output'      => $output,
        //     'status'      => $isSuccessful ? 'success' : 'failed',
        // ]);

        return response()->json([
            'status' => $isSuccessful ? 'success' : 'error',
            'output' => $output
        ]);

    } catch (\Exception $e) {
        // Tetap catat log jika terjadi error sistem (misal: path salah)
        AnsibleLog::create([
            'device_name' => 'System',
            'command'     => 'Backup Configuration',
            'output'      => $e->getMessage(),
            'status'      => 'failed',
        ]);

        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
}
}
