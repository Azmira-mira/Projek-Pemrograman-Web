<?php
// Memulai session
session_start();

// Menghapus semua data session
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Mengakhiri sesi

// Mengarahkan pengguna ke halaman login setelah logout
header("Location: login.php");
exit();
?>
