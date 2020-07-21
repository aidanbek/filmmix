<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_directors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->index();
            $table->unsignedBigInteger('director_id')->index();
            $table->unique(['film_id', 'director_id']);
            $table->timestamps();
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('director_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('film_directors');
    }
}
