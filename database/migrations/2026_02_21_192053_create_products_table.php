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
            // title (varchar(255)) - dec (text) - price (decimal(8,2)) - image (varchar(255))

            $table->foreignId("category_id")->nullable()->constrained();
            $table->string("title");
            $table->text("dec");
            $table->decimal("price",8,2);
            $table->string("image")->nullable();
            $table->softDeletes();
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
