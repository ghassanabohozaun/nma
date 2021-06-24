<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->enum('language', ['ar', 'en', 'ar_en'])->default('en');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('summary_ar')->nullable();
            $table->text('summary_en')->nullable();
            $table->longText('details_ar')->nullable();
            $table->longText('details_en')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            // 0 not treatment area , 1 yes it is treatment area
            $table->enum('is_treatment_area', ['0', '1'])->default('0');
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
        Schema::dropIfExists('services');
    }
}
