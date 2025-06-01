@extends('layouts.dashboard')

@section('title', 'ダッシュボード')
@section('page-title', 'ダッシュボード')

@section('content')
<div class="content-card">
    <h2 style="margin-bottom: 1.5rem; color: #2c3e50;">管理画面へようこそ</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: #ecf0f1; padding: 1.5rem; border-radius: 8px; text-align: center;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏠</div>
            <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">物件管理</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">不動産物件の追加・編集・削除</p>
            <a href="{{ route('dashboard.properties') }}" style="display: inline-block; padding: 0.5rem 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">管理画面へ</a>
        </div>
        
        <div style="background: #ecf0f1; padding: 1.5rem; border-radius: 8px; text-align: center;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">📧</div>
            <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">問い合わせ管理</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">顧客からの問い合わせ対応</p>
            <a href="{{ route('dashboard.inquiries') }}" style="display: inline-block; padding: 0.5rem 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">管理画面へ</a>
        </div>
        
        <div style="background: #ecf0f1; padding: 1.5rem; border-radius: 8px; text-align: center;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">👥</div>
            <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">ユーザ管理</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">管理者アカウントの管理</p>
            <a href="{{ route('dashboard.users') }}" style="display: inline-block; padding: 0.5rem 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">管理画面へ</a>
        </div>
        
        <div style="background: #ecf0f1; padding: 1.5rem; border-radius: 8px; text-align: center;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">⚙️</div>
            <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">システム設定</h3>
            <p style="color: #7f8c8d; margin-bottom: 1rem;">サイト設定・環境設定</p>
            <a href="{{ route('dashboard.settings') }}" style="display: inline-block; padding: 0.5rem 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">設定画面へ</a>
        </div>
    </div>
    
    <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #3498db;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">最近の活動</h3>
        <p style="color: #7f8c8d;">現在、システムの基本機能が利用可能です。各メニューから管理機能にアクセスできます。</p>
    </div>
</div>
@endsection