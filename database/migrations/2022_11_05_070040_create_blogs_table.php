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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('tag');
            $table->string('main_image');
            $table->string('title', 70);
            $table->longText('introduction', 300);
            $table->longText('description', 2000);
            $table->string('secondary_image')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamps();

            $table->foreign('owner')->references('username')->on('users')->cascadeOnDelete();
            $table->foreign('tag')->references('name')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};