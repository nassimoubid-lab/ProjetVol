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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // tu peux garder "name"
            $table->foreignId('airport_depart_id')->constrained('airports');
            $table->foreignId('airport_arrival_id')->constrained('airports');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->integer('seats');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
