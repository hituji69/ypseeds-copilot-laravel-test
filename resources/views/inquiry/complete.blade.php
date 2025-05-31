<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了 - {{ $property->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
        }
        .success-icon {
            font-size: 64px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .success-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        .property-info {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: left;
        }
        .property-name {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .property-price {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }
        .property-type {
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
            margin: 0 5px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .note {
            background: #e7f3ff;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1 class="page-title">送信完了しました</h1>
        <p class="success-message">
            お問い合わせありがとうございます。<br>
            内容を確認次第、ご連絡いたします。
        </p>

        <!-- 物件情報表示 -->
        <div class="property-info">
            <div class="property-name">{{ $property->name }}</div>
            <div class="property-price">{{ number_format($property->price) }}万円</div>
            <div class="property-type">{{ $property->type }}</div>
            <div style="margin-top: 10px; color: #666;">
                📍 {{ $property->address }}
            </div>
        </div>

        <div class="note">
            <strong>※ ご注意</strong><br>
            迷惑メール対策をされている場合は、お返事メールが届かない場合があります。<br>
            数日経ってもご連絡がない場合は、お電話にてお問い合わせください。
        </div>

        <div>
            <a href="/property/{{ $property->id }}" class="btn btn-secondary">物件詳細に戻る</a>
            <a href="/list/{{ $property->area }}" class="btn btn-primary">物件一覧に戻る</a>
        </div>
    </div>
</body>
</html>