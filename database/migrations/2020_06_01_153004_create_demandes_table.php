<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
        
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_stagaire');
            $table->unsignedBigInteger('id_stage');
            $table->enum('type_dem',['Transfert','Revalidation','Reclamtion','Attestation']);
            $table->text('objet_dem');
            $table->boolean('demande_validé')->nullable();
            $table->timestamps();
            $table->foreign('id_stagaire')->references('id')->on('stagaires');
            $table->foreign('id_stage')->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
