<?php 
include('config.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timi's Treats & More</title>
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
        p {
            font-size: 1.2rem;
            color: #ff85c0;
            text-align: center;
        }

        /* Menu Links Section */
        .menu-links {
            margin-top: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .menu-links ul {
            list-style: none;
            padding-left: 0;
        }
        .menu-links ul li {
            margin: 10px 0;
        }
        .menu-links ul li a {
            color: #ff69b4;
            font-size: 1.2rem;
            text-decoration: none;
            font-weight: bold;
        }
        .menu-links ul li a:hover {
            color: #ff85c0;
            text-decoration: underline;
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
    <h1>Selamat Datang di Timi's Treats & More</h1>
    <p>Kelola toko Anda dengan mudah dan cepat!</p>
</div>

<!-- Menu Links Section -->
<div class="container menu-links">
    <h3 class="text-center" style="color: #ff69b4;">Menu Manajemen Produk</h3>
    <ul>
        <li><a href="insert_produk.php">Tambah Produk Baru</a></li>
        <li><a href="display_produk.php">Lihat Daftar Produk</a></li>
    </ul>
</div>

<!-- Footer -->
<footer>
    &copy; 2024 Timi's Treats & More. All rights reserved. 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
