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
            $table->bigInteger('admin_id')->nullable();
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->string('image')->nullable();
            $table->string('img_path')->nullable();
            $table->boolean('has_addon_cat')->comment("'0' = 'No', '1' = 'Yes'")->nullable();
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
        Schema::dropIfExists('products');
    }
};
