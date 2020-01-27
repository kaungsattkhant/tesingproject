<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=10;$i++){
            \App\Item::create([
                'name'=>Str::random(5),
            ]);
         }
    }
}
