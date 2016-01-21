<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_location', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('parent_id')->unsigned()->index();
            $table->string('location_name',255);
            $table->integer('sort_order')->unsigned();
            $table->integer('limit')->unsigned();
            $table->string('size_display',255);
            $table->string('flag_last',255);
            $table->string('type',255);
            $table->timestamps();
            $table->tinyInteger('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banner_location');
    }
}
