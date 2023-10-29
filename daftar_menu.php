<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else
?>

<!doctype html>
<html lang="en">
  <head>


  <link rel="icon" href="favicon.ico" type="image" />
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
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
        <a href="daftar_menu.php#menu" style='text-decoration: none'>Menu</a>
            <a href="pesanan.php#pesanan" style='text-decoration: none'>Pesanan</a>
            <a href="logout.php"style='text-decoration: none'>Logout</a>
        </div>

    </nav>
 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
 
      <div class="container">
        <a href="tambah_menu.php" class="btn btn-success mt-3">TAMBAH DAFTAR MENU</a>
        <div class="row">

          <?php 

          include('koneksi.php');

          $query = mysqli_query($koneksi, 'SELECT * FROM produk');
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="img/menu/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
              <h3 class="menu-card-title" style='color: black'><?= $result['nama_menu'] ?></h3>
                <p class="menu-card-price" style='color: black'>Rp. <?= $result['harga'] ?>K</p><br>
                <a href="edit_menu.php?id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

                <a href="hapus_menu.php?id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
              </div>
            </div>
          </div>
              <?php endforeach; ?>
            </div>
          </div>

  </body>
</html>
