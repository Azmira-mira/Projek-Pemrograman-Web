<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "laporan_pengaduan"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penyimpanan laporan ke database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $notelp = htmlspecialchars($_POST['notelp']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $masalah = htmlspecialchars($_POST['masalah']);
    
    // Cek apakah file diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $fotoNama = basename($foto['name']);
        $fotoTarget = 'uploads/' . $fotoNama; // Sesuaikan direktori penyimpanan

        // Pindahkan file ke direktori uploads
        if (move_uploaded_file($foto['tmp_name'], $fotoTarget)) {
            // Simpan informasi ke database
            $sql = "INSERT INTO pengaduan (nama, notelp, alamat, masalah, foto)
                    VALUES ('$nama', '$notelp', '$alamat', '$masalah', '$fotoNama')";
            
            if ($conn->query($sql) === TRUE) {
                // Popup sukses dengan JavaScript dan redireksi ke lacak.php
                echo "<script>
                        alert('Laporan berhasil dikirim!');
                        window.location.href = 'lacak.php';
                      </script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah foto/video!');</script>";
        }
    } else {
        echo "<script>alert('File tidak diunggah atau terjadi kesalahan!');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-section h3 {
            background-color: #b5dbb6;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
        }
        .upload-area {
            border: 2px dashed #d3d3d3;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            position: relative; /* Tambahkan posisi relatif */
        }
        #preview {
            margin-top: 10px; /* Kurangi jarak atas */
            display: none; /* Sembunyikan pratinjau gambar pada awalnya */
            width: 100%; /* Membatasi lebar gambar */
            height: auto; /* Mengatur tinggi otomatis */
            max-height: 200px; /* Batasi tinggi maksimum */
            border-radius: 10px;
            object-fit: cover; /* Mengatur proporsi gambar */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="form-section">
            <h3>Unggah Laporan</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Upload Area -->
                        <div class="upload-area mb-3" id="upload-area">
                            <input type="file" name="foto" id="foto" class="form-control-file" style="display:none;" required>
                            <label for="foto" id="file-label">Unggah Foto/Video</label>
                            <img id="preview" alt="Pratinjau Gambar" />
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="konfirmasi" name="konfirmasi" required>
                            <label class="form-check-label" for="konfirmasi">Saya memastikan bahwa informasi sesuai fakta dan akurat.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <!-- No.Telp -->
                        <div class="form-group">
                            <label for="notelp">No. Telp</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" required>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap Kejadian</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                        </div>
                        <!-- Masalah -->
                        <div class="form-group">
                            <label for="masalah">Masalah</label>
                            <textarea class="form-control" id="masalah" name="masalah" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Adukan Sekarang</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.querySelector('.upload-area').addEventListener('click', function() {
            document.getElementById('foto').click();
        });
        
        document.getElementById('foto').addEventListener('change', function() {
            const file = this.files[0];
            const fileName = file ? file.name : 'Tidak ada file yang dipilih';
            
            // Tampilkan pratinjau gambar
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result; // Set src dengan hasil pembacaan file
                    preview.style.display = 'block'; // Tampilkan gambar
                }
                reader.readAsDataURL(file); // Baca file sebagai URL data
            } else {
                document.getElementById('preview').style.display = 'none'; // Sembunyikan gambar jika tidak ada file yang dipilih
            }
        });
    </script>
</body>
</html>