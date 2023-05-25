<?php

namespace Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizOptionsTable extends Migration
{
    public function up($schema)
    {
        $schema->create('quiz_options', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');

            $table->string('option_text');
        });
    }
}
