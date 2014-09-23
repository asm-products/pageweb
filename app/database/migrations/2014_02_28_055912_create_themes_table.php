<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 300)->nullable();
            $table->integer('category_id');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('themes_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('themes_categories');
        Schema::drop('themes');
    }
}
