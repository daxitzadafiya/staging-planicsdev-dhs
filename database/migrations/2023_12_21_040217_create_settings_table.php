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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('header_email')->nullable();
            $table->string('header_button_text')->nullable();
            $table->string('about_us_title')->nullable();
            $table->longText('about_us_description')->nullable();
            $table->string('about_us_image')->nullable();
            $table->longText('about_us_key_partners')->nullable();
            $table->string('contact_us_title')->nullable();
            $table->longText('contact_us_description')->nullable();
            $table->string('contact_us_image')->nullable();
            $table->string('clients_partners_title')->nullable();
            $table->longText('clients_partners_description')->nullable();
            $table->string('point_of_differences_title')->nullable();
            $table->longText('point_of_differences_description')->nullable();
            $table->string('services_title')->nullable();
            $table->longText('services_description')->nullable();
            $table->string('core_values_title')->nullable();
            $table->longText('core_values_description')->nullable();
            $table->string('technologies_title')->nullable();
            $table->longText('technologies_description')->nullable();
            $table->string('portfolio_title')->nullable();
            $table->longText('portfolio_description')->nullable();
            $table->string('achievement_title')->nullable();
            $table->longText('achievement_description')->nullable();
            $table->string('achievement_logo')->nullable();
            $table->string('contact_news_letter_title')->nullable();
            $table->string('contact_news_letter_button_link')->nullable();
            $table->string('contact_news_letter_button_text')->nullable();
            $table->string('footer_logo')->nullable();
            $table->longText('footer_description')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_contact')->nullable();
            $table->string('map_link')->nullable();
            $table->longText('footer_address_one')->nullable();
            $table->longText('footer_address_two')->nullable();
            $table->string('linked_in_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
