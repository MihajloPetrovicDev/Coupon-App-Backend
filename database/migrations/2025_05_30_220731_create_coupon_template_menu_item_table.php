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
        Schema::create('coupon_template_menu_item', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_template_id');
            $table->unsignedBigInteger('menu_item_id');

            $table->primary(['coupon_template_id', 'menu_item_id']);

            $table->foreign('coupon_template_id')->references('id')->on('coupon_templates')->onDelete('cascade');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_template_menu_item');
    }
};
