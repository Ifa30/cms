<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Taylor Ifa Mandiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff7ed, #ffe4f0, #e0f7fa);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #8a2be2;
        }

        .hero p {
            font-size: 1.2rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 50px;
        }

        .card-feature {
            background: #fff;
            border-radius: 1.2rem;
            padding: 2rem;
            width: 250px;
            text-align: center;
            box-shadow: 0 6px 14px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }

        .card-feature:hover {
            transform: translateY(-6px);
        }

        .card-feature i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .card-produk { color: #14532d; background: #dcfce7; }
        .card-laporan { color: #1e3a8a; background: #dbeafe; }
        .card-info { color: #7c2d12; background: #fef9c3; }
        .card-out { color: #991b1b; background: #fee2e2; }

        footer {
            margin-top: 60px;
            text-align: center;
            font-size: 0.9rem;
            color: #888;
        }
    </style>
</head>
<body>
<body>

    @if(Auth::check())
    <div class="d-flex justify-content-end align-items-center px-4 pt-3">
        <div class="text-end" style="font-size: 0.95rem; color: #333;">
            👤 Hai, <strong>{{ Auth::user()->name }}</strong>
        </div>
    </div>
    @endif

    <div class="hero">
        <h1>Selamat Datang di Taylor Ifa Mandiri</h1>
        <p>Industri kreatif rumahan di bidang pakaian — melayani pembuatan seragam, dress, kemeja, jas dan lainnya.</p>

        <div class="features mt-5">
            <div class="card-feature card-produk">
                <i class="bi bi-box-seam"></i>
                <h5>Produk</h5>
                <p>Kelola koleksi pakaian yang tersedia.</p>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">Lihat Produk</a>
            </div>

            <div class="card-feature card-laporan">
                <i class="bi bi-bar-chart-line"></i>
                <h5>Laporan</h5>
                <p>Lihat data penjualan & perkembangan usaha.</p>
                <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-outline-dark">Lihat Laporan</a>
            </div>

            <div class="card-feature card-out">
                <i class="bi bi-box-arrow-right"></i>
                <h5>Keluar</h5>
                <p>Logout dari sistem dengan aman.</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-dark">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-4">
        &copy; {{ date('Y') }} Taylor Ifa Mandiri — Home Industri
    </footer>

</body>
</html>
