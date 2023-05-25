<?php

namespace Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration
{
    public function up($schema)
    {
        $schema->create('quizzes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('quiz_title');

            $table->boolean('is_correct');
        });
    }
}
