<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoveltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('type', function (Blueprint $table)  {
             $table->bigIncrements('id');
             $table->string('name');
             $table->text('description');
             $table->timestamps();
         });


        Schema::create('areas', function (Blueprint $table)  {
             $table->bigIncrements('id');
             $table->string('name');

             $table->bigInteger('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
             $table->Boolean('status');
             $table->timestamps();
         });


               Schema::create('ambients', function (Blueprint $table)  {
             $table->bigIncrements('id');
             $table->string('name');
             $table->string('codigo');
             $table->text('description');

             $table->bigInteger('areas_id')->unsigned();
             $table->foreign('areas_id')->references('id')->on('areas');
             $table->timestamps();
         });


        Schema::create('novelties', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->bigInteger('area_id')->unsigned();
             $table->foreign('area_id')->references('id')->on('areas');

             $table->bigInteger('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
             $table->Boolean('status');
             $table->text('description');
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
        Schema::dropIfExists('type');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('ambients');
        Schema::dropIfExists('novelties');
    }
}
