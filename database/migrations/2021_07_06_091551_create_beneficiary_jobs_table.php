<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('beneficiary_id')->unsigned();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            $table->enum('job_status', ['permanent', 'unemployment', 'daily', 'Unemployed']);
            $table->enum('job_class', ['gaza_government', 'west_bank_government', 'unrwa', 'private_job','none']);
            $table->enum('benefit_from_agency_coupon', ['0', '1'])->default('0');
            $table->enum('benefit_from_social_affairs', ['0', '1'])->default('0');
            $table->enum('is_noor_employee', ['0', '1'])->default('0');
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
        Schema::dropIfExists('beneficiary_jobs');
    }
}
