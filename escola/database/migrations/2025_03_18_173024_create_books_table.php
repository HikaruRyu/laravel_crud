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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ISDN');
            $table->string('title');
            $table->string('author');
            $table->date('date_published');
            $table->timestamps();
        }); //id ISDN title author date_published timestamps

        DB::table ('books')->insert([
            'ISDN' => '978-3-16-148410-0',
            'title' => 'The Catcher in the Rye',
            'author' => 'J.D. Salinger',
            'date_published' => '1951-07-16'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
