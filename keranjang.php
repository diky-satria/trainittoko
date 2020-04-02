<?php 
	
	error_reporting(0);
	session_start();
	$koneksi = new mysqli("localhost","root","","trainittoko");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>keranjang</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
    
        <ul class="nav navbar-nav">
          
          <li><a href="index.php">Home</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
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
    	<div class="col-md">
    		<pre>
				<?php print_r($_SESSION['keranjang']); ?>
			</pre>
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
						<td><?php echo number_format($total_bayar) ?></td>
					</tr>

				</tbody>
			</table>
			<a href="" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="" class="btn btn-primary">Checkout</a>
    	</div>
    </div>
  </div>

</body>
</html>