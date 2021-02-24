<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacient_id');
            $table->foreign('pacient_id')->references('id')->on('pacients')->onDelete('cascade');
            $table->boolean('febre');
            $table->boolean('coriza');
            $table->boolean('nariz_ent');
            $table->boolean('cansaco');
            $table->boolean('tosse');
            $table->boolean('dor_cab');
            $table->boolean('dor_corpo');
            $table->boolean('mal_estar');
            $table->boolean('dor_garganta');
            $table->boolean('dif_respirar');
            $table->boolean('falta_paladar');
            $table->boolean('falta_olfato');
            $table->boolean('dif_loc');
            $table->boolean('diarreia');
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
        Schema::dropIfExists('diagnostics');
    }
}
