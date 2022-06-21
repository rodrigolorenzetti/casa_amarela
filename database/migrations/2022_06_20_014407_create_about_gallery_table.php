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
        Schema::create('about_gallery', function (Blueprint $table) {
            $table->id();
            $table->string("alt_text", 100);
            $table->string("image", 100);
            $table->string("image_webp", 100);
            $table->timestamps();
            $table->tinyInteger("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_gallery_talbe');
    }
};
