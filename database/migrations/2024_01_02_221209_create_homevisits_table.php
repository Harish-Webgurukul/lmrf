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
        Schema::create('homevisits', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('study_id')->nullable();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();;
            $table->date('visit_date')->nullable(); //current date if ils reported
            $table->date('visit_completed_on')->nullable();
            $table->tinyInteger('status')->default(0); //pending, done, fail
            $table->tinyInteger('reason')->default(0); //1 for ils, 2 no contact
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
        Schema::dropIfExists('homevisits');
    }
};
