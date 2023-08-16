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
        User::create([
            'role_id'  => 2,
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('rootadmin'),
            'phone_no' => '03000000000',
            'pnc_no' => 'test',
        ]);
    }
}
