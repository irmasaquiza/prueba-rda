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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_id')->constrained('libros')->onDelete('restrict');
            $table->foreignId('lector_id')->constrained('lectors')->onDelete('restrict');
            $table->date('fecha_prestamo');
            $table->date('fecha_limite_devolucion');
            $table->date('fecha_devolucion_real')->nullable();
            $table->enum('estado', ['prestado', 'devuelto', 'atrasado'])->default('prestado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
