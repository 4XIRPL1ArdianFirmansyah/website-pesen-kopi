<?php  
include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else
?>
<?php 
if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{

  echo "<script>location= 'pesanan_pembeli.php'</script>";
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

  </head>
  <body>
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

            <?php 
              include('koneksi.php');
              $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
              $pecah = $ambil -> fetch_assoc();
              $subharga = $pecah["harga"]*$jumlah;
            ?>
          
          
          <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah["nama_menu"]; ?></td>
              <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
              <td><?php echo $jumlah; ?></td>
              <td>Rp. <?php echo number_format($subharga); ?></td>
              <td>
                <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
              </td>
          </tr>

            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
        
        </tbody>
        <tfoot>
        
        
        <tr>
            <th colspan="4">Total Belanja</th>
            <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>
        
    
        </tfoot>
      </table><br>
      <form method="POST" action="">
        <a href="produk.php" class="btn btn-primary btn-sm">Lihat Menu</a>
        <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
      </form>        

      <?php 
      if(isset($_POST['konfirm'])) {
          $tanggal_pemesanan=date("Y-m-d");

          $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja) VALUES ('$tanggal_pemesanan', '$totalbelanja')");

      
          $id_terbaru = $koneksi->insert_id;

          foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
          {
            $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
          }          

      
          unset($_SESSION["pesanan"]);

          echo "<script>alert('Pemesanan Sukses!');</script>";
          echo "<script>location= 'produk.php'</script>";
      }
      ?>
    </div>
    
  </body>
</html>