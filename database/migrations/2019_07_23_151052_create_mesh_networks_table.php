<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeshNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesh_networks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('bssid');
            $table->string('location');
            $table->string('users_attended');
            $table->string('nodes');
            $table->string('gateway');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesh_networks');
    }
}
