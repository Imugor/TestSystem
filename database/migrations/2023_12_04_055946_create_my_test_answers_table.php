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
        Schema::create('my_test_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_test_id')->index();
            $table->foreign('my_test_id')->references('id')->on('my_tests');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['passed', 'failed', 'new']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_test_answers');
    }
};
