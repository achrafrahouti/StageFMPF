<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageGroupePeriodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_groupe_periode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stage_id');
            $table->unsignedBigInteger('groupe_id');
            $table->unsignedBigInteger('periode_id');
            $table->foreign('stage_id')->references('id')->on('stages');            
            $table->foreign('groupe_id')->references('id')->on('groupes');            
            $table->foreign('periode_id')->references('id')->on('periodes');   
            $table->unique(['stage_id','periode_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_groupe_periode');
    }
}
