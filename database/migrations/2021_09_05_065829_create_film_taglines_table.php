<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTaglinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_taglines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->index();
            $table->unsignedBigInteger('tagline_id')->index();
            $table->unique(['film_id', 'tagline_id']);
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('tagline_id')
                ->references('id')
                ->on('taglines')
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
        Schema::dropIfExists('film_taglines');
    }
}
