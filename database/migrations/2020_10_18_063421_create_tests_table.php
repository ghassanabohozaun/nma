<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->text('test_name');
            $table->longText('test_details');
            $table->string('test_photo');
            $table->integer('question_count')->nullable();
            $table->integer('metrics_count')->nullable();
            $table->string('added_date')->nullable();
            $table->integer('number_times_of_use')->default('0');
            $table->enum('status', ['0', '1'])->default('0');
            $table->enum('language', ['ar', 'en'])->default('en');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('Tests');
    }
}
