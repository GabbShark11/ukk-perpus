<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Your Library.</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,600;0,700;0,800;0,900;1,100;1,200;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-4" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <!-- Navbar-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu" style="width: 1px;" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="logout.php">
                            <div style="color: black;" class="sb-nav-link-icon fs-5"><i class="fas fa-power-off mx-3 "></i>Logout</div>
                        </a>  
                    </ul>
                </li>
                <a class="navbar-brand ps-3" style="font-family: 'Poppins', sans serif; font-weight: 600; " href="index.php">Your <span style="color: yellow;"">Library. </span></a>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading"><hr></<hr></div>
                            <?php 
                                if($_SESSION['user']['level'] != 'peminjam'){
                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <?php 
                                }else{
                            ?>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Ulasan
                            </a>

                            <?php 
                                if($_SESSION['user']['level'] != 'peminjam'){
                            ?>
                                <a class="nav-link" href="?page=laporan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                    Laporan Peminjaman
                                </a>
                            <?php 
                                } 
                                ?>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    
                    <?php 
                        echo $_SESSION['user']['nama']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                                include '404.php';
                            }
                        ?>
                    </div>
                </main> 
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
