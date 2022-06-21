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
        Schema::create('site_configurations', function (Blueprint $table) {
            $table->id();
            $table->text('donation_plans_text');
            $table->text('partner_text');
            $table->string('gold_seal', 150);
            $table->string('silver_seal', 150);
            $table->string('tan_seal', 150);
            $table->text('about_us_text');
            $table->string('about_us_video_url', 100);
            $table->string('phone', 20);
            $table->string('email', 40);
            $table->string('facebook', 100);
            $table->string('instagram', 100);
            $table->string('whatsapp', 100);
            $table->string('address', 100);
            $table->string('donation_link', 100);
            $table->text('cookies_policy');
            $table->timestamps();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
