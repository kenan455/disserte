<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        'id' => 1,
        'name' => 'Marcos de Oliveira',
        'telefone' => '(68)9904-3457',
        'plano' => '',
        'email' => 'marcos.sobrinho1@hotmail.com',
        'mudou_senha' => 0,
        'password' => Hash::make('asheww123'),
        'created_at' => now(),
        'updated_at' => now(),
        'nivel' => 1
      ]);

        \DB::table('users')->insert([
        'id' => 2,
        'name' => 'Kenan Fintelman',
        'telefone' => '(48)98832-7775',
        'plano' => 'Básico',
        'email' => 'kenanfintelman123@hotmail.com',
        'mudou_senha' => 0,
        'password' => Hash::make('asheww123'),
        'created_at' => now(),
        'updated_at' => now(),
        'nivel' => 2 
      ]);


    }
}
