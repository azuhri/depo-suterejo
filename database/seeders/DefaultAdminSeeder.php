<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultAdmins = [
            [
                "name" => "Admin Solusisampah",
                "email" => "admin.solusisampah@gmail.com",
                "password" => \bcrypt("adminadmin"),
            ],
        ];

        foreach ($defaultAdmins as $admin) {
            try {
                Admin::updateOrCreate(
                    ['email' => $admin["email"]], // Kondisi untuk mencari pengguna
                    $admin
                );
                echo "\nCreate Default Admin: {$admin['name']}\n";
            } catch (\Throwable $th) {
                echo "\nError: {$th->getMessage()}\n";
            }
        }
    }
}
