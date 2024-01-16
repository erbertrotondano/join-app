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
        Schema::create('table_tb_produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->float('valor_produto');
            $table->unsignedBigInteger('id_categoria_produto');
            $table->timestamps();

            $table->foreign('id_categoria_produto')->references('id')->on('table_tb_categoria_produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_tb_produto');
    }
};
