<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            if (!Schema::hasColumn('product_variants', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'brand_id')) {
                $table->unsignedBigInteger('brand_id')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'product_slug')) {
                $table->string('product_slug')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'video')) {
                $table->string('video', 1000)->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'promotional_video')) {
                $table->string('promotional_video', 1000)->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'status')) {
                $table->enum('status', ['show', 'hide'])->default('show');
            }

            if (!Schema::hasColumn('product_variants', 'stock')) {
                $table->string('stock')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'low_stock_alert')) {
                $table->string('low_stock_alert')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'length')) {
                $table->decimal('length', 10, 2)->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'width')) {
                $table->decimal('width', 10, 2)->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'height')) {
                $table->decimal('height', 10, 2)->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'unit_id')) {
                $table->unsignedBigInteger('unit_id')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'attribute_id')) {
                $table->unsignedBigInteger('attribute_id')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'product_min_order')) {
                $table->integer('product_min_order')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'product_max_order')) {
                $table->integer('product_max_order')->nullable();
            }

            if (!Schema::hasColumn('product_variants', 'product_variant_id')) {
                $table->unsignedBigInteger('product_variant_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            //
        });
    }
};
