<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaCodificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_NotaCodificacion', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->float('nota');
            $table->integer('total');
            $table->integer('acertadas');
            $table->integer('FK_ScriptsId')->unsigned();
            $table->integer('FK_ItemsId')->unsigned();

            $table->foreign('FK_ScriptsId')->references('PK_id')
            ->on('TBL_Scripts')->onUpdate('cascade');

            $table->foreign('FK_ItemsId')->references('PK_id')
            ->on('TBL_ItemsCodificacion')->onUpdate('cascade');
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
        Schema::dropIfExists('TBL_NotaCodificacion');
    }
}
