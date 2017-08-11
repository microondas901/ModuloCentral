<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Scripts', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('url');
            $table->boolean('estado');
            $table->integer('FK_ProyectoId')->unsigned();

            $table->foreign('FK_ProyectoId')->references('PK_id')
            ->on('TBL_Proyectos')->onUpdate('cascade');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TBL_scripts');
    }
}
