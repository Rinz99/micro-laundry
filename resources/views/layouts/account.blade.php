<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Akun pelanggan Nirmala Laundry')">
    <title>@yield('title') · Nirmala Laundry</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <header class="account-header">
        <a class="brand" href="{{ route('home') }}"><span></span>Nirmala Laundry</a>
        <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
    </header>

    <main class="account-main">
        @yield('content')
    </main>
</body>
</html>
