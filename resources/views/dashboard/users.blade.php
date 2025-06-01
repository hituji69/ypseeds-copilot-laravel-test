@extends('layouts.dashboard')

@section('title', 'ユーザ管理')
@section('page-title', 'ユーザ管理')

@section('content')
<div class="content-card">
    <h2 style="margin-bottom: 1.5rem; color: #2c3e50;">ユーザ管理</h2>
    
    <div style="margin-bottom: 2rem;">
        <button style="padding: 0.75rem 1.5rem; background: #27ae60; color: white; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer;">
            + 新規ユーザ追加
        </button>
    </div>
    
    <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">管理者一覧</h3>
        <p style="color: #7f8c8d;">ここに管理者アカウント一覧が表示されます。将来的に以下の機能を実装予定：</p>
        <ul style="color: #7f8c8d; margin-top: 1rem; padding-left: 2rem;">
            <li>管理者アカウントの一覧表示</li>
            <li>新規管理者の追加</li>
            <li>管理者情報の編集</li>
            <li>管理者権限の管理</li>
            <li>アカウントの有効/無効切り替え</li>
        </ul>
    </div>
</div>
@endsection