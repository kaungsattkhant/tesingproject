<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as  Faker;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,20) as $index){
            \App\Model\Item::create([
                'name'=>$faker->word,
            ]);

        }
    }
}
