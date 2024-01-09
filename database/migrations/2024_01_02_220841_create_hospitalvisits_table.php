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
        Schema::create('hospitalvisits', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('study_id')->nullable();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();;
            $table->date('visit_date')->nullable(); //will be selected by user
            $table->date('visit_completed_on')->nullable();
            $table->tinyInteger('status')->default(0); //pending , done, failed
            $table->tinyInteger('reason')->default(0); //for ils
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
        Schema::dropIfExists('hospitalvisits');
    }
};
