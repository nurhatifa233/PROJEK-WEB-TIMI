<?php
include('config.php');

// Ambil ID produk dari URL
$id_produk = $_GET['id'];

// Query untuk mengambil data produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $query);
$data_produk = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);

    // Handle gambar upload
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $upload_dir = "uploads/";

    // Jika gambar baru di-upload
    if (!empty($gambar)) {
        $gambar_path = $upload_dir . basename($gambar);
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $gambar_db = $gambar;
        } else {
            echo "<p style='text-align: center; color: red;'>Gagal mengupload gambar.</p>";
            exit;
        }
    } else {
        // Jika gambar tidak diubah, tetap gunakan gambar lama
        $gambar_db = $data_produk['gambar'];
    }

    // Query untuk mengupdate data produk
    $query_update = "UPDATE produk SET 
                    nama_produk = '$nama_produk', 
                    harga = '$harga', 
                    deskripsi = '$deskripsi', 
                    stok = '$stok', 
                    gambar = '$gambar_db' 
                    WHERE id_produk = '$id_produk'";

    if (mysqli_query($conn, $query_update)) {
        // Redirect ke halaman katalog setelah update
        header("Location: katalog.php");
        exit;
    } else {
        echo "<p style='text-align: center; color: red;'>Gagal memperbarui produk: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk | Timi's Treats & More</title>
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
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            margin-top: 40px;
            font-size: 2.5rem;
        }
        p {
            font-size: 1.2rem;
            color: #ff85c0;
            text-align: center;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            font-size: 1.1rem;
            color: #ff69b4;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ff85c0;
        }

        button {
            background-color: #ff69b4;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #ff85c0;
        }

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

<div class="container text-center">
    <h1>Update Produk</h1>
    <p>Perbarui informasi produk di katalog Timi's Treats & More.</p>
</div>

<div class="container form-container">
    <form method="POST" enctype="multipart/form-data">
        <label>Nama Produk :</label>
        <input type="text" name="nama_produk" value="<?php echo $data_produk['nama_produk']; ?>" required><br>

        <label>Harga :</label>
        <input type="number" name="harga" value="<?php echo $data_produk['harga']; ?>" required><br>

        <label>Deskripsi :</label>
        <textarea name="deskripsi"><?php echo $data_produk['deskripsi']; ?></textarea><br>

        <label>Stok :</label>
        <input type="number" name="stok" value="<?php echo $data_produk['stok']; ?>" required><br>

        <label>Gambar Produk :</label>
        <input type="file" name="gambar" accept="image/*"><br>
        <small>Gambar saat ini: <?php echo $data_produk['gambar']; ?></small><br>

        <button type="submit">Update Produk</button>
    </form>
</div>

<footer>
    &copy; 2024 Timi's Treats & More. All rights reserved. 
</footer>
</body>
</html>
