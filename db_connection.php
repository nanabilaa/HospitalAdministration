<?php
// Koneksi ke database
$db_host = '127.0.0.1';
$db_username = 'root';    // Username default MAMP
$db_password = 'root';    // Password default MAMP
$db_name = 'my_hospital'; // Nama database yang digunakan
$db_port = 8889;          // Port MAMP default untuk MySQL

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name, $db_port);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
