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
        Schema::create('studentstudy', function (Blueprint $table) {
            $table->id();
            $table->integer('stid');
            $table->integer('spid');
            $table->integer('chid');
            $table->date('mobashara');
            $table->integer('adduid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentstudy');
    }
};
