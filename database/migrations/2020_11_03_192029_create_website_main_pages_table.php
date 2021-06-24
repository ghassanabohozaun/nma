<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteMainPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_main_pages', function (Blueprint $table) {
            $table->id();
            $table->string('counter_one_icon')->nullable();
            $table->string('counter_one_text_ar')->nullable();
            $table->string('counter_one_text_en')->nullable();

            $table->string('counter_one_number')->nullable();

            $table->string('counter_tow_icon')->nullable();
            $table->string('counter_tow_text_ar')->nullable();
            $table->string('counter_tow_text_en')->nullable();

            $table->string('counter_tow_number')->nullable();

            $table->string('counter_three_icon')->nullable();
            $table->string('counter_three_text_ar')->nullable();
            $table->string('counter_three_text_en')->nullable();
            $table->string('counter_three_number')->nullable();

            $table->string('counter_four_icon')->nullable();
            $table->string('counter_four_text_ar')->nullable();
            $table->string('counter_four_text_en')->nullable();
            $table->string('counter_four_number')->nullable();

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
        Schema::dropIfExists('website_main_pages');
    }
}
