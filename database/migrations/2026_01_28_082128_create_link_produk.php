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
        Schema::create('link_produk', function (Blueprint $table) {
            $table->increments('id_link_produk');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')
                ->references('id_product')
                ->on('product')
                ->cascadeOnDelete();

            $table->string('link_name', 100);
            $table->string('link_address');
            $table->string('link_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_produk');
    }
};
