<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Amazon']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Ebay']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Best Buy']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Walmart']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Shein']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Costco']);
        DB::insert('INSERT INTO shippers (name) VALUES (?)', ['Otros']);
    }
}
