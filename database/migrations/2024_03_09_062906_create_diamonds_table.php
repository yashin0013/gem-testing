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
        Schema::create('diamonds', function (Blueprint $table) {
            $table->id();
            $table->string('report_number')->unique();
            $table->smallInteger('type');
            $table->string('description');
            $table->string('shape_cut');
            $table->string('dimension');
            $table->string('weight');
            $table->string('clarity_grade');
            $table->string('color_grade');
            $table->string('cut_prop');
            $table->string('finish');
            $table->string('fluoresc');
            $table->string('image');
            $table->text('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diamonds');
    }
};
