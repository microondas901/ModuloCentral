<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Proyectos', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('nombre')->unique();
            $table->enum('state', ['creacion', 'propuesta', 'activo'])->default('creacion');
            $table->integer('FK_GrupoDeInvestigacionId')->unsigned();
            $table->integer('FK_SemilleroId')->unsigned()->nullable();
            $table->integer('FK_CategoriaId')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('FK_GrupoDeInvestigacionId')->references('PK_id')
                ->on('TBL_GruposDeInvestigacion')->onUpdate('cascade');

            $table->foreign('FK_SemilleroId')->references('PK_id')
                ->on('TBL_Semilleros')->onUpdate('cascade');

            $table->foreign('FK_CategoriaId')->references('PK_id')
                ->on('TBL_Categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TBL_Proyectos');
    }
}
