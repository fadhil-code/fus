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
        Schema::create('lecturerss', function (Blueprint $table) {
            $table->id();
            $table->integer('did');
            $table->string('lecname');
            $table->string('leclakab');
            $table->string('photo');
            $table->integer('adduid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturerss');
    }
};
