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
            $table->foreignId('alumne_id')->constrained('alumnes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materies')->onDelete('cascade');
            $table->timestamps(); // Añadí los timestamps para mantener las convenciones de Laravel
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumne_materia');
    }
};
