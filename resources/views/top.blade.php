<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>東京不動産物件検索</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1rem;
            color: #7f8c8d;
        }
        
        .area-section {
            background: white;
            margin-bottom: 30px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .area-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #3498db;
        }
        
        .area-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .area-link {
            display: block;
            padding: 15px 20px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
        }
        
        .area-link:hover {
            background: linear-gradient(135deg, #2980b9, #1f639a);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .city-section .area-link {
            background: linear-gradient(135deg, #27ae60, #229954);
        }
        
        .city-section .area-link:hover {
            background: linear-gradient(135deg, #229954, #1e7e4a);
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .area-title {
                font-size: 1.5rem;
            }
            
            .area-links {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 10px;
            }
            
            .area-link {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>東京不動産物件検索</h1>
            <p>お探しのエリアを選択してください</p>
        </header>

        <main>
            <!-- 東京23区 -->
            <section class="area-section ward-section">
                <h2 class="area-title">東京23区</h2>
                <div class="area-links">
                    <a href="/list/chiyoda" class="area-link">千代田区</a>
                    <a href="/list/chuo" class="area-link">中央区</a>
                    <a href="/list/minato" class="area-link">港区</a>
                    <a href="/list/shinjuku" class="area-link">新宿区</a>
                    <a href="/list/bunkyo" class="area-link">文京区</a>
                    <a href="/list/taito" class="area-link">台東区</a>
                    <a href="/list/sumida" class="area-link">墨田区</a>
                    <a href="/list/koto" class="area-link">江東区</a>
                    <a href="/list/shinagawa" class="area-link">品川区</a>
                    <a href="/list/meguro" class="area-link">目黒区</a>
                    <a href="/list/ota" class="area-link">大田区</a>
                    <a href="/list/setagaya" class="area-link">世田谷区</a>
                    <a href="/list/shibuya" class="area-link">渋谷区</a>
                    <a href="/list/nakano" class="area-link">中野区</a>
                    <a href="/list/suginami" class="area-link">杉並区</a>
                    <a href="/list/toshima" class="area-link">豊島区</a>
                    <a href="/list/kita" class="area-link">北区</a>
                    <a href="/list/arakawa" class="area-link">荒川区</a>
                    <a href="/list/itabashi" class="area-link">板橋区</a>
                    <a href="/list/nerima" class="area-link">練馬区</a>
                    <a href="/list/adachi" class="area-link">足立区</a>
                    <a href="/list/katsushika" class="area-link">葛飾区</a>
                    <a href="/list/edogawa" class="area-link">江戸川区</a>
                </div>
            </section>

            <!-- 市部 -->
            <section class="area-section city-section">
                <h2 class="area-title">市部</h2>
                <div class="area-links">
                    <a href="/list/hachioji" class="area-link">八王子市</a>
                    <a href="/list/tachikawa" class="area-link">立川市</a>
                    <a href="/list/musashino" class="area-link">武蔵野市</a>
                    <a href="/list/mitaka" class="area-link">三鷹市</a>
                    <a href="/list/ome" class="area-link">青梅市</a>
                    <a href="/list/fuchu" class="area-link">府中市</a>
                    <a href="/list/akishima" class="area-link">昭島市</a>
                    <a href="/list/chofu" class="area-link">調布市</a>
                    <a href="/list/machida" class="area-link">町田市</a>
                    <a href="/list/koganei" class="area-link">小金井市</a>
                    <a href="/list/kodaira" class="area-link">小平市</a>
                    <a href="/list/hino" class="area-link">日野市</a>
                    <a href="/list/higashimurayama" class="area-link">東村山市</a>
                    <a href="/list/kokubunji" class="area-link">国分寺市</a>
                    <a href="/list/kunitachi" class="area-link">国立市</a>
                    <a href="/list/fussa" class="area-link">福生市</a>
                    <a href="/list/komae" class="area-link">狛江市</a>
                    <a href="/list/higashiyamato" class="area-link">東大和市</a>
                    <a href="/list/kiyose" class="area-link">清瀬市</a>
                    <a href="/list/higashikurume" class="area-link">東久留米市</a>
                    <a href="/list/musashimurayama" class="area-link">武蔵村山市</a>
                    <a href="/list/tama" class="area-link">多摩市</a>
                    <a href="/list/inagi" class="area-link">稲城市</a>
                    <a href="/list/hamura" class="area-link">羽村市</a>
                    <a href="/list/akiruno" class="area-link">あきる野市</a>
                    <a href="/list/nishitokyo" class="area-link">西東京市</a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>