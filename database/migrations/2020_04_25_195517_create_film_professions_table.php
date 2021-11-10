<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_professions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->index();
            $table->unsignedBigInteger('profession_id')->index();
            $table->unique(['film_id', 'profession_id']);
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('profession_id')
                ->references('id')
                ->on('professions')
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
        Schema::dropIfExists('film_professions');
    }
}
