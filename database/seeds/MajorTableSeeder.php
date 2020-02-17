<?php

use Illuminate\Database\Seeder;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major=['CT','CS'];
        foreach($major as $m){
            \App\Model\Major::create([
                'name'=>$m,
            ]);
        }
    }
}
