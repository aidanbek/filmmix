<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('film_id')->index();
            $table->unsignedSmallInteger('genre_id')->index();
            $table->unique(['film_id', 'genre_id']);
            $table->timestamps();
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_genres');
    }
}
