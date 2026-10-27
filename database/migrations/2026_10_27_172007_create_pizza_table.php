<?php

use App\Models\Kategoria;
use App\Models\Pizza;
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
        $connection = env('DB_CONNECTION2');
        Schema::connection($connection)->create('kategoria', function (Blueprint $table) {
            $table->string('nev')->primary();
            $table->integer('ar');
        });    
    
        Schema::connection($connection)->create('pizza', function (Blueprint $table) {
            $table->string('nev')->primary();
            $table->foreignIdFor(Kategoria::class, 'kategorianev')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('vegetarianus');
        });
        
        Schema::connection($connection)->create('rendeles', function (Blueprint $table) {
            $table->foreignIdFor(Pizza::class, 'pizzanev')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('darab');
            $table->date('felvetel');
            $table->date('kiszallitas');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoria');
        Schema::dropIfExists('pizza');
        Schema::dropIfExists('rendeles');
    }
};
