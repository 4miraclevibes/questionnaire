<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'admin',
            'user',
            'operator',
            'kepala_sekolah',
            'wakil_kurikulum',
        ];
        $i = 1;
        foreach ($users as $user) {
            User::create([
                'name' => $user,
                'email' => $user . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => $i,
            ]);
            $i++;
        }
    }
}
