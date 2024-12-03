<?php
include('config.php');

$message = ""; // Variabel untuk menampilkan pesan

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Pastikan ID valid (lebih besar dari 0)
    if (is_numeric($id) && $id > 0) {
        // Ganti 'product_id' dengan kolom ID yang benar, misalnya 'id_produk'
        $query = "DELETE FROM produk WHERE id_produk = $id";  // Ganti dengan nama kolom yang benar

        if (mysqli_query($conn, $query)) {
            $message = "<div class='message success'>✅ Produk berhasil dihapus!</div>";
            // Tidak perlu melakukan refresh otomatis, cukup menampilkan tombol untuk kembali
        } else {
            $message = "<div class='message error'>❌ Gagal menghapus produk: " . mysqli_error($conn) . "</div>";
        }
    } else {
        $message = "<div class='message error'>❌ ID produk tidak valid.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe4e9;
            color: #333;
        }

        .container {
            margin-top: 50px;
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #ff69b4;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.2rem;
        }

        .success {
            background-color: #ffccdf;
            color: #2ecc71;
        }

        .error {
            background-color: #ffe6ea;
            color: #e74c3c;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2rem;
            text-align: center;
            color: white;
            background-color: #ff69b4;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            background-color: #ff85c0;
        }

        footer {
            background-color: #ff85c0;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
        footer a {
            color: white;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffe4e9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hapus Produk</h1>
    <?php echo $message; ?>
    <a href="display_produk.php" class="button">Kembali ke Daftar Produk</a>
</div>

<footer>
    &copy; 2024 Timi's Treats & More. All rights reserved. | <a href="contact.php">Kontak Kami</a>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
