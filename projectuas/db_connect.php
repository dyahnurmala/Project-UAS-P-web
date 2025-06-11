<?php
$servername = "localhost"; // atau IP address server database Anda
$username = "root"; // username untuk akses database
$password = ""; // password untuk akses database
$dbname = "projectuas"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Anda dapat menutup koneksi dengan menggunakan:
// $conn->close();
?>
