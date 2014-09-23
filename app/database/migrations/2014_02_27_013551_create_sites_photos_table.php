<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->string('title')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('type', 30);
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->index('site_id');
        });

        Schema::create('sites_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('site_id');
            $table->string('type', 30);
            $table->string('caption')->nullable();
            $table->text('url');
            $table->timestamp('created_at');

            $table->engine = 'InnoDB';

            $table->index('site_id');
            $table->index('album_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_photos');
        Schema::drop('sites_albums');
    }
}
