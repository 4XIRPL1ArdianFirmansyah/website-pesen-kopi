<?php 
include('koneksi.php');

$query = mysqli_query($koneksi, 'SELECT * FROM produk');
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img1">
                <img src="image/1.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kopi Kami</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima enim suscipit officiis adipisci harum vero!</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, consectetur!</p>
                <p>
                    <a href="pesanan_pembeli.php"><button type="button">Pesan</button></a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>