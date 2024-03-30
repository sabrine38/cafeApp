<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class utilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateurs')->insert([
            'nom' => 'superadmin',
            'prenom' => 'mounajjim',
            'email' => 'admin@example.com',
            'motpass' => bcrypt('12345'), 
            'type_utilisateur' => 'superAdmin',
            'telephone' => '123456789',
            'adress'=>'ouarzazate',
            'image'=>'yyy',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('utilisateurs')->insert([
            'nom' => 'vendeur',
            'prenom' => 'v',
            'email' => 'vendeur@example.com',
            'motpass' => bcrypt('12345'),
            'type_utilisateur' => 'vendeur',
            'telephone' => '987654321',
            'adress'=>'ouarzazate',
            'image'=>'yyy',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('utilisateurs')->insert([
            'nom' => 'client',
            'prenom' => 'c',
            'email' => 'client@example.com',
            'motpass' => bcrypt('12345'),
            'type_utilisateur' => 'client',
            'telephone' => '987654321',
            'adress'=>'ouarzazate',
            'image'=>'yyy',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}