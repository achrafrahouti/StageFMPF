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
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');            
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');            
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');   
            $table->unique(['periode_id','groupe_id']);//un groupe a un et un seul stage dans un periode
            $table->unique(['groupe_id','stage_id']);//un groupe ne peut pas passer un meme stage dans des periodes differents
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
