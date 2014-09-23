<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_posts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('site_id');
            $table->string('title');
            $table->text('content');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->engine = 'InnoDB';

            $table->index('site_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_posts');
    }
}
