<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Package;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            CitySeeder::class,
            PackageTypeSeeder::class,
            ShipperSeeder::class,
            TransportSeeder::class,
            PackageStatusSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Gasan',
            'lastname' => 'Hassan',
            'email' => 'admin@soficargo.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::factory()->create([
            'name' => 'Neftali',
            'lastname' => 'Yagua',
            'email' => 'neftali.yagua@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::factory()->create([
            'name' => 'Freddy',
            'lastname' => 'Marín',
            'email' => 'juniorknot@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::factory()->create([
            'name' => 'Gasan',
            'lastname' => 'Hassan',
            'email' => 'gasanh@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        Package::factory(60)->preparados()->create();
        Package::factory(60)->create();
        Photo::factory(200)->create();
        User::factory(20)->create();
    }
}
