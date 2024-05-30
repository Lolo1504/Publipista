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
        Schema::dropIfExists('Pistas');
        Schema::create('Pistas', function(Blueprint $table) 
         {
            $table->id()->autoIncrement();
            $table->string('Tipo');
            $table->string('Ubicacion');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pistas');
    }
};
