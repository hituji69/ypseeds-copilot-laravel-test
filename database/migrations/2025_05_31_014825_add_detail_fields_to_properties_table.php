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
        Schema::table('properties', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name'); // 物件説明
            $table->text('equipment_conditions')->nullable()->after('image_path'); // 設備条件
            $table->string('image_1')->nullable()->after('equipment_conditions'); // 追加画像1
            $table->string('image_2')->nullable()->after('image_1'); // 追加画像2
            $table->string('image_3')->nullable()->after('image_2'); // 追加画像3
            $table->string('image_4')->nullable()->after('image_3'); // 追加画像4
            $table->string('image_5')->nullable()->after('image_4'); // 追加画像5
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'equipment_conditions',
                'image_1',
                'image_2',
                'image_3',
                'image_4',
                'image_5'
            ]);
        });
    }
};
