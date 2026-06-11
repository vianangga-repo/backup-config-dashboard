<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \App\Models\Device::create([
            'name' => 'Core Switch',
            'ip_address' => '10.10.100.254',
            'model' => 'Catalyst 9600'
        ]);

        \App\Models\Device::create([
            'name' => 'Distribution Switch',
            'ip_address' => '10.10.100.3',
            'model' => 'Catalyst C9500'
        ]);
    }
}
