<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'comments',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('content');
                $table->integer('movie_tmdb_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->string('user_name');
                $table->integer('review_id')->unsigned();
                $table->boolean('approved')->default(false);
                $table->timestamps();
            
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
