<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Portal Pengelola & Dashboard Administrator Nirmala Laundry')">
    <title>@yield('title', 'Admin Dashboard') · Nirmala Laundry</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    @auth
        @if(auth()->user()->isAdmin())
            <header class="admin-header">
                <div class="admin-header-inner">
                    <div class="admin-header-left">
                        <a class="admin-header-brand" href="{{ route('admin.dashboard') }}">
                            <span class="admin-brand-dot"></span>
                            <span>Nirmala Laundry</span>
                        </a>
                        <span class="admin-badge">Admin Panel</span>
                    </div>

                    <div class="admin-header-right">
                        <a class="admin-link-beranda" href="{{ route('home') }}" target="_blank" rel="noopener">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            <span>Lihat Beranda</span>
                        </a>

                        <div class="admin-user-badge">
                            <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                            <div class="admin-user-info">
                                <span class="admin-user-name">{{ auth()->user()->name }}</span>
                                <span class="admin-user-role">Administrator</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="admin-logout-btn" type="submit" title="Keluar dari sesi administrator">Keluar</button>
                        </form>
                    </div>
                </div>
            </header>
        @endif
    @endauth

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
