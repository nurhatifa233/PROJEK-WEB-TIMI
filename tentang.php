<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Timi's Treats & More</title>
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

        /* Content Section */
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .content p {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
        }

        .content img {
            display: block;
            margin: 20px auto;
            width: 30%;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .content img:hover {
            transform: scale(1.05);
        }

        .contact-info {
            background-color: #ff85c0;
            color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .contact-info h4 {
            color: white;
        }

        .contact-info p {
            margin: 5px 0;
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
    <h1>Tentang Kami</h1>
    <p>Selamat datang di Timi's Treats & More, tempat di mana kelezatan bertemu dengan estetika!</p>
</div>

<!-- Content Section -->
<div class="container content">
    <p>
        Selamat datang di <strong>Timi's Treats & More</strong>, tempat di mana kelezatan bertemu dengan estetika! 
        Kami adalah brand yang berdedikasi untuk memberikan pengalaman kuliner yang lezat dan memuaskan. 
        Setiap produk yang kami tawarkan dirancang dengan cinta dan perhatian terhadap detail.
    </p>
    <!-- Gambar yang bisa diklik -->
    <a href="database_users.php">
        <img src="image/tentang kami.jpg" alt="Tentang Kami">
    </a>
    <p>
        Kami percaya bahwa makanan bukan hanya tentang rasa, tetapi juga tentang pengalaman. 
        Dengan bahan-bahan berkualitas tinggi dan layanan pelanggan terbaik, kami berkomitmen untuk menjadi bagian dari 
        momen-momen istimewa Anda.
    </p>
    <div class="contact-info">
        <h4>Informasi Kontak</h4>
        <p><strong>Email :</strong> info@timistreats.com</p>
        <p><strong>Alamat :</strong> Jl. Makanan Lezat No. 123, Kota Rasa, Indonesia</p>
        <p><strong>Telepon :</strong> +62 812 3456 7890</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
