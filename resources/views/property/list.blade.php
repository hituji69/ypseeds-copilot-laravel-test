<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $areaNameJa }}の物件一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .property-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .property-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px;
            transition: transform 0.2s;
        }
        .property-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .property-image {
            width: 100%;
            height: 200px;
            background-color: #e0e0e0;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }
        .property-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }
        .property-price {
            font-size: 20px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .property-type {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-bottom: 8px;
        }
        .property-details {
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
        }
        .property-station {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .detail-link {
            display: inline-block;
            background: #2c3e50;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 10px;
        }
        .detail-link:hover {
            background: #34495e;
        }
        .no-properties {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $areaNameJa }}の物件一覧</h1>
        
        @if($properties->count() > 0)
            <div class="property-grid">
                @foreach($properties as $property)
                    <div class="property-card">
                        <div class="property-image">
                            @if($property->image_path)
                                <img src="{{ asset($property->image_path) }}" alt="{{ $property->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
                            @else
                                ダミー画像
                            @endif
                        </div>
                        
                        <div class="property-name">{{ $property->name }}</div>
                        
                        <div class="property-price">{{ number_format($property->price) }}万円</div>
                        
                        <span class="property-type">{{ $property->type }}</span>
                        
                        <div class="property-details">
                            📍 {{ $property->address }}
                        </div>
                        
                        <div class="property-station">
                            🚉 {{ $property->nearest_station }}
                        </div>
                        
                        <a href="/property/{{ $property->id }}" class="detail-link">詳細を見る</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-properties">
                {{ $areaNameJa }}エリアの物件は現在登録されていません。
            </div>
        @endif
    </div>
</body>
</html>