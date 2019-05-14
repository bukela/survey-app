<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tables = [
//        'roles',
//        'users',
        'surveys',
//        'patients',
        'survey_answers',
        'survey_questions',
        'survey_doctor_patients',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

//        $this->call(RolesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(SurveyOneSeeder::class);
        $this->call(SurveyTwoSeeder::class);
        $this->call(SurveyThreeSeeder::class);
    }
}
