<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_feeds', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('site_id');
            $table->string('content')->nullable();
            $table->string('type', 30);
            $table->string('photo_url')->nullable();
            $table->string('link')->nullable();
            $table->string('link_title')->nullable();
            $table->string('link_caption')->nullable();
            $table->text('link_description')->nullable();
            $table->timestamp('created_at');

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
        Schema::drop('sites_feeds');
    }
}
