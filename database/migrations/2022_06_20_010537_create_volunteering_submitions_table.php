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
        Schema::create('volunteering_submitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volunteering_id');
            $table->string('name', 64);
            $table->string('phone', 15);
            $table->string('email', 128);
            $table->text('message');
            $table->timestamps();
            $table->tinyInteger('status');
            $table->foreign('volunteering_id')->references('id')->on('volunteering');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteering_submitions');
    }
};
