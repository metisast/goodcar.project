<?php

use Illuminate\Database\Seeder;

class ProductsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array('Неопубликован', 'Обычный', 'Новинка', 'Хит продаж');

        for($i = 1; $i <= count($status); $i++)
        {
            DB::table('products_status')->insert([
                'title' => $status[$i],
            ]);
        }
    }
}
