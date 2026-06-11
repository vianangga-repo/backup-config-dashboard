<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnsibleLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'command',
        'output',
        'status'
    ];

    // Tips: Agar tampilan log di dashboard lebih rapi, 
    // kita bisa menambahkan casting untuk created_at jika diperlukan
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function runBackup(Request $request)
    {
        $ansiblePath = env('ANSIBLE_PATH');
        $playbook = $ansiblePath . '/backupdist.yml';
        $inventory = $ansiblePath . '/hosts';

        $process = new Process(['ansible-playbook', '-i', $inventory, $playbook]);
        $process->setWorkingDirectory($ansiblePath);
        $process->run();

        // Simpan ke SQLite
        \App\Models\AnsibleLog::create([
            'device_name' => 'distsemampir', // Anda bisa memparsing ini dari output jika perlu
            'command' => 'Backup Running Config',
            'output' => $process->getOutput(),
            'status' => $process->isSuccessful() ? 'success' : 'failed',
        ]);

        return back()->with('message', 'Backup berhasil disimpan ke database.');
    }
}
