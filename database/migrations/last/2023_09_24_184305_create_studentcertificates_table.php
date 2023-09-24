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
        Schema::create('studentcertificates', function (Blueprint $table) {
            $table->id();
            $table->integer('stid');
            $table->string('title');
            $table->integer('inside');
            $table->string('taeed');
            $table->date('taeeddate');
            $table->string('av');
            $table->string('qu');
            $table->string('karar');
            $table->date('karardate');
            $table->integer('adduid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentcertificates');
    }
};
