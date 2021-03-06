<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherLabelColumnToSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->string('other_label')->after('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->dropColumn('other_label');
        });
    }
}
