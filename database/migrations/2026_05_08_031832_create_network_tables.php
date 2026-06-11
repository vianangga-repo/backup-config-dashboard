<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel Perangkat
    Schema::create('devices', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('ip_address');
        $table->string('model')->nullable();
        $table->timestamps();
    });

    // Tabel Log Aktivitas
    Schema::create('ansible_logs', function (Blueprint $table) {
        $table->id();
        $table->string('device_name');
        $table->string('command');
        $table->text('output')->nullable();
        $table->string('status'); // success/failed
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_tables');
    }
};
