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
        Schema::create('ancvisits', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('study_id')->nullable();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('visit_number')->default(0);
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->date('visit_completed_on')->nullable();
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
        Schema::dropIfExists('ancvisits');
    }
};
