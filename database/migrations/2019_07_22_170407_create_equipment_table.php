<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->string('model');
            $table->string('manufacture');
            $table->string('potency');
            $table->string('antenna');
            $table->string('range');
            $table->string('band');
            $table->text('description');
            $table->string('wan');
            $table->string('photo');
            $table->string('memory');
            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('equipment');
    }
}
