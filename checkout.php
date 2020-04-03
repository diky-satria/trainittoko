<?php 

  session_start();
  error_reporting(0);

  $koneksi = new mysqli("localhost","root","","trainittoko");

	if(!$_SESSION['pelanggan']){
		?>

		<script type="text/javascript">
		alert('Anda belum Login, silahkan Login');
		window.location.href="login.php";
		</script>

		<?php
	}else{

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
    
        <ul class="nav navbar-nav">
          
          <li><a href="index.php">Home</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <?php if(isset($_SESSION['pelanggan'])): ?>
          	<li><a href="logout.php">Logout</a></li>
          <?php else: ?>
          	<li><a href="login.php">Login</a></li>
          <?php endif; ?>
          <li><a href="checkout.php">Checkout</a></li>
          
        </ul>
        
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- ini untuk pre -->
  <?php 

    $session_pelanggan = $_SESSION['pelanggan'];
    $sql_pelanggan = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$session_pelanggan'");
    $get_pelanggan = $sql_pelanggan->fetch_assoc();

   ?>
   <!-- akhir untuk pre -->

  <!-- kontent -->
  <div class="container">
    <h3>Produk Terbaru</h3> 
    <div class="row">
      <div class="col-md">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub-Total</th>
          </tr>
        </thead>
        <tbody>

          <?php 
            $no = 1;
            foreach($_SESSION['keranjang'] as $id => $jumlah){
              $sql = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
              while($data = $sql->fetch_assoc()){
           ?>

          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_produk'] ?></td>
            <td><?php echo number_format($data['harga_produk']) ?></td>
            <td><?php echo $jumlah ?></td>
            <td><?php $subtotal =$data['harga_produk']*$jumlah; 
            echo number_format($subtotal);
            ?></td>
          </tr>

          <?php 
              
              $total_barang = $total_barang + $jumlah;
              $total_bayar = $total_bayar + $subtotal;

             ?>

          <?php }} ?>
          <tr>
            <th colspan="3">Total</th>
            <td><?php echo $total_barang ?></td>
            <td colspan="2"><?php echo number_format($total_bayar) ?></td>
          </tr>

        </tbody>
      </table>

      <form method="post">
          
          <div class="row">
            <div class="col-md-4">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" readonly="" value="<?php echo $get_pelanggan['nama_lengkap'] ?>">
            </div>
            <div class="col-md-4">
              <label>Telepon</label>
              <input type="text" name="telepon" class="form-control" readonly="" value="<?php echo $get_pelanggan['telepon_pelanggan'] ?>">
            </div>
            <div class="col-md-4">
              <label>Ongkir</label>
              <select class="form-control" name="ongkir">
                <option value="" disabled selected>-- Pilih Ongkir --</option>
                <?php 
                  $sql_ongkir = $koneksi->query("SELECT * FROM ongkir");
                  while($ongkir = $sql_ongkir->fetch_assoc()){
                ?>
                <option value="<?php echo $ongkir['id_ongkir'] ?>"><?php echo $ongkir['nama_kota'] ?> Rp. <?php echo number_format($ongkir['tarif']) ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <button type="submit" name="checkout" class="btn btn-primary" style="margin-top:15px;">Checkout</button>
      </form>

      </div>
    </div>
  </div>
  <!-- akhir kontent -->

  <pre>
    <?php print_r($_SESSION['keranjang']) ?>
  </pre>

</body>
</html>

<?php } ?>

<?php 

  if(isset($_POST['checkout'])){

    $pelanggan = $get_pelanggan['id_pelanggan'];
    $tgl_pembelian = date('Y-m-d');
    $ongkir = $_POST['ongkir'];

    $sql_ongkir2 = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$ongkir'");
    $data_ongkir2 = $sql_ongkir2->fetch_assoc();

    $total_beli = $total_bayar + $data_ongkir2['tarif'];

    //insert data pembelian 
    $sql_pembelian = $koneksi->query("INSERT INTO pembelian (id_ongkir,id_pelanggan,tanggal_pembelian,total_pembelian) VALUES ('$ongkir','$pelanggan','$tgl_pembelian','$total_beli')");

    // mendapatkan id_pembelian yang baru saja terjadi
    $id_pembelian_barusan = $koneksi->insert_id;

    //proses insert barang yang dibeli
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah_produk) {
      
      $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah_produk')");

    }

    //setelah di insert lalu halaman keranjang kosong, maka dihapus
    unset($_SESSION['keranjang']);

    ?>

    <script type="text/javascript">
    alert('Berhasil checkout, silahkan lakukan proses pembayaran');
    window.location.href="nota.php?id=<?php echo $id_pembelian_barusan ?>";
    </script>

    <?php

  }

 ?>