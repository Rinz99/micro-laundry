<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nirmala Laundry — layanan laundry kiloan dan satuan dengan antar jemput.">
    <title>Nirmala Laundry</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
    <header class="site-header" id="beranda">
        <div class="header-inner">
            <a class="brand" href="#beranda" aria-label="Nirmala Laundry, kembali ke atas"><span class="brand-dot"></span><span>Nirmala Laundry</span></a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-navigation"><span></span><span></span><span></span><span class="sr-only">Buka menu</span></button>
            <nav class="main-nav" id="main-navigation" aria-label="Navigasi utama">
                <a href="#layanan">Layanan</a><a href="#cara-kerja">Cara Kerja</a><a href="#lokasi">Lokasi</a><a href="#cek-pesanan">Cek Pesanan</a>
                <span class="mobile-account-links">
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Masuk</a>
                        <a href="{{ route('register') }}">Daftar</a>
                    @endauth
                </span>
            </nav>
            <div class="header-actions">
                @auth
                    <a class="button button-pill" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="profile-button" href="{{ route('dashboard') }}" aria-label="Buka akun {{ auth()->user()->name }}"><img src="{{ asset('images/landing/asset-user.svg') }}" alt=""></a>
                @else
                    <a class="button button-pill" href="{{ route('register') }}">Daftar</a>
                    <a class="profile-button" href="{{ route('login') }}" aria-label="Masuk ke akun"><img src="{{ asset('images/landing/asset-user.svg') }}" alt=""></a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        <section class="hero section-shell" aria-labelledby="hero-title">
            <div class="hero-copy">
                <p class="eyebrow-pill"><span></span>Perawatan Pakaian Ramah Serat</p>
                <h1 id="hero-title">Cucian rapi, hari<br>lebih ringan.</h1>
                <p class="hero-lead">Kenali layanan Nirmala Laundry, ajukan antar jemput, dan pantau perkembangan cucianmu melalui satu website.</p>
                <div class="hero-actions"><a class="button" href="#antar-jemput">Ajukan Antar Jemput</a><a class="button button-muted" href="#cek-pesanan">Cek Pesanan</a></div>
                <p class="account-note">Tanpa perlu membuat akun.</p>
                <p class="micro-info"><img src="{{ asset('images/landing/asset-truck.svg') }}" alt="">Gratis antar jemput hingga radius 2 km.</p>
            </div>
            <figure class="hero-visual"><img src="{{ asset('images/landing/hero-laundry.jpeg') }}" alt="Interior laundry yang bersih dan tertata rapi"></figure>
        </section>

        <section class="content-section" id="layanan" aria-labelledby="layanan-title">
            <div class="section-heading"><p class="overline">Pilihan Perawatan</p><h2 id="layanan-title">Pilih layanan sesuai<br>kebutuhanmu.</h2></div>
            <div class="service-grid">
                <article class="service-card">
                    <div class="service-icon"><img src="{{ asset('images/landing/asset-weight.svg') }}" alt=""></div><h3>Laundry Kiloan</h3><p class="service-summary">Cucian dihitung berdasarkan berat.</p>
                    <dl class="service-details"><div><dt>Tarif Dasar</dt><dd class="price">Rp. 15.000/Kg</dd></div><div><dt>Perkiraan Durasi</dt><dd>1 Jam</dd></div><div><dt>Proses Perawatan</dt><dd>Cuci, Kering &amp; Setrika Rapi</dd></div></dl>
                    <p class="service-footnote">Cocok untuk pakaian harian, seprai reguler, dan pakaian santai keluarga.</p>
                </article>
                <article class="service-card">
                    <div class="service-icon"><img src="{{ asset('images/landing/asset-hanger.svg') }}" alt=""></div><h3>Laundry Satuan</h3><p class="service-summary">Cucian dihitung berdasarkan jumlah barang.</p>
                    <dl class="service-details"><div><dt>Tarif Dasar</dt><dd class="price">Rp. 2.000/Pcs</dd></div><div><dt>Perkiraan Durasi</dt><dd>15 menit</dd></div><div><dt>Proses Perawatan</dt><dd>Perlakuan Khusus &amp; Handled with Care</dd></div></dl>
                    <p class="service-footnote">Ideal untuk jas, gaun, selimut tebal, bedcover, gorden, dan kain sensitif.</p>
                </article>
            </div>
            <aside class="important-note"><img src="{{ asset('images/landing/asset-info.svg') }}" alt=""><p>Total biaya dikonfirmasi setelah cucian diterima dan ditimbang atau dihitung. Biaya antar jemput di luar radius 2 km ditentukan admin sesuai lokasi dan disepakati terlebih dahulu.</p></aside>
        </section>

        <section class="content-section workflow" id="cara-kerja" aria-labelledby="workflow-title">
            <div class="section-heading"><p class="overline">Alur Kerja</p><h2 id="workflow-title">Dari penjemputan hingga<br>cucian kembali.</h2></div>
            <ol class="steps">
                <li><span class="step-number">01</span><h3>Ajukan penjemputan</h3><p>Isi data dan waktu jemput yang diinginkan tanpa login.</p></li>
                <li><span class="step-number">02</span><h3>Konfirmasi bersama admin</h3><p>Admin menghubungi melalui WhatsApp untuk memastikan alamat, jadwal, dan biaya.</p></li>
                <li><span class="step-number">03</span><h3>Cucian diterima dan diproses</h3><p>Berat atau jumlah barang diperiksa, biaya dikonfirmasi, dan perkembangan dapat dipantau.</p></li>
                <li><span class="step-number">04</span><h3>Bayar setelah cucian selesai</h3><p>Pembayaran melalui tunai atau transfer, kemudian cucian diambil atau diantar sesuai kesepakatan.</p></li>
            </ol>
            <div class="workflow-note"><span><img src="{{ asset('images/landing/asset-shop.svg') }}" alt="">Kamu juga bisa datang langsung ke tempat laundry.</span><a href="#lokasi">Lihat titik workshop kami <img src="{{ asset('images/landing/asset-arrow.svg') }}" alt=""></a></div>
        </section>

        <section class="tracking-wrap" id="cek-pesanan" aria-labelledby="tracking-title">
            <div class="tracking-card">
                <div class="tracking-icon"><img src="{{ asset('images/landing/asset-search.svg') }}" alt=""></div><h2 id="tracking-title">Sudah punya pesanan?</h2><p>Masukkan kode pelacakan untuk melihat perkembangan cucianmu.</p>
                <form class="tracking-form" id="tracking-form"><label class="sr-only" for="tracking-code">Kode pelacakan</label><input id="tracking-code" name="tracking_code" type="text" placeholder="Masukkan kode pelacakan" required><button class="button" type="submit">Cek Status</button></form>
                <p class="tracking-help" id="tracking-feedback" aria-live="polite">Kode tersedia setelah permintaan tersimpan atau tercantum pada nota.</p>
            </div>
        </section>

        <section class="content-section pickup" id="antar-jemput" aria-labelledby="pickup-title">
            <div class="pickup-heading"><p class="overline">Formulir Singkat</p><h2 id="pickup-title">Ajukan Antar Jemput</h2><p>Isi form sederhana di bawah. Admin akan segera menghubungi via WhatsApp untuk konfirmasi detail.</p></div>
            <form class="pickup-form" id="pickup-form">
                <div class="field-row"><label>Nama Lengkap<input name="name" type="text" placeholder="Contoh: Budi Santoso" required></label><label>Nomor WhatsApp<input name="whatsapp" type="tel" placeholder="Contoh: 081234567890" required></label></div>
                <fieldset><legend>Jenis Layanan</legend><div class="service-options"><label><input type="radio" name="service" value="Laundry Kiloan" checked><span>Laundry Kiloan</span></label><label><input type="radio" name="service" value="Laundry Satuan"><span>Laundry Satuan</span></label></div></fieldset>
                <label>Alamat Penjemputan<textarea name="address" placeholder="Tuliskan alamat lengkap beserta patokan rumah atau nomor unit..." required></textarea></label>
                <button class="button pickup-submit" type="submit">Kirim Pengajuan Penjemputan</button><p class="privacy-note" id="pickup-feedback" aria-live="polite">Data Anda hanya digunakan untuk konfirmasi antar jemput.</p>
            </form>
        </section>

        <section class="content-section location" id="lokasi" aria-labelledby="location-title">
            <div class="location-grid">
                <div class="location-copy">
                    <div class="location-brand"><span class="brand-dot"></span><h2 id="location-title">Nirmala Laundry</h2></div><p>Perawatan pakaian dengan formula ramah kain, pengeringan higienis, serta proses pelipatan rapi yang menghadirkan kesegaran murni bagi kenyamanan Anda sehari-hari.</p>
                    <dl class="contact-list">
                        <div><span><img src="{{ asset('images/landing/asset-location.svg') }}" alt=""></span><dt>Alamat</dt><dd>[Alamat laundry]</dd></div>
                        <div><span><img src="{{ asset('images/landing/asset-clock.svg') }}" alt=""></span><dt>Jam Operasional</dt><dd>[Jam operasional]</dd></div>
                        <div><span><img src="{{ asset('images/landing/asset-message-green.svg') }}" alt=""></span><dt>WhatsApp</dt><dd>[Nomor WhatsApp]</dd></div>
                    </dl>
                    <div class="location-actions"><a class="button icon-button" href="https://wa.me/6281234567890"><img src="{{ asset('images/landing/asset-message-white.svg') }}" alt="">Hubungi via WhatsApp</a><a class="button button-light icon-button" href="https://maps.google.com" target="_blank" rel="noopener"><img src="{{ asset('images/landing/asset-directions.svg') }}" alt="">Buka di Google Maps</a></div>
                </div>
                <figure class="map-visual"><img src="{{ asset('images/landing/workshop-map.png') }}" alt="Peta lokasi workshop Nirmala Laundry"><figcaption><img src="{{ asset('images/landing/asset-workshop.svg') }}" alt=""><span><strong>Workshop Nirmala Laundry</strong><small>Area penerimaan pakaian &amp; self-drop</small></span></figcaption></figure>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-grid">
            <div><div class="brand"><span class="brand-dot"></span><span>Nirmala Laundry</span></div><p>Perawatan pakaian berkelanjutan dan higienis dengan sentuhan alami. Hadir memberikan kesegaran dan kenyamanan murni untuk setiap serat kain Anda.</p></div>
            <div><h3>Hubungi Kami</h3><p>WhatsApp: +62 812-3456-7890<br>Email: salam@nirmalalaundry.id<br>Jam Operasional: 07.00 - 20.00 WIB</p></div>
            <div><h3>Workshop &amp; Lokasi</h3><p>Jl. Danau Asri No. 18, Kebayoran Baru, Jakarta Selatan</p><a href="https://maps.google.com" target="_blank" rel="noopener"><img src="{{ asset('images/landing/asset-pin-small.svg') }}" alt="">Buka Google Maps</a></div>
        </div>
        <div class="footer-bottom"><span>© 2024 Nirmala Laundry. Hak Cipta Dilindungi. · <a href="{{ route('admin.login') }}" style="color: inherit; text-decoration: underline; opacity: 0.7;">Portal Admin</a></span><span>Kesegaran Alami &amp; Perawatan Serat Berkelanjutan</span></div>
    </footer>

    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.main-nav');
        menuButton.addEventListener('click', () => { const open = menuButton.getAttribute('aria-expanded') === 'true'; menuButton.setAttribute('aria-expanded', String(!open)); navigation.classList.toggle('is-open', !open); });
        navigation.querySelectorAll('a').forEach(link => link.addEventListener('click', () => { menuButton.setAttribute('aria-expanded', 'false'); navigation.classList.remove('is-open'); }));
        document.getElementById('tracking-form').addEventListener('submit', event => { event.preventDefault(); const code = new FormData(event.currentTarget).get('tracking_code').trim(); document.getElementById('tracking-feedback').textContent = `Kode ${code} belum terhubung ke sistem pelacakan. Silakan konfirmasi melalui WhatsApp.`; });
        document.getElementById('pickup-form').addEventListener('submit', event => { event.preventDefault(); document.getElementById('pickup-feedback').textContent = 'Terima kasih. Data pengajuan sudah siap dikirim ke admin.'; });
    </script>
</body>
</html>
