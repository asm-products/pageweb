<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersThrottle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('throttle', function ($table) {
            /** @var $table Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ip_address')->nullable();
            $table->integer('attempts')->default(0);
            $table->boolean('suspended')->default(0);
            $table->boolean('banned')->default(0);
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('banned_at')->nullable();

            // We'll need to ensure that MySQL uses the InnoDB engine to
            // support the indexes, other engines aren't affected.
            $table->engine = 'InnoDB';
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('throttle');
    }
}
