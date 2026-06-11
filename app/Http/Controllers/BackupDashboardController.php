<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupDashboardController extends Controller
{
    public function index()
    {
        $disk = Storage::disk('ansible_backup');
        $files = [];

        // Ambil semua file di dalam folder backup
        if ($disk->exists('')) {
            $allFiles = $disk->files('');

            foreach ($allFiles as $file) {
                $files[] = [
                    'name' => $file,
                    'size' => $this->formatBytes($disk->size($file)),
                    'last_modified' => date('Y-m-d H:i:s', $disk->lastModified($file)),
                ];
            }
        }

        return view('dashboard', compact('files'));
    }

    public function bgpnoc(){
        return view('bgp.bgpnoc');
    }

    public function distTandes(){
        
        $files = [];
    
        // 1. Panggil disk absolut yang sudah kita daftarkan di config/filesystems.php
        $disk = Storage::disk('bctandes'); 

        try {
            // 2. Langsung ambil file. Flysystem otomatis membaca dari root: /home/kominfo/ansible/bctandes
            $allFiles = $disk->files(); 

            foreach ($allFiles ?? [] as $filename) {
                // Abaikan file tersembunyi
                if (str_starts_with($filename, '.')) continue; 

                $bytes = $disk->size($filename);
            
                // Konversi ukuran ke KB/MB agar rapi
                if ($bytes >= 1048576) {
                    $size = number_format($bytes / 1048576, 2) . ' MB';
                } else {
                    $size = number_format($bytes / 1024, 2) . ' KB';
                }

                $files[] = [
                    'name' => $filename,
                    'size' => $size,
                    'last_modified' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($filename))->toDateTimeString(),
                ];
            }
        } catch (\Exception $e) {
            // Jika folder kosong atau permission linux ditolak, buat array tetap kosong agar tidak crash
            $files = [];
        }

        // 3. Lempar datanya ke view blade khusus milik Tandes
        return view('distribution.tandes', compact('files'));
    }

    public function distDinkes(){
        $files = [];
    
        // 1. Panggil disk absolut yang sudah kita daftarkan di config/filesystems.php
        $disk = Storage::disk('bcdinkes'); 

        try {
            // 2. Langsung ambil file. Flysystem otomatis membaca dari root: /home/kominfo/ansible/bctandes
            $allFiles = $disk->files(); 

            foreach ($allFiles ?? [] as $filename) {
                // Abaikan file tersembunyi
                if (str_starts_with($filename, '.')) continue; 

                $bytes = $disk->size($filename);
            
                // Konversi ukuran ke KB/MB agar rapi
                if ($bytes >= 1048576) {
                    $size = number_format($bytes / 1048576, 2) . ' MB';
                } else {
                    $size = number_format($bytes / 1024, 2) . ' KB';
                }

                $files[] = [
                    'name' => $filename,
                    'size' => $size,
                    'last_modified' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($filename))->toDateTimeString(),
                ];
            }
        } catch (\Exception $e) {
            // Jika folder kosong atau permission linux ditolak, buat array tetap kosong agar tidak crash
            $files = [];
        }

        // 3. Lempar datanya ke view blade khusus milik Dinkes
        return view('distribution.dinkes', compact('files'));
    }
    

    public function downloadDinkes($filename){
        $disk = Storage::disk('bcdinkes');

        // Pastikan file tersebut benar-benar ada di folder sebelum di-download
        if ($disk->exists($filename)) {
            // Mendownload langsung menggunakan path absolut yang terisolasi di Flysystem
            return $disk->download($filename);
        }

        // Jika file tidak sengaja terhapus di server, kembalikan dengan pesan error
        return abort(404, "File konfigurasi tidak ditemukan di server.");
    }

    public function downloadTandes($filename)
    {
        $disk = Storage::disk('bctandes');

        // Pastikan file tersebut benar-benar ada di folder sebelum di-download
        if ($disk->exists($filename)) {
            // Mendownload langsung menggunakan path absolut yang terisolasi di Flysystem
            return $disk->download($filename);
        }

        // Jika file tidak sengaja terhapus di server, kembalikan dengan pesan error
        return abort(404, "File konfigurasi tidak ditemukan di server.");
    }

    public function download($filename)
    {
        $disk = Storage::disk('ansible_backup');

        if (!$disk->exists($filename)) {
            abort(404, 'File tidak ditemukan.');
        }

        // CARA AMAN: Mengambil path absolut langsung dari konfigurasi disk Laravel
        $path = $disk->path($filename);

        return response()->download($path);
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}