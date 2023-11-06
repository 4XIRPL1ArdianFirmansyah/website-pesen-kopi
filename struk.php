<?php
include 'koneksi.php';
$pesanan = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_menu=produk.id_menu 
WHERE pemesanan_produk.id_pemesanan='$_GET[id]'")->fetch_assoc();
move_uploaded_file($_FILES["bukti"]["tmp_name"], "img/bukti-pembayaran/" . $_FILES['bukti']['name']);
// die(var_dump($_FILES['bukti']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        .w {
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-5"></div>
        <div class="card m-auto">
            <h5 class="card-header">Pesen Kopi</h5>
            <div class="card-body">
                <h5 class="card-title">Struk</h5>
                <div class="row">
                    <table class="col">
                        <tr>
                            <td class="w">Nomor</td>
                            <td>: <?= $pesanan["id_pemesanan_produk"] ?></td>
                        </tr>
                        <tr>
                            <td class="w">Menu</td>
                            <td>: <?= $pesanan["nama_menu"] ?></td>
                        </tr>
                        <tr>
                            <td class="w">Jumalah</td>
                            <td>: <?= $pesanan["jumlah"] ?></td>
                        </tr>
                        <tr>
                            <td class="w">Harga</td>
                            <td>: Rp. <?= number_format($pesanan["harga"]) ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="pt-4"></div>
                                <h6>Metode Pembayaran</h6>
                            </td>
                            <td>
                                <div class="pt-4"></div>
                                <?php if ($_POST["metode_pembayaran"] == "gopay") { ?>
                                    <img src="img/Gopay.png" alt="" style="width: 200px;">
                                <?php } else { ?>
                                    <img src="img/Logo_dana_blue.png" alt="" style="width: 200px;">
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                    <div class="col" style="width: 50%;">
                                    <h6>Bukti Pembayaran</h6>
                        <img src="img/bukti-pembayaran/<?= $_FILES['bukti']['name'] ?>" alt="" style="height: 300px;">
                    </div>
                </div>

                <div class="mt-4"></div>
                <a href="index.php" class="btn btn-primary">Beranda</a>
            </div>
        </div>
    </div>

</body>

</html>