<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
} 

if(isset($_POST["submit"])) {
  var_dump($_POST);
}
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <style>
    .modal img {
      width: 100px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="judul-pesanan mt-5">

      <h3 class="text-center font-weight-bold">DATA PESANAN PELANGGAN</h3>

    </div>
    <table class="table table-bordered" id="example">
      <thead class="thead-light">

        <tr>
          <th scope="col">No.</th>
          <th scope="col">ID Pemesanan</th>
          <th scope="col">Nama Pesanan</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Total Harga</th>
        </tr>

      </thead>



      <tbody>
        <?php $nomor = 1; ?>
        <?php $totalbelanja = 0; ?>
        <?php
        $ambil = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_menu=produk.id_menu 
                WHERE pemesanan_produk.id_pemesanan='$_GET[id]'");

        ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
          <?php $subharga1 = $pecah['harga'] * $pecah['jumlah']; ?>

          <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $pecah['id_pemesanan_produk']; ?></td>
            <td><?php echo $pecah['nama_menu']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
              Rp. <?php echo number_format($pecah['harga'] * $pecah['jumlah']); ?>
            </td>
          </tr>

          <?php $nomor++; ?>
          <?php $totalbelanja += $subharga1; ?>
        <?php } ?>


      </tbody>

      <tfoot>


        <tr>
          <th colspan="5">Total Bayar</th>
          <th>Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>

      </tfoot>

    </table><br>

    <!-- <form method="POST" action="">
        <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
        <button class="btn btn-primary btn-sm" name="bayar">Konfirmasi Pembayaran</button>
      </form> -->

    <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Konfirmasi Pembayaran
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form class="modal-dialog" method="post" action="struk.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data" >
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6>Total: Rp. <?= $totalbelanja ?></h6>
            <p>Metode Pembayaran Yang Tersedia</p>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="metode_pembayaran" value="gopay" id="flexRadioDefault1" >
              <label class="form-check-label w-100" for="flexRadioDefault1">
                <img src="img/Gopay.png" class="max-width-100" alt="" style="width: 100px;" >
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metode_pembayaran" value="dana" id="flexRadioDefault2" required >
              <label class="form-check-label w-100" for="flexRadioDefault2">
                <img src="img/Logo_dana_blue.png" class="max-width-100" alt="" style="width: 100px;" >
              </label>
            </div>
            <!-- <div class="mb-3">
              <img src="img/Gopay.png" alt="">
            </div>
            <div class="mb-3">
              <img src="img/Logo_dana_blue.png" alt="">
            </div> -->
            <div class="mt-3">
              <label for="" class="form-label">Bukti Pembayaran</label>
              <input type="file" name="bukti" class="form-control" required >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div>

    <?php
    if (isset($_POST["bayar"])) {
      echo "<script>alert('Pesanan Telah Dibayar !');</script>";
      echo "<script>location= 'pesanan.php'</script>";
    }
    ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>