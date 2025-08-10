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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('email2')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkdin')->nullable();
            $table->text("footer_text")->nullable();
            $table->string('notice1')->nullable();
            $table->string('notice2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
