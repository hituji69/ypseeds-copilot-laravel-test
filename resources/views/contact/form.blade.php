<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    @vite(['resources/css/contact.css'])
</head>
<body>
    <div class="container">
        <h1>お問い合わせフォーム</h1>

        {{-- 成功メッセージ表示 --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- バリデーションエラー表示 --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">名前 <span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="message">お問い合わせ内容 <span style="color: red;">*</span></label>
                <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn">送信</button>
        </form>
    </div>
</body>
</html>