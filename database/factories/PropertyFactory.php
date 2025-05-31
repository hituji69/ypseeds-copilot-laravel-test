<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tokyoAreas = [
            // 23区
            'shinjuku', 'shibuya', 'minato', 'chiyoda', 'chuo', 'taito', 'sumida', 'koto',
            'shinagawa', 'meguro', 'ota', 'setagaya', 'nakano', 'suginami', 'toshima',
            'kita', 'arakawa', 'itabashi', 'nerima', 'adachi', 'katsushika', 'edogawa', 'bunkyo',
            // 市部
            'hachioji', 'tachikawa', 'musashino', 'mitaka', 'ome', 'fuchu', 'akishima',
            'chofu', 'machida', 'koganei', 'kodaira', 'hino', 'higashimurayama',
            'kokubunji', 'kunitachi', 'fussa', 'komae', 'higashiyamato', 'kiyose'
        ];

        $propertyTypes = ['中古マンション', '新築マンション', '中古一戸建', '新築一戸建', '土地'];
        
        $area = $this->faker->randomElement($tokyoAreas);
        
        // より区らしい住所を生成
        $suffix = in_array($area, ['hachioji', 'tachikawa', 'musashino', 'mitaka', 'ome', 'fuchu', 'akishima',
            'chofu', 'machida', 'koganei', 'kodaira', 'hino', 'higashimurayama',
            'kokubunji', 'kunitachi', 'fussa', 'komae', 'higashiyamato', 'kiyose']) ? '市' : '区';
        
        return [
            'name' => $this->faker->company() . 'ハイツ',
            'description' => $this->faker->realText(200) . "\n\n" . 
                           '築年数：' . $this->faker->numberBetween(1, 30) . '年' . "\n" .
                           '間取り：' . $this->faker->randomElement(['1R', '1K', '1DK', '1LDK', '2K', '2DK', '2LDK', '3K', '3DK', '3LDK']) . "\n" .
                           '専有面積：' . $this->faker->numberBetween(20, 100) . '㎡',
            'price' => $this->faker->numberBetween(2000, 15000), // 2000万円〜1億5千万円
            'type' => $this->faker->randomElement($propertyTypes),
            'address' => '東京都' . $area . $suffix . $this->faker->streetAddress(),
            'area' => $area,
            'nearest_station' => $this->faker->word() . '駅',
            'image_path' => null, // ダミー画像を使用するため null
            'equipment_conditions' => 
                '【設備・条件】' . "\n" .
                '・' . $this->faker->randomElement(['エアコン完備', 'オートロック', 'バルコニー', '駐車場あり']) . "\n" .
                '・' . $this->faker->randomElement(['宅配ボックス', 'ペット可', '楽器可', 'インターネット完備']) . "\n" .
                '・' . $this->faker->randomElement(['フローリング', 'システムキッチン', '追い焚き機能', '洗濯機置場']) . "\n" .
                '・' . $this->faker->randomElement(['24時間ゴミ出し可', 'セキュリティカメラ', 'TVモニターホン', '宅配ロッカー']),
            'image_1' => $this->faker->boolean(70) ? 'https://via.placeholder.com/600x400/cccccc/ffffff?text=Interior+1' : null,
            'image_2' => $this->faker->boolean(60) ? 'https://via.placeholder.com/600x400/dddddd/333333?text=Interior+2' : null,
            'image_3' => $this->faker->boolean(50) ? 'https://via.placeholder.com/600x400/eeeeee/666666?text=Interior+3' : null,
            'image_4' => $this->faker->boolean(40) ? 'https://via.placeholder.com/600x400/f0f0f0/999999?text=Interior+4' : null,
            'image_5' => $this->faker->boolean(30) ? 'https://via.placeholder.com/600x400/f5f5f5/aaaaaa?text=Interior+5' : null,
        ];
    }
}
