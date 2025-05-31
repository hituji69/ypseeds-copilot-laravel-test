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
            'price' => $this->faker->numberBetween(2000, 15000), // 2000万円〜1億5千万円
            'type' => $this->faker->randomElement($propertyTypes),
            'address' => '東京都' . $area . $suffix . $this->faker->streetAddress(),
            'area' => $area,
            'nearest_station' => $this->faker->word() . '駅',
            'image_path' => null, // ダミー画像を使用するため null
        ];
    }
}
