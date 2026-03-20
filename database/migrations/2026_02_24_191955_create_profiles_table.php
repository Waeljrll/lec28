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
        Schema::create('profiles', function (Blueprint $table) {
            // user_id - phone - address
            $table->id();

            // $table->unsignedBigInteger("user_id")->unique();
            // $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId("user_id")->constrained("users");

            $table->string("phone")->nullable();
            $table->text("address")->nullable();
            $table->text("bio")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
