<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sims_coursegrade', function (Blueprint $table) {
            $table->id();
            $table->integer("course_id");
            $table->integer("student_id");
            $table->integer("activ");
            $table->integer("grade_item");
            $table->integer("grade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims_coursegrade');
    }
};
