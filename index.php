<?php 
  
  include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>home</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

  <?php include 'navbar.php'; ?>

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
            <a href="beli.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-primary">Beli</a>
            <a href="detail.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-default">Detail</a>
          </div>
        </div>
      </div>

      <?php } ?>

    </div>
  </div>
  <!-- akhir kontent -->

</body>
</html>