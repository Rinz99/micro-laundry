@extends('layouts.admin')

@section('title', 'Login Administrator')
@section('description', 'Halaman masuk resmi untuk pengelola dan administrator Nirmala Laundry.')

@section('content')
<div class="admin-auth-shell">
    <a class="admin-brand-top" href="{{ route('home') }}" title="Kembali ke Beranda">
        <span class="admin-brand-dot"></span>
        <span>Nirmala Laundry</span>
    </a>

    <div class="admin-login-card">
        <div class="admin-badge-wrap">
            <span class="admin-badge">Admin Workspace</span>
            <span class="security-badge">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Koneksi Terenkripsi
            </span>
        </div>

        <h1>Masuk Pengelola</h1>
        <p class="admin-subtitle">Autentikasi akun administrator untuk mengakses panel kendali dan operasional Nirmala Laundry.</p>

        @if(session('status'))
            <div class="alert-box alert-success" role="alert">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert-box alert-danger" role="alert">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}" class="admin-form">
            @csrf

            <div class="form-group">
                <label class="form-label" for="admin-email">Email Administrator</label>
                <input
                    id="admin-email"
                    name="email"
                    type="email"
                    class="form-control"
                    value="{{ old('email', 'admin@nirmala.com') }}"
                    placeholder="admin@nirmala.com"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="admin-password">Kata Sandi</label>
                <div class="password-input-wrap">
                    <input
                        id="admin-password"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Masukkan kata sandi admin"
                        autocomplete="current-password"
                        value="admin123"
                        required
                    >
                    <button type="button" class="toggle-password-btn" id="toggle-password-trigger" aria-label="Lihat atau sembunyikan kata sandi">Lihat</button>
                </div>
            </div>

            <div class="form-extras">
                <label class="remember-label">
                    <input type="checkbox" name="remember" value="1" checked>
                    <span>Ingat saya di perangkat ini</span>
                </label>
            </div>

            <button type="submit" class="admin-btn-primary">
                <span>Masuk ke Dashboard Admin</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
        </form>

        <div class="demo-creds-box">
            <p class="demo-creds-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                Kredensial Default Seeder
            </p>
            <p class="demo-creds-list">
                Email: <code>admin@nirmala.com</code><br>
                Kata Sandi: <code>admin123</code>
            </p>
        </div>
    </div>

    <div class="admin-auth-footer">
        <p>Bukan staf admin? <a href="{{ route('login') }}">Masuk sebagai pelanggan</a> · <a href="{{ route('home') }}">Ke Beranda</a></p>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle-password-trigger');
        const passInput = document.getElementById('admin-password');

        if (toggleBtn && passInput) {
            toggleBtn.addEventListener('click', function () {
                const isPassword = passInput.type === 'password';
                passInput.type = isPassword ? 'text' : 'password';
                toggleBtn.textContent = isPassword ? 'Sembunyikan' : 'Lihat';
            });
        }
    });
</script>
@endpush
@endsection
