<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('survey_id');
            $table->string('type');
            $table->boolean('other')->default(false);
            $table->string('text')->nullable();
            $table->longText('options')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('survey_questions')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_questions');
    }
}
