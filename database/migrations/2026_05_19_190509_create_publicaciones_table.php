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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('titulo', 500);
            $table->string('slug', 500);
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->enum('publicado', ['si', 'no'])->default('no');
            $table->timestamps();


            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
