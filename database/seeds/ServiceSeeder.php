<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert(['nome_servico' => 'Entrada de funcionário novo',]);
        DB::table('services')->insert(['nome_servico' => 'Desmobilização de lojas',]);
        DB::table('services')->insert(['nome_servico' => 'Montagem de quiosques',]);
        DB::table('services')->insert(['nome_servico' => 'Desmobilização de quiosques',]);
        DB::table('services')->insert(['nome_servico' => 'Entrada de mercadorias da loja',]);
        DB::table('services')->insert(['nome_servico' => 'Saída de mercadorias da loja',]);
        DB::table('services')->insert(['nome_servico' => 'Instalação de material promocional',]);
        DB::table('services')->insert(['nome_servico' => 'Montagem de exposições em geral',]);
        DB::table('services')->insert(['nome_servico' => 'Fechamento para contagem de estoque',]);
        DB::table('services')->insert(['nome_servico' => 'Manutenção geral (especificar em observações)',]);
        DB::table('services')->insert(['nome_servico' => 'Manutenção elétrica',]);
        DB::table('services')->insert(['nome_servico' => 'Manutenção hidráulica',]);
        DB::table('services')->insert(['nome_servico' => 'Manutenção de equipamentos',]);
        DB::table('services')->insert(['nome_servico' => 'Dedetização da loja',]);
        DB::table('services')->insert(['nome_servico' => 'Manutenção de coleção e vitrine',]);
        DB::table('services')->insert(['nome_servico' => 'Limpeza de vitrines',]);
        DB::table('services')->insert(['nome_servico' => 'Terceirizados a serviço da AGS',]);
    }
}
