<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_requests', function (Blueprint $table) {
            $table->id();
            $table->string('communication_sender');
            $table->string('communication_email');
            $table->string('communication_mobile');
            $table->string('communication_title');
            $table->longText('communication_details')->nullable();
            $table->enum('communication_status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('communication_requests');
    }
}
