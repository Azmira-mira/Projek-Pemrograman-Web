<?php
// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan server database Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "laporan_pengaduan"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pengaduan dari database
$sql = "SELECT * FROM pengaduan";
$result = $conn->query($sql);

// Hitung jumlah total data
$total_records = $result->num_rows;

// Tentukan jumlah card per halaman
$cards_per_page = 3;

// Hitung total halaman
$total_pages = ceil($total_records / $cards_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Isu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h2 {
            text-align: left;
        }
        .row {
            text-align: left;
        }
        .card-header {
            text-align: center;
        }
        .status-penanganan {
            margin-bottom: 0;
        }
        .status-penanganan .badge {
            display: block;
            margin-top: 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php'; ?>

<!-- Track Issue Section -->
<div class="container text-center my-5">
    <h2 class="my-3">Daftar Isu</h2>

    <!-- Carousel -->
    <div id="pengaduanCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $current_page = 0;
            $card_count = 0;
            $first_card = 0;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Mulai halaman baru jika card_count mencapai 0
                    if ($card_count % $cards_per_page == 0) {
                        if ($card_count > 0) {
                            echo '</div>'; // Tutup div carousel-item
                            echo '</div>'; // Tutup div carousel-inner
                        }
                        echo '<div class="carousel-item' . ($card_count == 0 ? ' active' : '') . '">';
                        echo '<div class="row">';
                    }

                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header bg-success text-white'>" . htmlspecialchars($row['nama']) . "</div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>Masalah:</strong> " . htmlspecialchars($row['masalah']) . "</p>";
                    // Format tanggal saja tanpa jam
                    $tanggal = date("d-m-Y", strtotime($row['created_at']));
                    echo "<p><strong>Tgl. Melapor:</strong> " . htmlspecialchars($tanggal) . "</p>";
                    echo "<p class='status-penanganan'><strong>Status Penanganan:</strong></p>";
                    echo "<span class='badge badge-warning'>Menunggu Verifikasi</span>"; // Status berada di bawah tanpa jarak
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    $card_count++;
                }
                echo '</div>'; // Tutup div row
                echo '</div>'; // Tutup div carousel-item
            } else {
                echo "<p>Belum ada laporan pengaduan.</p>";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </div>
        
        <!-- Kontrol Carousel -->
        <a class="carousel-control-prev" href="#pengaduanCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#pengaduanCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Selanjutnya</span>
        </a>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination justify-content-center">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>