<?php

if (!function_exists('areaNameMap')) {
    /**
     * エリア名マッピングテーブル
     */
    function areaNameMap()
    {
        return [
            // 23区
            'chiyoda' => '千代田区',
            'chuo' => '中央区',
            'minato' => '港区',
            'shinjuku' => '新宿区',
            'bunkyo' => '文京区',
            'taito' => '台東区',
            'sumida' => '墨田区',
            'koto' => '江東区',
            'shinagawa' => '品川区',
            'meguro' => '目黒区',
            'ota' => '大田区',
            'setagaya' => '世田谷区',
            'shibuya' => '渋谷区',
            'nakano' => '中野区',
            'suginami' => '杉並区',
            'toshima' => '豊島区',
            'kita' => '北区',
            'arakawa' => '荒川区',
            'itabashi' => '板橋区',
            'nerima' => '練馬区',
            'adachi' => '足立区',
            'katsushika' => '葛飾区',
            'edogawa' => '江戸川区',
            // 市部
            'hachioji' => '八王子市',
            'tachikawa' => '立川市',
            'musashino' => '武蔵野市',
            'mitaka' => '三鷹市',
            'ome' => '青梅市',
            'fuchu' => '府中市',
            'akishima' => '昭島市',
            'chofu' => '調布市',
            'machida' => '町田市',
            'koganei' => '小金井市',
            'kodaira' => '小平市',
            'hino' => '日野市',
            'higashimurayama' => '東村山市',
            'kokubunji' => '国分寺市',
            'kunitachi' => '国立市',
            'fussa' => '福生市',
            'komae' => '狛江市',
            'higashiyamato' => '東大和市',
            'kiyose' => '清瀬市',
            'higashikurume' => '東久留米市',
            'musashimurayama' => '武蔵村山市',
            'tama' => '多摩市',
            'inagi' => '稲城市',
            'hamura' => '羽村市',
            'akiruno' => 'あきる野市',
            'nishitokyo' => '西東京市',
        ];
    }
}

if (!function_exists('japaneseAreaName')) {
    /**
     * エリア英語名から日本語名に変換
     */
    function japaneseAreaName($area)
    {
        $areaNameMapData = areaNameMap();
        return $areaNameMapData[$area] ?? ucfirst($area);
    }
}