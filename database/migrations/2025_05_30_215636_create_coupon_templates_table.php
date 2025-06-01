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
        Schema::create('coupon_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('coupon_type_id');
            $table->decimal('value', 8, 2)->nullable();
            $table->boolean('is_global')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('coupon_type_id')->references('id')->on('coupon_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_templates');
    }
};
