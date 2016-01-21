<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GolfUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('group_id')->unsigned()->index();
            $table->string('username',255);
            $table->string('password',255);
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('position',255);
            $table->string('department',255);
            $table->timestamps();
            $table->tinyInteger('status');
            $table->softDeletes();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('group_name',255);
            $table->integer('sort_order');
            $table->timestamps();
            $table->tinyInteger('status');
            $table->softDeletes();
        });

        // Schema::create('menu_translations', function(Blueprint $table) {

        //     $table->engine = 'InnoDB';
        //     $table->increments('id')->unsigned();

        //     $table->boolean('status')->default(0);
        //     $table->string('title');

        //     $table->integer('menu_id')->unsigned()->index();
        //     $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

        //     $table->integer('locale_id')->unsigned()->index();
        //     $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');

        //     $table->unique(['menu_id', 'locale_id']);

        //     $table->softDeletes();
        //     $table->timestamps();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
        Schema::drop('group_user');
        // Schema::drop('menu_translations');
    }
}
