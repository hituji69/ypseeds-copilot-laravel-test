@extends('layouts.dashboard')

@section('title', '問い合わせ管理')
@section('page-title', '問い合わせ管理')

@section('content')
<div class="content-card">
    <h2 style="margin-bottom: 1.5rem; color: #2c3e50;">問い合わせ管理</h2>
    
    <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">問い合わせ一覧</h3>
        <p style="color: #7f8c8d;">ここに顧客からの問い合わせ一覧が表示されます。将来的に以下の機能を実装予定：</p>
        <ul style="color: #7f8c8d; margin-top: 1rem; padding-left: 2rem;">
            <li>問い合わせの一覧表示</li>
            <li>問い合わせ詳細の確認</li>
            <li>返信状況の管理</li>
            <li>問い合わせのステータス管理</li>
            <li>顧客情報の確認</li>
        </ul>
    </div>
</div>
@endsection