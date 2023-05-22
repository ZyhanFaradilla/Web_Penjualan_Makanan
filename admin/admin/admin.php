<?php
include('config/cekadmin.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman admin DISHSERVE</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php"> DISHSERVE </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center"><!--
                    <img  src="assets/img/find_user.png" class="user-image img-responsive"/> -->
                    <br>
                      <div class="image">
                    <?php $username = $_SESSION['username']; ?>
                    <?php echo "<b style='color:white;'>". $_SESSION['username']."</b>"; ?>
                    
                </div>
                <br>
          </li>
        
          
                    <li>
                        <a class="active-menu"  href="?page=admin"><i class="fa fa-home fa-3x"></i> Home</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=admin">Minuman</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=makanan">Makanan</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=menu_paket">Menu Paket</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=jns_makanan">Jenis Makanan</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=jns_minuman">Jenis Minuman</a>
                            </li>
                        </ul>
                      </li>  
                        <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Lihat Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=admin&aksi=tampil_barang">Minuman</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=lihat_makanan">Makanan</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=lihat_menu">Menu Paket</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=lihat_jns_makanan">Jenis Makanan</a>
                            </li>
                            <li>
                                <a href="?page=admin&aksi=lihat_jns_minuman">Jenis Minuman</a>
                            </li>
                        </ul>
                      </li> 
                       <li  >
                        <a  href="?page=admin&aksi=data_transaksi"><i class="fa fa-book fa-3x"></i> Data Transaksi </a>
                        </li>
                    <li  >
                        <a  href="?page=user"><i class="fa fa-user fa-3x"></i> Manage User </a>
                    </li>       
                          
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2> Administrator</h2>   
                        <h5>Welcome <?php echo "<b style='color:dodgerblue;'>". $_SESSION['username']."</b>"; ?> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <?php
                 $page =@$_GET['page'];
                 $aksi =@$_GET['aksi'];
                 if ($page =="admin") {
                    if ($aksi=="") {
                      include 'input_minuman.php';
                        # code...
                    }elseif ($aksi=="tampil_barang") {
                       include 'lihat_minuman.php';
                    }elseif ($aksi=="hapus_barang") {
                       include 'hapus_minuman.php';
                    }elseif ($aksi=="makanan") {
                       include 'input_makanan.php';
                    }elseif ($aksi=="lihat_makanan") {
                       include 'lihat_makanan.php';
                    }elseif ($aksi=="hapus_makanan") {
                        include 'hapus_makanan.php';
                    }elseif ($aksi=="menu_paket") {
                        include 'input_menu_paket.php';
                    }elseif ($aksi=="lihat_menu") {
                        include 'lihat_menu_paket.php';
                    }elseif ($aksi=="hapus_menu") {
                        include 'hapus_menu_paket.php';
                    }elseif ($aksi=="jns_makanan") {
                        include 'input_jns_makanan.php';
                     }elseif ($aksi=="lihat_jns_makanan") {
                        include 'lihat_jns_makanan.php';
                     }elseif ($aksi=="hapus_jns_makanan") {
                         include 'hapus_jns_makanan.php';
                    }elseif ($aksi=="jns_minuman") {
                        include 'input_jns_minuman.php';
                    }elseif ($aksi=="lihat_jns_minuman") {
                        include 'lihat_jns_minuman.php';
                    }elseif ($aksi=="hapus_jns_minuman") {
                        include 'hapus_jns_minuman.php';
                    }elseif ($aksi=="data_transaksi") {
                       include 'lihat_transaksi.php';
                    }elseif ($aksi=="cetak") {
                       include 'laporan.php';
                    }elseif ($aksi=="lap") {
                       include 'cetakid.php';
                    }

                      # code...
                  } elseif ($page=="user") {
                    if ($aksi=="") {
                        include 'latihan.php';
                        # code...
                    }elseif ($aksi=="lainjuga") {
                        echo "lain juga";
                        # code...
                    }
                      # code...
                  }elseif ($page=="") {
                    echo "SELAMAT DATANG DI HALAMAN ADMIN DISHSERVE";

                      # code...
                  }else{
                    echo " 404 Not Found . Halaman tidak ditemukan !!";
                  }


                  ?>


               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
           <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
