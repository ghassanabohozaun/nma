<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->enum('language', ['ar', 'en', 'ar_en'])->default('en');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('details_ar')->nullable();
            $table->longText('details_en')->nullable();
            $table->string('add_date')->nullable();
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('services');
    }
}
