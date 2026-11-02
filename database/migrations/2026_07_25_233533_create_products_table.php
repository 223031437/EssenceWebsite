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

            $table->id();

            $table->string('name');

            $table->string('image');

            $table->string('collection');

            $table->decimal('price',10,2);

            $table->integer('stock');

            $table->enum('category',['Men','Ladies','Unisex']);

            $table->string('top_notes');

            $table->string('middle_notes');

            $table->string('base_notes');

            $table->enum('longevity',['Moderate','Long','Very Long']);

            $table->text('description')->nullable();

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
