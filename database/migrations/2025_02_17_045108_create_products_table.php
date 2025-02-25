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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // автоинкрементный ID
            $table->string('name'); // название товара
            $table->text('description')->nullable(); // описание товара
            $table->string('pathname'); // путь
            $table->string('code')->unique(); // код товара
            $table->decimal('sale_price', 10, 2); // цена
            $table->integer('quantity')->default(0); // количество
            $table->text('images')->nullable(); // изображения
            $table->json('attributes')->nullable();
            $table->string('meta_href')->nullable(); // Добавляем новое поле meta_href
            $table->string('slug')->nullable()->unique();
            $table->timestamps(); // временные метки created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
