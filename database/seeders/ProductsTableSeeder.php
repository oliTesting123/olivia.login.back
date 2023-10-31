<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Samsung Galaxy S22 8+128 GB Green',
            'description' => 'Marca: Samsung, Almacenamiento: 128GB, Android: 12.0, Color: Green',
            'code' => 'SM-S901EZGLLTM',
            'price' => 8972.00
        ]);
        DB::table('products')->insert([
            'name' => 'SAMSUNG Galaxy S23 Ultra 12GB_512GB Negro',
            'description' => 'Marca: Samsung, Almacenameinto: 512GB, Antroid: 13.0, Color: Negro',
            'code' => 'SM-S918BZKVLTM',
            'price' => 19124.00
        ]);
    }
}
