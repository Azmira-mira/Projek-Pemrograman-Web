<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laporan_pengaduan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("Location: home.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
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
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/Alam.jfif'); /* Replace with your background image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.5); /* Transparansi untuk card */
            padding: 40px;
            border-radius: 10px; /* Membuat sudut membulat */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Efek timbul */
            width: 350px;
            color: #000;
        }

        .login-container h3 {
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

        .btn-login {
            background-color: #28a745;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        .login-footer {
            text-align: center;
            margin-top: 10px;
        }

        .login-footer a {
            color: #4B5320;
            font-weight: bold;
            text-decoration: none;
        }

        /* Tambahkan animasi untuk membuat card timbul lebih hidup */
        .login-container:hover {
            transform: translateY(-5px); /* Efek hover mengangkat sedikit */
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3>Login</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn-login">Log In</button>
    </form>
    <div class="login-footer">
        <p>Belum memiliki akun? <a href="register.php">Daftar disini</a></p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
