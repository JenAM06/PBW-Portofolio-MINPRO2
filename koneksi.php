<?php
$host = 'localhost';
$user = 'root';       
$pass = '';           
$db   = 'portfolio';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('<p style="color:red;font-family:sans-serif;padding:20px;">
        <strong>Koneksi database gagal:</strong> ' . mysqli_connect_error() . '
    </p>');
}

mysqli_set_charset($conn, 'utf8');
?>