@extends('layouts.account')

@section('title', 'Masuk')
@section('description', 'Masuk ke akun Nirmala Laundry untuk melihat pesanan Anda.')

@section('content')
    <section class="auth-card" aria-labelledby="login-title">
        <p class="overline">Selamat Datang Kembali</p>
        <h1 id="login-title">Masuk ke akunmu</h1>
        <p class="intro">Pantau pesanan dan kelola permintaan antar jemput dalam satu tempat.</p>

        <form method="POST" action="{{ route('login.store') }}" class="auth-form">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required autofocus>
            @error('email')<p class="field-error">{{ $message }}</p>@enderror

            <label for="password">Kata Sandi</label>
            <div class="password-field">
                <input id="password" name="password" type="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                <button type="button" data-password-toggle="password">Lihat</button>
            </div>
            @error('password')<p class="field-error">{{ $message }}</p>@enderror

            <label class="remember"><input type="checkbox" name="remember" value="1"><span>Ingat saya</span></label>
            <button class="primary-button" type="submit">Masuk</button>
        </form>

        <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
    </section>

    <script>document.querySelector('[data-password-toggle]').addEventListener('click',function(){const input=document.getElementById(this.dataset.passwordToggle);const show=input.type==='password';input.type=show?'text':'password';this.textContent=show?'Sembunyikan':'Lihat'});</script>
@endsection
