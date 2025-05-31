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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 物件名
            $table->decimal('price', 10, 2); // 価格（万円）
            $table->enum('type', ['中古マンション', '新築マンション', '中古一戸建', '新築一戸建', '土地']); // 種別
            $table->text('address'); // 所在地
            $table->string('area'); // 区・市部
            $table->string('nearest_station'); // 最寄り駅
            $table->string('image_path')->nullable(); // サムネイル画像パス
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
