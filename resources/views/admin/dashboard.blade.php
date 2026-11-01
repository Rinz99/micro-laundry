@extends('layouts.admin')

@section('title', 'Dashboard Administrator')
@section('description', 'Panel kendali utama administrator Nirmala Laundry.')

@section('content')
<div class="admin-main-wrap">
    @if(session('status'))
        <div class="alert-box alert-success" role="alert" style="margin-bottom: 24px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <section class="dashboard-hero">
        <div>
            <span class="admin-badge" style="margin-bottom: 12px;">Portal Pengelola</span>
            <h1 class="dashboard-hero-title">Selamat Datang, {{ $admin->name }}</h1>
            <p class="dashboard-hero-desc">Pantau pesanan masuk, koordinasi antar jemput pelanggan, dan pantau operasional Nirmala Laundry dalam satu tampilan terpadu.</p>
        </div>

        <div class="dashboard-system-pill">
            <span class="system-status-indicator"></span>
            <span>Sistem Operasional Aktif</span>
        </div>
    </section>

    <!-- Stat Cards Overview -->
    <div class="admin-stats-grid">
        <div class="admin-stat-card">
            <div class="stat-card-header">
                <span class="stat-card-label">Pesanan Aktif</span>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                </div>
            </div>
            <div class="stat-card-value">{{ $stats['active_orders'] }}</div>
            <div class="stat-card-sub">Dalam proses cuci &amp; setrika</div>
        </div>

        <div class="admin-stat-card">
            <div class="stat-card-header">
                <span class="stat-card-label">Antar-Jemput Baru</span>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                </div>
            </div>
            <div class="stat-card-value">{{ $stats['pending_pickups'] }}</div>
            <div class="stat-card-sub">Menunggu konfirmasi WhatsApp</div>
        </div>

        <div class="admin-stat-card">
            <div class="stat-card-header">
                <span class="stat-card-label">Pelanggan Terdaftar</span>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
            </div>
            <div class="stat-card-value">{{ $stats['total_customers'] }}</div>
            <div class="stat-card-sub">Akun pelanggan aktif</div>
        </div>

        <div class="admin-stat-card">
            <div class="stat-card-header">
                <span class="stat-card-label">Estimasi Omset Hari Ini</span>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
            </div>
            <div class="stat-card-value">{{ $stats['estimated_revenue'] }}</div>
            <div class="stat-card-sub">Dari {{ $stats['completed_today'] }} pesanan terselesaikan</div>
        </div>
    </div>

    <!-- Main Detail Columns -->
    <div class="dashboard-grid-cols">
        <div class="admin-panel-card">
            <h2 class="panel-card-title">Alur Operasional Laundry</h2>
            <p class="panel-card-subtitle">Ringkasan tahapan penanganan cucian dari pelanggan.</p>

            <div style="display: grid; gap: 14px;">
                <div style="display: flex; gap: 14px; padding: 14px; background: var(--surface); border-radius: var(--radius-md);">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--green); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">1</div>
                    <div>
                        <strong style="font-size: 14px; color: var(--ink);">Permintaan Antar Jemput Masuk</strong>
                        <p style="margin: 4px 0 0; font-size: 13px; color: var(--body);">Pelanggan mengisi formulir di landing page web tanpa harus registrasi.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; padding: 14px; background: var(--surface); border-radius: var(--radius-md);">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--green); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">2</div>
                    <div>
                        <strong style="font-size: 14px; color: var(--ink);">Konfirmasi Admin via WhatsApp</strong>
                        <p style="margin: 4px 0 0; font-size: 13px; color: var(--body);">Admin memastikan titik lokasi penjemputan, jadwal, serta estimasi biaya layanan.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; padding: 14px; background: var(--surface); border-radius: var(--radius-md);">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--green); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">3</div>
                    <div>
                        <strong style="font-size: 14px; color: var(--ink);">Penimbangan &amp; Pemrosesan Cucian</strong>
                        <p style="margin: 4px 0 0; font-size: 13px; color: var(--body);">Cucian ditimbang (kiloan Rp 15.000/kg) atau dihitung (satuan Rp 2.000/pcs), lalu dicuci, dikeringkan, dan disetrika rapi.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; padding: 14px; background: var(--surface); border-radius: var(--radius-md);">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--green); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">4</div>
                    <div>
                        <strong style="font-size: 14px; color: var(--ink);">Selesai &amp; Pelacakan Status</strong>
                        <p style="margin: 4px 0 0; font-size: 13px; color: var(--body);">Pelanggan dapat mengecek perkembangan cucian dengan kode pelacakan di beranda web.</p>
                    </div>
                </div>
            </div>

            <div class="feature-preview-notice">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <h3>Modul Pengelolaan Pesanan Siap Dikembangkan</h3>
                <p>Fitur login &amp; proteksi otentikasi admin telah aktif sepenuhnya. Modul CRUD pesanan, input nota, dan ubah status dapat diintegrasikan pada langkah berikutnya sesuai kebutuhan Anda.</p>
            </div>
        </div>

        <div>
            <div class="admin-panel-card" style="margin-bottom: 24px;">
                <h2 class="panel-card-title">Aksi Cepat</h2>
                <p class="panel-card-subtitle">Pintasan navigasi penting.</p>

                <a class="quick-action-link" href="{{ route('home') }}#antar-jemput" target="_blank" rel="noopener">
                    <span>Lihat Formulir Antar Jemput</span>
                    <span>→</span>
                </a>
                <a class="quick-action-link" href="{{ route('home') }}#cek-pesanan" target="_blank" rel="noopener">
                    <span>Uji Pelacakan Cucian</span>
                    <span>→</span>
                </a>
                <a class="quick-action-link" href="{{ route('home') }}#layanan" target="_blank" rel="noopener">
                    <span>Lihat Tarif &amp; Layanan</span>
                    <span>→</span>
                </a>
                <a class="quick-action-link" href="{{ route('login') }}" target="_blank" rel="noopener">
                    <span>Halaman Login Pelanggan</span>
                    <span>→</span>
                </a>
            </div>

            <div class="admin-panel-card">
                <h2 class="panel-card-title">Profil Administrator</h2>
                <p class="panel-card-subtitle">Rincian sesi aktif saat ini.</p>

                <div class="account-summary-row">
                    <span class="summary-label">Nama Pengguna</span>
                    <span class="summary-val">{{ $admin->name }}</span>
                </div>
                <div class="account-summary-row">
                    <span class="summary-label">Email</span>
                    <span class="summary-val">{{ $admin->email }}</span>
                </div>
                <div class="account-summary-row">
                    <span class="summary-label">Peran</span>
                    <span class="summary-val" style="color: var(--green-dark);">Administrator</span>
                </div>
                <div class="account-summary-row">
                    <span class="summary-label">Status Akun</span>
                    <span class="summary-val" style="color: #12b76a;">Aktif &amp; Terverifikasi</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
