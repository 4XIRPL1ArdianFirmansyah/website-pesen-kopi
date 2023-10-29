<?php 
include 'koneksi.php';
?>

      <?php 
        if(isset($_POST['submit'])) {
          $user = $_POST['username'];
          $password = $_POST['password'];

          $cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'");
          $hasil = mysqli_fetch_array($cek_data);
          $status = $hasil['status'];
          $login_user = $hasil['username'];
          $row = mysqli_num_rows($cek_data);


            if ($row > 0) {
                session_start();   
                $_SESSION['login_user'] = $login_user;

                if ($status == 'admin') {
                  header('location: daftar_menu.php');
                }elseif ($status == 'user') {
                  header('location: index.php'); 
                }
            }else{
                header("location: login.php");
            }
        }
       ?>
<!doctype html>
<html lang="en">
  <head>

  <link rel="icon" href="favicon.ico" type="image" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">


    <title>Halaman Login</title>
  </head>
  <body>
 
    <div class="container">
      <h4 class="text-center">FORM LOGIN</h4>
      <hr>
      <form method="POST" action="">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
             
              <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
            
            </div>
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
            
              </div>

              <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
          </div>

        </div>

        <div class="mb-3" >
          <small><a href="registrasi.php" class="text-dark">Belum Punya Akun ? Buat Akun Anda !</a></small>
        
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
        <button type="reset" name="reset" class="btn btn-danger">RESET</button>
      
      </form>
    </div>
 
  </body>
</html>