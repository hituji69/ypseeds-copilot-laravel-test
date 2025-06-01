<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン - 管理画面</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h1 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: bold;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .error {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #3498db;
            text-decoration: none;
        }
        
        .link:hover {
            text-decoration: underline;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .checkbox-container input {
            margin-right: 0.5rem;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>管理画面ログイン</h1>
            <p>不動産サイト管理システム</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="checkbox-container">
                <input id="remember" type="checkbox" name="remember">
                <label for="remember">ログイン状態を保持する</label>
            </div>
            
            <button type="submit" class="btn">ログイン</button>
        </form>
        
        <a href="{{ route('register') }}" class="link">アカウント作成</a>
        <a href="{{ url('/') }}" class="link">サイトトップに戻る</a>
    </div>
</body>
</html>