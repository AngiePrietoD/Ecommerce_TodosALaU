<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO package_statuses (name, path) VALUES (?, ?)', ['Recibidos', 'paquetes']);
        DB::insert('INSERT INTO package_statuses (name, path) VALUES (?, ?)', ['Preparados', 'paquetes']);
        DB::insert('INSERT INTO package_statuses (name, path) VALUES (?, ?)', ['En tránsito', 'transito']);
        DB::insert('INSERT INTO package_statuses (name, path) VALUES (?, ?)', ['Disponibles', 'disponible']);
        DB::insert('INSERT INTO package_statuses (name, path) VALUES (?, ?)', ['Entregados', 'recibidos']);
    }
}
