<?php
// Konfigurasi database
$database = "toko_jajanan";
$hostname = "localhost";
$username = "root";
$password = "";

// Membuka koneksi ke database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("<div style='text-align: center; color: white; background-color: red; padding: 20px; font-family: Arial, sans-serif;'>
            <h1>Koneksi Gagal!</h1>
            <p>" . mysqli_connect_error() . "</p>
        </div>");
} else {
    echo "<div style='text-align: center; color: white; background-color: pink; padding: 20px; font-family: Arial, sans-serif;'>
            <h1 style='font-size: 40px; margin-bottom: 10px;'>🎉 <b>Berhasil Terhubung ke Database!</b> 🎉</h1>
            <p style='font-size: 18px;'>Anda sekarang terhubung ke database <b>$database</b>.</p>
            <hr style='border: 2px solid white;'>
        </div>";
}
?>
