<?php
include 'koneksi.php';

$produk = mysqli_query($koneksi, "SELECT * FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!---favicon--->
    <link rel="icon" href="favicon.ico" type="image" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesen Kopi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar">
        <a href="#" class="navbar-logo">Pesen<span>Kopi</span></a>

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
    
    <section class="hero" id="home">
        <main class="content">
            <h1>Awali Hari Dengan <span>Secangkir Kopi</span></h1>
            
            <a href="produk.php" class="cta">Lihat Semua</a>
        </main>
    </section>
   
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kopi Kami</h3>
                <p>Kopi adalah lebih dari sekadar minuman, itu adalah pengalaman yang memadukan rasa, dan aroma. 
                Kami berharap situs kami akan menjadi sumber inspirasi dan wawasan untuk semua pencinta kopi di seluruh dunia.
                 </p>
                <p>Mari bersama-sama menikmati keindahan kopi!</p>
            </div>
        </div>
    </section>
  
    <seciton id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>

        <div class="row">
        <?php 

        include('koneksi.php');

        $query = mysqli_query($koneksi, 'SELECT * FROM produk');
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
  
        ?>
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


    <!-- Menu Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7899.272629385999!2d112.57951484069783!3d-8.138456317566057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e789fbca36ae481%3A0xfbcc208e1777df19!2sSMK%20Negeri%201%20Kepanjen!5e0!3m2!1sid!2sid!4v1694240634094!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>
    

    <footer>
    <div class="social">
            <a href="https://www.instagram.com/pesenkopi_id/"><i data-feather="instagram"></i></a>
            <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiaWQifQ%3D%3D%22%7D"><i data-feather="twitter"></i></a>
            <a href="https://www.facebook.com/pesen.kopiid.16"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="#home">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="credit">
            <p>TUGAS AKHIR WEBSITE</p>
        </div>
    </footer>
    

    <script>
        feather.replace();
    </script>


    <script src="js/script.js"></script>
</body>

</html>