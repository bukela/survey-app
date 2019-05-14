<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Survey::class)->create(['title' => 'Survey 1']);
        factory(\App\Survey::class)->create(['title' => 'Survey 2']);
        factory(\App\Survey::class)->create(['title' => 'Survey 3']);
    }
}
