<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('subdomain');
            $table->string('title')->nullable();
            $table->string('email')->nullable(); // Contact email
            $table->string('phone')->nullable(); // Contact phone
            $table->string('address')->nullable(); // Contact Address
            $table->text('about')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(0);
            $table->string('token')->nullable();
            $table->unsignedInteger('theme_id')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->unique('token');
            $table->index('theme_id');
        });

        Schema::create('users_sites', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('site_id');

            $table->engine = 'InnoDB';

            // Composite primary key
            $table->primary(array('user_id', 'site_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_sites');
        Schema::drop('sites');
    }
}
