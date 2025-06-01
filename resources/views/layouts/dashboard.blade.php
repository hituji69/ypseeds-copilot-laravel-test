<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '管理画面') - 不動産サイト管理システム</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
            background-color: #f5f5f5;
            height: 100vh;
            overflow: hidden;
        }
        
        .dashboard-container {
            display: flex;
            height: 100vh;
        }
        
        /* サイドバー */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 0;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 1.5rem 1rem;
            background-color: #34495e;
            border-bottom: 1px solid #1a252f;
        }
        
        .sidebar-header h2 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .sidebar-header p {
            font-size: 0.875rem;
            color: #bdc3c7;
        }
        
        .sidebar-menu {
            padding: 0;
            list-style: none;
        }
        
        .sidebar-menu li {
            border-bottom: 1px solid #34495e;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 1rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
            font-weight: 500;
        }
        
        .sidebar-menu a:hover {
            background-color: #34495e;
        }
        
        .sidebar-menu a.active {
            background-color: #3498db;
        }
        
        .sidebar-menu .icon {
            margin-right: 0.5rem;
            width: 1rem;
            display: inline-block;
        }
        
        /* ログアウトボタン */
        .logout-form {
            margin-top: auto;
        }
        
        .logout-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            background-color: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-family: inherit;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #c0392b;
        }
        
        /* メインコンテンツ */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        
        .header {
            background-color: white;
            padding: 1rem 2rem;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 1.5rem;
        }
        
        .content {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
        }
        
        .content-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            margin-left: auto;
            color: #2c3e50;
        }
        
        .user-info span {
            margin-right: 1rem;
        }
        
        .header-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
            
            .main-content {
                height: calc(100vh - 60px);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- サイドバー -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>管理画面</h2>
                <p>不動産サイト管理システム</p>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="icon">📊</span>ダッシュボード
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.properties') }}" class="{{ request()->routeIs('dashboard.properties') ? 'active' : '' }}">
                        <span class="icon">🏠</span>物件
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.inquiries') }}" class="{{ request()->routeIs('dashboard.inquiries') ? 'active' : '' }}">
                        <span class="icon">📧</span>問い合わせ
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.users') }}" class="{{ request()->routeIs('dashboard.users') ? 'active' : '' }}">
                        <span class="icon">👥</span>ユーザ
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.settings') }}" class="{{ request()->routeIs('dashboard.settings') ? 'active' : '' }}">
                        <span class="icon">⚙️</span>設定
                    </a>
                </li>
            </ul>
            
            <form class="logout-form" method="POST" action="{{ route('dashboard.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <span class="icon">🚪</span>ログアウト
                </button>
            </form>
        </div>
        
        <!-- メインコンテンツ -->
        <div class="main-content">
            <div class="header">
                <div class="header-flex">
                    <h1>@yield('page-title', 'ダッシュボード')</h1>
                    <div class="user-info">
                        <span>
                            @if(session('dashboard_user') === 'root')
                                rootユーザさん
                            @elseif(auth()->check())
                                {{ auth()->user()->name }}さん
                            @else
                                ゲストさん
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>