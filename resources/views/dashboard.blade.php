@extends('layouts.account')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard-shell">
        <div class="dashboard-welcome">
            <div><p class="overline">Akun Pelanggan</p><h1>Halo, {{ auth()->user()->name }}.</h1><p class="intro">Kelola aktivitas laundrymu dari sini.</p></div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="secondary-button" type="submit">Keluar</button></form>
        </div>

        <div class="dashboard-grid">
            <article><span>01</span><h2>Ajukan Antar Jemput</h2><p>Buat permintaan penjemputan cucian dari rumah.</p><a href="{{ route('home') }}#antar-jemput">Buka formulir →</a></article>
            <article><span>02</span><h2>Cek Pesanan</h2><p>Gunakan kode pelacakan untuk melihat perkembangan cucian.</p><a href="{{ route('home') }}#cek-pesanan">Cek sekarang →</a></article>
        </div>
    </section>
@endsection
