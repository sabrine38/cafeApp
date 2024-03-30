<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendeurs')->insert([
            'NomV' => 'salma',
            'PrénomV'=> 'admin',
            'EmailV'=>'admin@gmail.com',
            'mot_de_passV' => Hash::make('admin'),

        ]);

    }
}
