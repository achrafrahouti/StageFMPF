<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignestageStagePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('Note')->nullable();
            $table->double('presence')->nullable();
            $table->double('motivation')->nullable();
            $table->double('Assiduite')->nullable();
            $table->double('integration')->nullable();
            $table->double('connaissance')->nullable();
            $table->unsignedBigInteger('stagaire_id');
            $table->unsignedBigInteger('stage_id');
            $table->boolean('verify')->nullable();
            $table->foreign('stagaire_id')->references('id')->on('stagaires');
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->unique(['stage_id','stagaire_id']);
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
        Schema::dropIfExists('lignestage_stage_pivot');
    }
}
