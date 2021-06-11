<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'товар №1',
            'suppler_company'=>'LG',
            'count'=>257,
            'cost'=>589,
            'description'=>'this is product #1'

        ],
        [
            'name'=>'Товар №2',
            'suppler_company'=>'LG',
            'count'=>5679,
            'cost'=>8956,
            'description'=>'this is best company'
        ],
        [
            'name'=>'Товар №3',
            'suppler_company'=>'Samsung',
            'count'=>5558,
            'cost'=>4145
        ]);
    }
}
