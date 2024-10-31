<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar {
            background-color: #004d00;
        }
        .nav-link {
            color: white; /* Warna tulisan menu */
            transition: color 0.3s ease; /* Transisi untuk efek hover */
        }
        .nav-item.active .nav-link {
            color: #FFD700; /* Warna tulisan menu aktif (emas) */
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
        .user-icon {
            font-size: 1.5rem;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- navbar.php -->
<?php
    $currentPage = basename($_SERVER['PHP_SELF']); // Mendapatkan nama file saat ini
?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">TANJUNGPINANG LAPOR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo ($currentPage == 'home.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item <?php echo ($currentPage == 'pengaduan.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="pengaduan.php">Pengaduan</a>
            </li>
            <li class="nav-item <?php echo ($currentPage == 'lacak.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="lacak.php">Lacak Isu</a>
            </li>
            
            <!-- Dropdown untuk ikon akun -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> <!-- Ikon user -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Bootstrap JS dan dependensi -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
