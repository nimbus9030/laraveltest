<?php

use Illuminate\Database\Seeder;

class HtmlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('htmls')->insert([
            'html' => '<div>Laravel</div>',
            'order' => 1,
            'status' => 1
        ]);
    }
}
