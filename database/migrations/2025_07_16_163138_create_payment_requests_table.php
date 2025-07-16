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
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->references('id')->on("users")->cascadeOnDelete();
            $table->string("expenditure_category_id", 100);
            $table->string("shaba");
            $table->unsignedInteger("amount");
            $table->string("file")->nullable();
            $table->text("description");
            $table->timestamps();

            $table->foreign(["expenditure_category_id"])->references('id')->on('expenditure_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_requests');
    }
};
