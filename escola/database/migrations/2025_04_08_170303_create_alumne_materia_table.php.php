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
        Schema::create('alumne_materia', function (Blueprint $table) {
            $table->id();
            $table->foreingId('alumne_id')->constrained('alumnes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materies')->onDelete('cascade');
        })
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
