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
            $table->date('in_person_from_visit2')->nullable();
            $table->date('in_person_to_visit2')->nullable();
            $table->tinyInteger('in_person_to_status2')->default(0);
            $table->date('in_person_visit2_completed')->nullable();
            $table->string('in_person_note2')->nullable();
            $table->date('in_person_from_visit3')->nullable();
            $table->date('in_person_to_visit3')->nullable();
            $table->tinyInteger('in_person_to_status3')->default(0);
            $table->date('in_person_visit3_completed')->nullable();
            $table->string('in_person_note3')->nullable();
            $table->date('in_person_from_visit4')->nullable();
            $table->date('in_person_to_visit4')->nullable();
            $table->tinyInteger('in_person_to_status4')->default(0);
            $table->date('in_person_visit4_completed')->nullable();
            $table->string('in_person_note4')->nullable();
            $table->date('in_person_from_visit5')->nullable();
            $table->date('in_person_to_visit5')->nullable();
            $table->tinyInteger('in_person_to_status5')->default(0);
            $table->date('in_person_visit5_completed')->nullable();
            $table->string('in_person_note5')->nullable();
            $table->date('in_person_from_visit_final')->nullable();
            $table->date('in_person_to_visit_final')->nullable();
            $table->tinyInteger('in_person_to_statusfinal')->default(0);
            $table->date('in_person_visitfinal_completed')->nullable();
            $table->string('in_person_notefinal')->nullable();
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
