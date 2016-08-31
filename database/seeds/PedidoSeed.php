<?php

use Illuminate\Database\Seeder;

class PedidoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i < 11; $i++) {
            DB::table('pedido')->insert([
                'descricao' => str_random(10)
            ]);
        }
    }
}
