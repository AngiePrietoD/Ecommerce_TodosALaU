<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO transports (name) VALUES (?)', ['Aéreo']);
        DB::insert('INSERT INTO transports (name) VALUES (?)', ['Marítimo']);
    }
}
