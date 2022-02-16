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
            'password' => Hash::make('Flamengo123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 1
          ]);

        \DB::table('users')->insert([
            'id' => 2,
            'name' => 'Kenan Fintelman',
            'telefone' => '(48)98829-1177',
            'plano' => 'Básico',
            'email' => 'kenanfintelman123@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 3,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 3,
            'name' => 'Gabriela Fintelman',
            'telefone' => '(68) 9995-0225',
            'plano' => 'Padrão',
            'email' => 'gabifintelman@outlook.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 4,
            'name' => 'Teste 1',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_1@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 5,
            'name' => 'Teste 2',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_2@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 6,
            'name' => 'Teste 3',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_3@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);


        \DB::table('users')->insert([
            'id' => 7,
            'name' => 'Teste 4',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_4@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);


        \DB::table('users')->insert([
            'id' => 8,
            'name' => 'Teste 5',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_5@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);


        \DB::table('users')->insert([
            'id' => 9,
            'name' => 'Teste 6',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_6@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 10,
            'name' => 'Teste 7',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_7@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 11,
            'name' => 'Teste 8',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_8@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

        \DB::table('users')->insert([
            'id' => 12,
            'name' => 'Teste 9',
            'telefone' => '(48)98832-7775',
            'plano' => 'Avançado',
            'email' => 'teste_9@hotmail.com',
            'mudou_senha' => 0,
            'qtd_correcoes' => 4,
            'password' => Hash::make('asheww123'),
            'created_at' => now(),
            'updated_at' => now(),
            'nivel' => 2 
          ]);

    }
}
