<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;

class AnsibleVerController extends Controller
{
    public function checkVersion()
    {
        // Menjalankan perintah 'ansible --version'
        $result = Process::run('ansible --version');

        // Mengambil output dalam bentuk string
        $output = $result->output();

        // Jika terjadi error (misal ansible tidak ditemukan)
        if ($result->failed()) {
            $output = "Error: " . $result->errorOutput();
        }

        // Menampilkan hasil langsung ke browser (untuk testing)
        return response("<pre>{$output}</pre>");
    }
}
