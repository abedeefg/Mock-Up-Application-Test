<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'uuid' => Str::uuid()->toString(),
            'nama_lengkap' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'Admin',
            'status' => '1',
        ]);
    }
}
