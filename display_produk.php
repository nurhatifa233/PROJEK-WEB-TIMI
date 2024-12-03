<?php
include('config.php');

$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk | Timi's Treats & More</title>
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

        /* Hero Section */
        h1 {
            color: #ff69b4;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            margin-top: 40px;
            font-size: 2.5rem;
        }

        /* Table Section */
        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        thead {
            background-color: #ff85c0;
            color: white;
        }
        tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        tbody tr:nth-child(even) {
            background-color: #ffe4e9;
        }

        a {
            text-decoration: none;
            color: #ff69b4;
            font-weight: bold;
        }
        a:hover {
            background-color: #ff85c0;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        /* Footer */
        footer {
            background-color: #ff85c0;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="image/timi logo.png" alt="Logo"> Timi's Treats & More
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

<!-- Hero Section -->
<div class="container text-center">
    <h1>Daftar Produk</h1>
</div>

<!-- Table Section -->
<div class="container table-container">
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id_produk']; ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td>
                    <img src="<?= $row['gambar']; ?>" alt="Gambar" style="width: 80px; border-radius: 8px;">
                </td>
                <td>
                    <a href="update_produk.php?id=<?= $row['id_produk']; ?>">Edit</a> |
                    <a href="delete_produk.php?id=<?= $row['id_produk']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer>
    &copy; 2024 Timi's Treats & More. All rights reserved. 
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
