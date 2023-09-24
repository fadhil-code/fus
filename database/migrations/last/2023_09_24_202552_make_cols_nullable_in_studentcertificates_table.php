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
        Schema::table('studentcertificates', function (Blueprint $table) {
            $table->string('taeed')->nullable()->change();
            $table->date('taeeddate')->nullable()->change();
            $table->string('av')->nullable()->change();
            $table->string('qu')->nullable()->change();
            $table->string('karar')->nullable()->change();
            $table->date('karardate')->nullable()->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studentcertificates', function (Blueprint $table) {
            //
        });
    }
};
