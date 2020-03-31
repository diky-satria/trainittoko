<?php 
  
  $koneksi = new mysqli("localhost","root","","trainittoko");

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>home</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

  <!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
    
        <ul class="nav navbar-nav">
          
          <li><a href="">Home</a></li>
          <li><a href="">Keranjang</a></li>
          <li><a href="">Login</a></li>
          <li><a href="">Checkout</a></li>
          
        </ul>
        
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- kontent -->
  <div class="container">
    <h3>Produk Terbaru</h3> 
    <div class="row">

    <?php 

      $sql = $koneksi->query("SELECT * FROM produk");
      while($data = $sql->fetch_assoc()){

     ?>

      <div class="col-md-3">
        <div class="thumbnail">
          <img src="foto/<?php echo $data['foto_produk'] ?>">
          <div class="caption">
            <h3><?php echo $data['nama_produk'] ?></h3>
            <p>Rp. <?php echo number_format($data['harga_produk'], '0','.','.') ?></p>
            <a href="" class="btn btn-primary">Beli</a>
          </div>
        </div>
      </div>

      <?php } ?>

    </div>
  </div>
  <!-- akhir kontent -->

</body>
</html>