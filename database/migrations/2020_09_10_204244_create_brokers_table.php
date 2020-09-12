<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('broker_name')->nullable();
            $table->string('broker_license')->nullable();
            $table->string('logo')->default('logo.png');
            $table->string('banner_color')->default('#FFFFFFF');
            $table->string('body_color')->default('#FFFFFFF');
            $table->string('button_color')->default('#FFFFFFF');
            $table->boolean('lock_color')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('brokers');
    }
}
