<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_options', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id');
            $table->string('option', 100);
            $table->text('value');

            $table->engine = 'InnoDB';

            $table->index('site_id');
            $table->index('option');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_options');
    }
}
