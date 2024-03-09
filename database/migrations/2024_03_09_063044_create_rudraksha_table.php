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
        Schema::create('rudraksha', function (Blueprint $table) {
            $table->id();
            $table->string('report_number')->unique();
            $table->smallInteger('type');
            $table->string('weight');
            $table->string('dimension');
            $table->string('color');
            $table->string('shape');
            $table->string('natural_face');
            $table->string('artificial_face');
            $table->string('test');
            $table->string('origin');
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
        Schema::dropIfExists('rudraksha');
    }
};
