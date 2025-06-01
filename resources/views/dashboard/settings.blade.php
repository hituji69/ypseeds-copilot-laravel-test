@extends('layouts.dashboard')

@section('title', 'システム設定')
@section('page-title', 'システム設定')

@section('content')
<div class="content-card">
    <h2 style="margin-bottom: 1.5rem; color: #2c3e50;">システム設定</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
            <h3 style="color: #2c3e50; margin-bottom: 1rem;">サイト設定</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">サイトの基本設定を管理します：</p>
            <ul style="color: #7f8c8d; padding-left: 2rem;">
                <li>サイト名の設定</li>
                <li>メタ情報の管理</li>
                <li>コンタクト情報</li>
            </ul>
        </div>
        
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
            <h3 style="color: #2c3e50; margin-bottom: 1rem;">メール設定</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">メール機能の設定を管理します：</p>
            <ul style="color: #7f8c8d; padding-left: 2rem;">
                <li>SMTP設定</li>
                <li>送信元アドレス</li>
                <li>メールテンプレート</li>
            </ul>
        </div>
        
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
            <h3 style="color: #2c3e50; margin-bottom: 1rem;">セキュリティ設定</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">セキュリティ関連の設定：</p>
            <ul style="color: #7f8c8d; padding-left: 2rem;">
                <li>パスワードポリシー</li>
                <li>ログイン試行制限</li>
                <li>セッション管理</li>
            </ul>
        </div>
        
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
            <h3 style="color: #2c3e50; margin-bottom: 1rem;">バックアップ</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">データベースとファイルのバックアップ：</p>
            <ul style="color: #7f8c8d; padding-left: 2rem;">
                <li>自動バックアップ設定</li>
                <li>手動バックアップ実行</li>
                <li>復元機能</li>
            </ul>
        </div>
    </div>
</div>
@endsection