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
        Schema::create('productos', function (Blueprint $table) {
            $table->string('ucc', 12)->primary(); // Utilizamos el UCC como clave primaria
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('cantidad_disponible')->default(0);
            $table->decimal('precio_unitario', 10, 2);
            $table->unsignedBigInteger('proveedor_id');
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
