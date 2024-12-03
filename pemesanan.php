<?php
include('config.php');

// Pastikan koneksi ke database berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ada pemesanan yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $produk_id = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // Ambil harga produk
    $sql_produk = "SELECT harga FROM produk WHERE id_produk = '$produk_id'";
    $result_produk = mysqli_query($conn, $sql_produk);
    $row_produk = mysqli_fetch_assoc($result_produk);
    $harga = $row_produk['harga'];

    // Hitung total harga
    $total_harga = $harga * $jumlah;

    // Masukkan data pemesanan ke tabel pemesanan
    $sql_insert = "INSERT INTO pemesanan (nama_pelanggan, id_produk, jumlah, total_harga, alamat, nomor_telepon)
                   VALUES ('$nama', '$produk_id', '$jumlah', '$total_harga', '$alamat', '$nomor_telepon')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('Pemesanan berhasil!'); window.location.href='pemesanan.php';</script>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan | Timi's Treats & More</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe4e9;
            color: #333;
        }

        /* Navbar Style */
        .navbar {
            background-color: #ff85c0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.7rem;
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 50px;
            margin-right: 15px;
        }
        .navbar-nav .nav-link {
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .navbar-nav .nav-link:hover {
            color: #ffe4e9;
        }

        h1 {
            color: #ff69b4;
            margin-top: 40px;
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 25px;
        }

        .btn-pink {
            background-color: #ff85c0;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-pink:hover {
            background-color: #ffe4e9;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="image/timi logo.png" alt="Logo" style="height: 50px; margin-right: 10px;"> Timi's Treats & More
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="katalog.php">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentang.php">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pemesanan.php">Pemesanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Pemesanan Form -->
<div class="container mt-5">
    <h1>Formulir Pemesanan</h1>
    <div class="form-container">
        <form action="proses_pemesanan.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="produk">Produk</label>
                <select class="form-control" id="produk" name="produk" required>
                    <?php
                    // Ambil data produk dari database
                    $sql = "SELECT id_produk, nama_produk FROM produk";
                    $result = mysqli_query($conn, $sql);

                    // Loop melalui data produk untuk ditampilkan di dropdown
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id_produk']}'>{$row['nama_produk']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" placeholder="Masukkan jumlah pesanan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pengiriman</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda" required></textarea>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan nomor telepon Anda" required>
            </div>
            <button type="submit" class="btn btn-pink btn-block">Kirim Pesanan</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
