<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero-section {
            background-image: url('img/foto.jfif'); /* Ganti dengan URL gambar yang diinginkan */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4); /* Overlay hitam semi-transparan */
            z-index: 1;
        }
        .hero-section h1 {
            position: relative;
            z-index: 2;
            font-size: 3rem;
            margin-top: 80px;
        }
        .hero-section p {
            position: relative;
            z-index: 2;
            font-size: 1.2rem;
        }
        .content-section {
            padding: 40px 20px;
        }
        .card-img-top {
            height: 200px; /* Atur tinggi gambar */
            object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<div class="hero-section">
    <h1>Layanan Pengaduan Online<br>Masyarakat Tanjungpinang</h1>
    <br>
    <br>
    <p>Sampaikan laporan anda langsung kepada kami dan Temukan solusi untuk masalah yang Anda hadapi.</p>
</div>

<!-- Content Section -->
<div class="container content-section">
    <h2>Jenis Bencana</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/banjir.jfif" class="card-img-top" alt="Banjir">
                <div class="card-body">
                    <h5 class="card-title">Banjir</h5>
                    <p class="card-text">Banjir adalah kejadian alam yang disebabkan oleh meluapnya air dari sungai atau badan air lainnya.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/jalan rusak.jfif" class="card-img-top" alt="Jalan Rusak">
                <div class="card-body">
                    <h5 class="card-title">Jalan Rusak</h5>
                    <p class="card-text">Gempa bumi adalah getaran yang terjadi di permukaan bumi akibat pelepasan energi yang tiba-tiba di dalam bumi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/tanah longsor.jfif" class="card-img-top" alt="Tanah Longsor">
                <div class="card-body">
                    <h5 class="card-title">Tanah Longsor</h5>
                    <p class="card-text">Tanah longsor terjadi ketika tanah atau batuan bergerak turun dari lereng akibat gravitasi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/kebakaran.jfif" class="card-img-top" alt="Kebakaran Hutan">
                <div class="card-body">
                    <h5 class="card-title">Kebakaran Hutan</h5>
                    <p class="card-text">Kebakaran hutan adalah kebakaran yang terjadi di area hutan yang dapat disebabkan oleh faktor alami atau manusia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/Pencemaran.jfif" class="card-img-top" alt="Pencemaran Lingkungan">
                <div class="card-body">
                    <h5 class="card-title">Pencemaran Lingkungan</h5>
                    <p class="card-text">Tsunami adalah gelombang laut besar yang disebabkan oleh gempa bumi atau letusan gunung berapi di dasar laut.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/angin.jfif" class="card-img-top" alt="Angin Kencang">
                <div class="card-body">
                    <h5 class="card-title">Angin Kencang</h5>
                    <p class="card-text">Angin puting beliung adalah angin kencang yang berputar membentuk tornado.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
