<?php
include 'koneksi.php';
$produk = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="favicon.ico" type="image" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesen Kopi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="css/produk.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <br>
    <br>
    <br>
    <br>


    <nav class="navbar">
        <a href="#" class="navbar-logo">Pesen<span>Kopi</span>.</a>

        <div class="navbar-nav">
            <a href="index.php">Beranda</a>
            <a href="index.php#about">Tentang Kami</a>
            <a href="produk.php#menu">Menu</a>
            <a href="index.php#contact">Kontak</a>

        </div>

        <div class="navbar-extra">
            <a href="logout.php#logout">Logout</a>
        </div>
    </nav>


    <seciton id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <div class="row">
            <?php foreach ($produk as $result) : ?>
                <div class="menu-card">
                    <img src="img/menu/<?= $result['gambar'] ?>" alt="es pisang ijo" class="menu-card-img">
                    <h3 class="menu-card-title"><?= $result['nama_menu'] ?></h3>
                    <p class="menu-card-price">IDR <?= $result['harga'] ?>K</p>
                    <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>" style="color: red; text-decoration: none;">
                        <button type="button" style="background-color: #b6895b; border-radius: 0.2rem; padding: 0.3rem 1rem; color: white;">Pesan</button>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </seciton>

    <footer>
        <div class="social">
            <a href="https://www.instagram.com/pesenkopi_id/"><i data-feather="instagram"></i></a>
            <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiaWQifQ%3D%3D%22%7D"><i data-feather="twitter"></i></a>
            <a href="https://www.facebook.com/pesen.kopiid.16"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="index.php#home">Beranda</a>
            <a href="index.php#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="index.php#contact">Kontak</a>
        </div>
        <div class="credit">
            <p>TUGAS AKHIR WEBSITE</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>


    <script src="js/script.js"></script>
</body>

</html>