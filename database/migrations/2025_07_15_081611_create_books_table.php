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
            $table->string('name');
            $table->string('picture')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('author')->nullable();
            $table->integer('total')->unsigned()->nullable();
            $table->integer('price')->nullable();
            $table->mediumText('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('publisher')->nullable();
            $table->string('language')->nullable();
            $table->string('totalpage')->nullable();
            $table->integer('discount')->unsigned()->nullable();
            $table->timestamps();
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
