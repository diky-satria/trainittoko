<?php 
    
    $koneksi = new mysqli("localhost","root","","trainittoko");

    session_start();
    if(!$_SESSION['username']){
        header('location:login.php');
    }else{

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
    <!-- Import CDN DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
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
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-dashboard"></i> Produk</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-dashboard"></i> Pembelian</a></li>
                    <li><a data-toggle="modal" data-target="#exampleModal"><i class="fa fa-dashboard"></i> Laporan</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-dashboard"></i> Pelanggan</a></li>
                    <li><a href="logout.php"><i class="fa fa-dashboard"></i> Logout</a></li>
                     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
            <?php 

                if(isset($_GET['halaman'])){
                    if($_GET['halaman'] == 'produk'){
                        include 'produk.php';
                    }elseif($_GET['halaman'] == 'pelanggan'){
                        include 'pelanggan.php';
                    }elseif($_GET['halaman'] == 'pembelian'){
                        include 'pembelian.php';
                    }elseif($_GET['halaman'] == 'detail'){
                        include 'detail.php';
                    }elseif($_GET['halaman'] == 'tambahProduk'){
                        include 'tambahProduk.php';
                    }elseif($_GET['halaman'] == 'hapusProduk'){
                        include 'hapusProduk.php';
                    }elseif($_GET['halaman'] == 'ubahProduk'){
                        include 'ubahProduk.php';
                    }elseif($_GET['halaman'] == 'konfirmasi'){
                        include 'konfirmasi.php';
                    }elseif($_GET['halaman'] == 'laporan'){
                        include 'laporan.php';
                    }
                }else{
                    include 'home.php';
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <!-- Import DataTables -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Laporan Pembelian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form method="post" action="index.php?halaman=laporan">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tglm" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgls" class="form-control">
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
            </form>
          </div>
        </div>
      </div>
    </div>
   
</body>
</html>

<?php } ?>
