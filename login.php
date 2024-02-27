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
        <title>Login ke Your Libray</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="imageWrapper"">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container pt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Your Library.</h3></div>
                                    <div class="card-body">
                                        <?php 
                                            if(isset($_POST['login'])) {
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);

                                                $data = mysqli_query($koneksi, "SELECT*FROM user where username ='$username' and password='$password'");
                                                $cek = mysqli_num_rows($data);
                                                if($cek > 0 ){
                                                    $_SESSION['user'] = mysqli_fetch_array($data);
                                                    echo '<script>alert("Login Berhasil!!!"); location.href="index.php";</script>';
                                                }else {
                                                    echo '<script>alert("Maaf, Username/Password Salah")</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="inputUsername" type="text" name="username" placeholder="Enter username"/>
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="inputPassword" type="password" name="password" placeholder="Enter password"/>
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="w-50 btn btn-primary" type="submit" name="login" value="login">Login</button>
                                            </div>
                                            <p class="d-flex justify-content-center mt-4"> Belum Punya Akun? <a href="register.php">‎ Daftar</a> </p>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Your Library. </div>
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
