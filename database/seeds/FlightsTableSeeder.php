<?php

use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
            'title' => '<div>Laravel</div>',
            'order' => 1,
            'status' => 1
        ]);
    }
}
