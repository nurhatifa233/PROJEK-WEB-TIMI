<?php 
include('config.php');  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog | Timi's Treats & More</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe4e9; /* Soft pink background */
            color: #333;
        }

        /* Navbar Style */
        .navbar {
            background-color: #ff85c0; /* Soft pink navbar */
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
            color: #ff69b4; /* Hot pink for title */
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            margin-top: 40px;
            font-size: 2.5rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centers the cards horizontally */
        }

        .col-md-4 {
            display: flex;
            justify-content: center;
            align-items: stretch; /* Ensures all cards have equal height */
        }

        .card {
            width: 300px; /* Fixed width for cards */
            height: 400px; /* Fixed height for cards */
            border: none;
            transition: transform 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 100%;
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Ensures images scale proportionally without distortion */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Evenly spaces the content */
            height: 200px;
            padding: 15px;
        }

        .card-title {
            color: #ff69b4; /* Hot pink color for the product name */
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-text {
            overflow: hidden; /* Hides overflowed text */
            text-overflow: ellipsis; /* Adds "..." for long text */
            white-space: nowrap; /* Prevents text wrapping */
            margin-bottom: 10px;
        }

        .btn-pink {
            background-color: #ff85c0; /* Soft pink button */
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-pink:hover {
            background-color: #ffe4e9; /* Light pink on hover */
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

<div class="container mt-5">
    <h1 class="text-center mb-4">Katalog Produk</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM produk";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                        <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                        <p class="card-text font-weight-bold">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                        <a href="pemesanan.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-pink">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
