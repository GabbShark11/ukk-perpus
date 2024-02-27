<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrasi ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                        <?php 
                                            if(isset($_POST['register'])) {
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telepon = $_POST['no_telepon'];
                                                $username = ($_POST['username']);
                                                $password = md5($_POST['password']);
                                                $level = "peminjaman";
                                                $insert  = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password,level) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil! Silahkan Login."); location.href="login.php"</script>';
                                                }else{
                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="nama" placeholder="Masukkan Nama Lengkap"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="email" placeholder="Masukkan Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">No. Telepon</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="no_telepon" placeholder="Masukkan No. Telepon"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" required class="form-control py-3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="username" placeholder="Masukkan Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-2" id="inputPassword" required type="password" name="password" placeholder="Masukkan password"/>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="w-50 btn btn-primary" type="submit" name="register" value="login">Register</button>
                                            </div>
                                            <p class="d-flex justify-content-center mt-4"> Sudah Punya Akun?<a href="login.php">‎ Login</a> </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
