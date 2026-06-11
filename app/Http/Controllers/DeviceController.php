<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Menampilkan daftar device
    public function index()
    {
        $servers = Server::latest()->get();
        return view('servers.index', compact('servers'));
    }

    // Menampilkan form tambah server
    public function create()
    {
        return view('servers.create');
    }

    // Menyimpan data server ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'required|string|max:45',
            'ssh_user' => 'required|string|max:50',
            'group' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        Server::create($validated);

        return redirect()->route('servers.index')->with('success', 'Server berhasil ditambahkan!');
    }
}
