<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@mercarq.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Cliente Piloto',
            'email' => 'cliente@mercarq.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Arquitecto Bravo',
            'email' => 'arquitecto@mercarq.com',
            'password' => Hash::make('arquitecto123'),
            'role' => 'arquitecto',
        ]);
    }
}
