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
        Schema::create('gems', function (Blueprint $table) {
            $table->id();
            $table->string('report_number')->unique();
            $table->smallInteger('type')->default(1);
            $table->string('name');
            $table->string('weight');
            $table->string('dimension');
            $table->string('color');
            $table->string('shape_cut');
            $table->string('optic_char');
            $table->string('refractive_index');
            $table->string('specific_gravity');
            $table->string('microscope_view');
            $table->string('species');
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
        Schema::dropIfExists('gems');
    }
};
