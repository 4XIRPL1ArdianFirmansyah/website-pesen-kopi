<?php
require 'functions.php';

// var_dump($_POST);


if(isset($_POST['hapus'])) {
  $id = $_POST['hapus'];
  $hasil = delete('produk', $id);

  if ($hasil) {
    // Penghapusan berhasil
    echo "<script> alert('Data berhasil dihapus') </script>";
  } else {
    // Penghapusan gagal
    echo "<script> alert('Terjadi kesalahan saat menghapus data') </script>";
  }
}


