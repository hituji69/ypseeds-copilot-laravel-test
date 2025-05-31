<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->name }} - 物件詳細</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            line-height: 1.6;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .header {
            margin-bottom: 30px;
        }
        .property-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .property-price {
            font-size: 24px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .property-type {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .main-image {
            width: 100%;
            height: 400px;
            background-color: #e0e0e0;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 18px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        .property-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .description {
            background: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            color: #333;
            white-space: pre-line;
        }
        .equipment-conditions {
            background: #f0f8ff;
            padding: 20px;
            border: 1px solid #b3d9ff;
            border-radius: 8px;
            color: #333;
            white-space: pre-line;
        }
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .gallery-image {
            width: 100%;
            height: 150px;
            background-color: #e0e0e0;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            text-align: center;
            font-size: 14px;
        }
        .buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background: #e74c3c;
            color: white;
        }
        .btn-primary:hover {
            background: #c0392b;
        }
        .btn-secondary {
            background: #95a5a6;
            color: white;
        }
        .btn-secondary:hover {
            background: #7f8c8d;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .property-title {
                font-size: 24px;
            }
            .property-price {
                font-size: 20px;
            }
            .main-image {
                height: 250px;
            }
            .info-row {
                flex-direction: column;
            }
            .info-label {
                width: auto;
                margin-bottom: 5px;
            }
            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="property-title">{{ $property->name }}</h1>
            <div class="property-price">{{ number_format($property->price) }}万円</div>
            <span class="property-type">{{ $property->type }}</span>
        </div>

        <!-- メイン画像 -->
        <div class="main-image">
            @if($property->image_path)
                <img src="{{ asset($property->image_path) }}" alt="{{ $property->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
            @else
                メイン画像（準備中）
            @endif
        </div>

        <!-- 基本情報 -->
        <div class="section">
            <h2 class="section-title">基本情報</h2>
            <div class="property-info">
                <div class="info-row">
                    <div class="info-label">所在地:</div>
                    <div class="info-value">{{ $property->address }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">最寄り駅:</div>
                    <div class="info-value">{{ $property->nearest_station }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">種別:</div>
                    <div class="info-value">{{ $property->type }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">価格:</div>
                    <div class="info-value">{{ number_format($property->price) }}万円</div>
                </div>
            </div>
        </div>

        <!-- 物件説明 -->
        @if($property->description)
        <div class="section">
            <h2 class="section-title">物件説明</h2>
            <div class="description">{{ $property->description }}</div>
        </div>
        @endif

        <!-- 設備条件 -->
        @if($property->equipment_conditions)
        <div class="section">
            <h2 class="section-title">設備・条件</h2>
            <div class="equipment-conditions">{{ $property->equipment_conditions }}</div>
        </div>
        @endif

        <!-- 画像一覧 -->
        @php
            $additionalImages = collect([
                $property->image_1,
                $property->image_2,
                $property->image_3,
                $property->image_4,
                $property->image_5
            ])->filter();
        @endphp

        @if($additionalImages->count() > 0)
        <div class="section">
            <h2 class="section-title">追加画像</h2>
            <div class="image-gallery">
                @foreach($additionalImages as $image)
                    <div class="gallery-image">
                        @if($image)
                            <img src="{{ $image }}" alt="物件画像" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        @else
                            画像なし
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- ボタン -->
        <div class="buttons">
            <a href="/inquiry/{{ $property->id }}" class="btn btn-primary">物件問い合わせ</a>
            <a href="/list/{{ $property->area }}" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </div>
</body>
</html>