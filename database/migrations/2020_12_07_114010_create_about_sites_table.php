<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_sites', function (Blueprint $table) {
            $table->id();
            $table->longText('whom_ar');
            $table->longText('whom_en');
            $table->longText('contact_us_ar');
            $table->longText('contact_us_en');
            $table->string('brochure')->nullable();
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
        Schema::dropIfExists('about_sites');
    }
}
