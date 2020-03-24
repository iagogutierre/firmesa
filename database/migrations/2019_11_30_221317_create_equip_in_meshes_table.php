<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipInMeshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equip_in_meshes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_equipment')->unsigned();
            $table->bigInteger('id_mesh')->unsigned();
            //$table->bigInteger('id_admin');
            $table->foreign('id_equipment')
                ->references('id')->on('firmware')
                ->onDelete('cascade');
            $table->foreign('id_mesh')
                ->references('id')->on('mesh_networks')
                ->onDelete('cascade');
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
        Schema::dropIfExists('equip_in_meshes');
    }
}
