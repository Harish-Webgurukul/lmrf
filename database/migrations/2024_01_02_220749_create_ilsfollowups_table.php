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
        Schema::create('ilsfollowups', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('study_id')->nullable();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_ils_active')->default(true);
            $table->tinyInteger('status')->default(0);  //pending, done failed
            $table->string('reported_from')->nullable();  //anc or biweekly
            $table->date('reported_on')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('ilsfollowups');
    }
};
