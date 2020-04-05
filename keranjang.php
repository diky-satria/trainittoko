<?php 
	
	error_reporting(0);
	session_start();
	include 'koneksi.php';

	if(!$_SESSION['keranjang']){
		?>

		<script type="text/javascript">
		alert('Anda belum memilih barang');
		window.location.href="index.php";
		</script>

		<?php
	}else{

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
          <li><a href="login.php">Login</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          
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
						<th>Berat (Gr)</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub-Total</th>
						<th>Aksi</th>
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
						<td><?php echo $data['berat_produk'] ?></td>
						<td><?php echo number_format($data['harga_produk']) ?></td>
						<td><?php echo $jumlah ?></td>
						<td><?php $subtotal =$data['harga_produk']*$jumlah; 
						echo number_format($subtotal);
						?></td>
						<td>
							<a href="hapusKeranjang.php?id=<?php echo $id ?>" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>

					<?php 
							$total_barang = $total_barang + $jumlah;
							$total_bayar = $total_bayar + $subtotal;

						 ?>

					<?php }} ?>
					<tr>
						<th colspan="4">Total</th>
						<td><?php echo $total_barang ?></td>
						<td colspan="2"><?php echo number_format($total_bayar) ?></td>
					</tr>

				</tbody>
			</table>
			<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>
    	</div>
    </div>
  </div>

</body>
</html>

<?php } ?>