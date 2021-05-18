<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FruitSeeder extends Seeder
{
    public function run()
    {
        DB::table('fruit')->insert([
        	[
        	   'name' => 'Apple',
        	   'category' => 'Hard Fruit',
        	   'price' => 1000
        	],
            [
        	   'name' => 'Pears',
        	   'category' => 'Hard Fruit',
        	   'price' => 2000
        	]
    	]);
    }
}
