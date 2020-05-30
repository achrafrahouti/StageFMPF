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
            $table->unsignedBigInteger('stagaire_id');
            $table->unsignedBigInteger('stage_id');
            $table->foreign('stagaire_id')->references('id')->on('stagaires');
            $table->foreign('stage_id')->references('id')->on('stages');
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