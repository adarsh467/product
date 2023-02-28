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
        Schema::create('addon_cat_2', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('addon_cat_1_id')->nullable();
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->boolean('status')->comment("'0' = 'Draft', '1' = 'Published'")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addon_cat2s');
    }
};
