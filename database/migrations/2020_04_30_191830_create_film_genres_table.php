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
            $table->unsignedBigInteger('film_id')->index();
            $table->unsignedBigInteger('genre_id')->index();
            $table->unique(['film_id', 'genre_id']);
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
            $table->timestamps();
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
