<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Amazonas', 'VE-X']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Anzoátegui', 'VE-B']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Apure', 'VE-C']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Aragua', 'VE-D']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Barinas', 'VE-E']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Bolívar', 'VE-F']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Carabobo', 'VE-G']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Cojedes', 'VE-H']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Delta Amacuro', 'VE-Y']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Falcón', 'VE-I']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Guárico', 'VE-J']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Lara', 'VE-K']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Mérida', 'VE-L']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Miranda', 'VE-M']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Monagas', 'VE-N']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Nueva Esparta', 'VE-O']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Portuguesa', 'VE-P']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Sucre', 'VE-R']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Táchira', 'VE-S']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Trujillo', 'VE-T']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['La Guaira', 'VE-W']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Yaracuy', 'VE-U']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Zulia', 'VE-V']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Distrito Capital', 'VE-A']);
        DB::insert('INSERT INTO departments (name, code) VALUES (?, ?)', ['Dependencias Federales', 'VE-Z']);
    }
}
