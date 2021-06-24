<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_opinions', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->enum('language', ['ar', 'en', 'ar_en'])->default('en');
            $table->longText('opinion_ar')->nullable();
            $table->longText('opinion_en')->nullable();
            $table->string('client_name_ar')->nullable();
            $table->string('client_name_en')->nullable();
            $table->string('client_age')->nullable();
            $table->string('country')->nullable();
            $table->enum('gender', ['male', 'female','others']);
            $table->string('job_title_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->integer('rating')->default('0');
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
        Schema::dropIfExists('client_opinions');
    }
}
