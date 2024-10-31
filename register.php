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

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $phone = $_POST['phone'];

    // Siapkan dan jalankan query untuk menyimpan data pengguna
    $stmt = $conn->prepare("INSERT INTO users (username, password, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $phone);

    if ($stmt->execute()) {
        // Jika pendaftaran berhasil, arahkan ke halaman login
        header("Location: index.php");
        exit(); // Pastikan script berhenti di sini setelah pengalihan
    } else {
        echo "Pendaftaran gagal: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/Alam.jfif'); /* Ganti dengan path gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.5); /* Transparansi untuk card */
            padding: 40px;
            border-radius: 10px; /* Membuat sudut membulat */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Efek timbul */
            width: 400px;
            color: #000;
        }

        .register-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.5); /* Transparansi input field */
            color: #000;
            border: none;
            border-radius: 5px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3); /* Sedikit lebih terang saat input di klik */
            box-shadow: none;
            color: #000;
        }

        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #218838;
        }

        .register-footer {
            text-align: center;
            margin-top: 10px;
        }

        .register-footer a {
            color: #4B5320;
            font-weight: bold;
            text-decoration: none;
        }

        /* Tambahkan animasi untuk membuat card timbul lebih hidup */
        .register-container:hover {
            transform: translateY(-5px); /* Efek hover mengangkat sedikit */
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h3>Registrasi Akun</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="phone">Nomor HP:</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn-register">Daftar</button>
    </form>
    <div class="register-footer">
        <p>Sudah memiliki akun? <a href="index.php">Login disini</a></p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
