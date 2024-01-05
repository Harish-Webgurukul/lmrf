<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('study_id')->nullable();
            $table->foreignId('facility_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('proxy_contact1')->nullable();
            $table->string('proxy_contact2')->nullable();
            $table->string('facility')->nullable();
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->boolean('biweeklycall_status')->default(false);
            $table->date('enrollment_date')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('patients');
    }
};
