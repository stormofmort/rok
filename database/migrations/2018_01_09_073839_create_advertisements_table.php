<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_name');
            $table->string('ad_client');
            $table->string('ad_slot');
            $table->string('ad_layout')->nullable();
            $table->string('ad_format')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('display')->nullable();
            $table->string('text-align')->nullable();
            $table->integer('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('advertisements');
    }
}
