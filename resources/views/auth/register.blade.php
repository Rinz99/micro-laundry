@extends('layouts.account')

@section('title', 'Daftar')
@section('description', 'Buat akun pelanggan Nirmala Laundry.')

@section('content')
    <section class="auth-card" aria-labelledby="register-title">
        <p class="overline">Akun Pelanggan</p>
        <h1 id="register-title">Buat akun baru</h1>
        <p class="intro">Daftar untuk menyimpan informasi pelanggan dan memantau pesananmu.</p>

        <form method="POST" action="{{ route('register.store') }}" class="auth-form">
            @csrf
            <label for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" autocomplete="name" required autofocus>
            @error('name')<p class="field-error">{{ $message }}</p>@enderror

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
            @error('email')<p class="field-error">{{ $message }}</p>@enderror

            <label for="password">Kata Sandi</label>
            <div class="password-field"><input id="password" name="password" type="password" placeholder="Minimal 8 karakter" autocomplete="new-password" required><button type="button" data-password-toggle="password">Lihat</button></div>
            @error('password')<p class="field-error">{{ $message }}</p>@enderror

            <label for="password_confirmation">Ulangi Kata Sandi</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ketik ulang kata sandi" autocomplete="new-password" required>
            <button class="primary-button" type="submit">Daftar</button>
        </form>

        <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </section>

    <script>document.querySelector('[data-password-toggle]').addEventListener('click',function(){const input=document.getElementById(this.dataset.passwordToggle);const show=input.type==='password';input.type=show?'text':'password';this.textContent=show?'Sembunyikan':'Lihat'});</script>
@endsection
