<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->text('statement')->nullable();
            $table->longText('evaluation')->nullable();
            $table->double('minimum')->nullable();
            $table->double('maximum')->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::dropIfExists('metrics');
    }
}
