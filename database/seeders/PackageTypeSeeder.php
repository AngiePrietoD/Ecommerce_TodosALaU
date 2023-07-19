<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Sobre']);
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Bolsa']);
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Paquete']);
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Caja']);
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Paleta']);
        DB::insert('INSERT INTO package_types (name) VALUES (?)', ['Rollo']);
    }
}
