<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_families', function (Blueprint $table) {
            $table->id();
            $table->integer('beneficiary_id')->unsigned();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            $table->enum('family_status', ['very_week', 'week','medium','good','very_good'])->default('very_week');
            $table->integer('family_count')->default(0);
            $table->integer('family_male_count')->default(0);
            $table->integer('family_female_male_count')->default(0);
            $table->integer('family_count_less_than_18')->default(0);
            $table->integer('family_male_count_less_than_18')->default(0);
            $table->integer('family_female_count_less_than_18')->default(0);
            $table->enum('family_with_disabled', ['0', '1'])->default('0');
            $table->integer('disabled_count')->default(0);
            $table->integer('disabled_less_than_18_count')->default(0);
            $table->enum('family_with_patients', ['0', '1'])->default('0');
            $table->integer('patients_count')->default(0);

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
        Schema::dropIfExists('beneficiary_families');
    }
}
