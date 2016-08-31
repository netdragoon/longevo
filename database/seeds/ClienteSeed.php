<?php

use Illuminate\Database\Seeder;

class ClienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i < 11; $i++) {
            DB::table('cliente')->insert([
                'nome' => str_random(10),
                'email' => str_random(10) . '@gmail.com'
            ]);
        }
    }
}
