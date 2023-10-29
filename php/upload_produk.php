<?php
require 'functions.php';

// return var_dump($_FILES);


// Upload gambar
$target_dir = "../uploads-image/";
$target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



// upload data
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$gambar = basename($_FILES["fileInput"]["name"]);
var_dump($nama . "<br>");
var_dump($harga);
var_dump($deskripsi . "<br>");
var_dump($gambar . "<br>");

if(query("INSERT INTO produk VALUES ('', '$nama', $harga, '$deskripsi', '$gambar')")) {
  move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file);
  echo "produk baru ditambahkan";
  header('Location: ../admin/dashboard/produk.php');
} else {
  header('Location: ../admin/dashboard/produk.php');
  echo "produk gagal ditambahkan";
}




















// Check if image file is a actual image or fake image
// if (isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if ($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }




// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }




// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
// if (
//   $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//   && $imageFileType != "gif"
// ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }






// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
//     echo "The file " . htmlspecialchars(basename($_FILES["fileInput"]["name"])) . " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
