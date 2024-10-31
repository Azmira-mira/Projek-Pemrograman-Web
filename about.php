<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Lapor Alam</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            position: relative;
            background-image: url('img/foto.jfif'); / */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 0;
            text-align: center;
            z-index: 1;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Warna hitam dengan transparansi 50% */
            z-index: -1;
        }
        .content-section {
            padding: 40px 20px;
        }
        .content-section h2 {
            margin-bottom: 20px;
        }
        .video-responsive {
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            position: relative;
            height: 0;
        }
        .video-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<div class="hero-section">
    <h1>Apa Itu Lapor?</h1>
</div>

<!-- Content Section -->
<div class="container content-section">
    <div class="row">
        <!-- Kolom Teks -->
        <div class="col-md-6 text-justify">
            <p>Website Layanan Pengaduan Bencana Alam ini dirancang untuk memfasilitasi masyarakat dalam melaporkan kejadian bencana secara cepat dan efektif. Melalui platform ini, pengguna dapat menyampaikan laporan terkait berbagai jenis bencana alam seperti banjir, tanah longsor, kebakaran hutan, hingga angin puting beliung. Setiap laporan yang masuk akan diterima oleh pihak berwenang untuk ditindaklanjuti dengan cepat, memastikan bantuan dapat disalurkan secepat mungkin. Dengan antarmuka yang mudah digunakan dan fitur pelacakan status laporan, website ini bertujuan untuk meminimalkan dampak bencana dengan mempercepat proses respons dan penanganan.</p>
        </div>

        <!-- Kolom Video -->
        <div class="col-md-6">
            <div class="video-responsive">
                <iframe src="https://www.youtube.com/embed/Fs2JIUM_V_E?si=_ft55b2ltGR6GVJf" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
