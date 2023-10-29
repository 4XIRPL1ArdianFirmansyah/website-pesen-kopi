<?php
require '../../php/delete_produk.php';
$produk = query('SELECT * FROM products');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }




    /* style table produk */
    .produk-section img {
      width: 50px;
    }

    .produk-section table td {
      /* display: flex; */
      /* flex-direction: column;
      justify-content: center; */
      align-items: center;
    }

    .produk-section .action button a {
      color: white;
      text-decoration: none;
    }

    @media (min-width: 300px) {
      .produk-section .action button {
        padding: 5px;
        font-size: 12px;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.php">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="produk.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main section  -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Produk</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0"> -->
          <!-- <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> -->
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button> -->
          <!-- </div> -->
        </div>
        <a href="uploadProduk.php" class="btn btn-success">Tambah Produk</a>
        <div class="table-responsive produk-section">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Kode</th>
                <th scope="col">Gambar</th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk as $row) : ?>
                <tr d-flex flex-column justify-content-center>
                  <td><?= $row['id'] ?></td>
                  <td><img src="../../uploads-image/<?= $row['gambar'] ?>"></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['harga'] ?></td>
                  <td class="action">
                    <form action="" method="post">
                      <button type="submit" class="btn btn-danger"  name="hapus" id="hapus" value="<?= $row['id'] ?>" onclick="return confirm('Anda ingin menghapus produk <?= $row['nama'] ?>')">Hapus</button>
                      <button class="btn btn-warning">Edit</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    // function delete_produk(id) {
    //   $.ajax({
    //     type: "POST", // atau "DELETE" tergantung pada tindakan yang diinginkan
    //     url: "../../php/delete_produk.php", // Gantilah ini dengan URL endpoint penghapusan Anda
    //     data: {
    //       id: id // Gantilah ini dengan data yang ingin Anda hapus
    //     },
    //     success: function(response) {
    //       // Sukses: Lakukan sesuatu setelah penghapusan berhasil
    //       console.log("Data berhasil dihapus");
    //     },
    //     error: function(xhr, status, error) {
    //       // Kesalahan: Tangani kesalahan yang terjadi selama permintaan
    //       console.error("Terjadi kesalahan: " + error);
    //     }
    //   });
    // }
  </script>

</body>

</html>