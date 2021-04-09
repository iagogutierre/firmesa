<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmwareInKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmware_in_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('kit_id')->unsigned();
            $table->bigInteger('firmware_id')->unsigned(); 
            $table->foreign('firmware_id')
                    ->references('id')->on('firmware')
                    ->onDelete('cascade');
            $table->foreign('kit_id')
                    ->references('id')->on('installation_kits')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firmware_in_kits');
    }
}
