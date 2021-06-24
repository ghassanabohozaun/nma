<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
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
            $table->string('site_name_ar');
            $table->string('site_name_en');
            $table->string('site_email')->nullable();
            $table->string('site_gmail')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('site_twitter')->nullable();
            $table->string('site_youtube')->nullable();
            $table->string('site_instagram')->nullable();
            $table->string('site_linkedin')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_mobile')->nullable();
            $table->enum('site_status',['0','1'])->default('0');
            $table->enum('site_language',['ar','en'])->default('en');
            $table->longText('site_description_ar')->nullable();
            $table->longText('site_description_en')->nullable();
            $table->longText('site_keywords_ar')->nullable();
            $table->longText('site_keywords_en')->nullable();
            $table->longText('site_address_ar')->nullable();
            $table->longText('site_address_en')->nullable();
            $table->longText('site_icon')->nullable();
            $table->longText('site_logo')->nullable();
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
}
