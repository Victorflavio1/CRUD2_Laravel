<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CadastroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criando múltiplos cadastros
        DB::table('cadastro')->insert(
            [
                [
                    'codigo' => 001,
                    'nome' => 'Victor Flávio',
                    'email' => 'victorflavio.contato@gmail.com',
                    'senha' => '12a5s5f',
                    'created_at' => date('Y-m-d H:i:s')
                ],

                [
                    'codigo' => 002,
                    'nome' => 'Maria Isabel',
                    'email' => 'mariaisabel@gmail.com',
                    'senha' => 'dds552',
                    'created_at' => date('Y-m-d H:i:s')
                ],


            ]
        );
    }
}
