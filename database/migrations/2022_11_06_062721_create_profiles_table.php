<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('mail')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('occupation')->nullable();
            $table->longText('about_you')->nullable();
            $table->string('address')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};