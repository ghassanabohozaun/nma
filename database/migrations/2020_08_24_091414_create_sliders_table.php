<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('details_ar')->nullable();
            $table->string('details_en')->nullable();
            $table->enum('language', ['ar', 'en', 'ar_en'])->default('en');
            $table->enum('status', ['0', '1'])->default('0');
            $table->integer('order');
            $table->enum('details_status', ['show', 'hide'])->default('hide');
            $table->enum('button_status', ['show', 'hide'])->default('hide');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
