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
        Schema::create('jewellery', function (Blueprint $table) {
            $table->id();
            $table->string('report_number')->unique();
            $table->string('name');
            $table->smallInteger('type')->default(3);
            $table->smallInteger('gross_wt');
            $table->smallInteger('gold_wt');
            $table->smallInteger('dia_wt');
            $table->string('shape_cut');
            $table->string('clarity');
            $table->string('color');
            $table->string('finish');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewellery');
    }
};
