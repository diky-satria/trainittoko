<?php 
	
	error_reporting(0);
	$koneksi = new mysqli("localhost","root","","trainittoko");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>nota</title>
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

<?php 
	
	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM pembelian
							JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
							WHERE pembelian.id_pembelian='$id'");
	$data = $sql->fetch_assoc();

 ?>

 <div class="container">
	<h2>Data detail</h2>

	<strong><?php echo $data['nama_lengkap'] ?></strong>
	<p>
		<?php echo $data['telepon_pelanggan'] ?><br>
		<?php echo $data['email_pelanggan'] ?>
	</p>
	<p>
		Tanggal : <?php echo date('d-M-Y', strtotime($data['tanggal_pembelian'])) ?><br>
		Total   : Rp.&nbsp;&nbsp;<?php echo number_format($data['total_pembelian'], '0','.','.') ?>
	</p>

	<table class="table table-bordered table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Sub-Total</th>
			</tr>
		</thead>
		<tbody>

			<?php 

				$no =1;
				$sql2 = $koneksi->query("SELECT * FROM pembelian_produk
										JOIN produk ON pembelian_produk.id_produk=produk.id_produk
										WHERE pembelian_produk.id_pembelian='$id'");
				while($data2 = $sql2->fetch_assoc()){
					$subTotal = $data2['harga_produk']*$data2['jumlah']
			 ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data2['nama_produk'] ?></td>
				<td><?php echo number_format($data2['harga_produk'], '0','.','.') ?></td>
				<td><?php echo $data2['jumlah'] ?></td>
				<td><?php echo number_format($subTotal, '0','.','.') ?></td>
			</tr>

			<?php 

				$jumlah_barang = $jumlah_barang + $data2['jumlah'];
				$jumlah_bayar = $jumlah_bayar + $subTotal;

			 ?>

			<?php } ?>
			<tr>
				<th colspan="3" style="text-align:center;">Total</th>
				<td>
					<?php 
						echo $jumlah_barang;
					 ?>
				</td>
				<td>
					<?php 
						echo $jumlah_bayar;
					 ?>
				</td>
			</tr>

		</tbody>
	</table>

	<div class="row">
		<div class="col-md">
			<div class="alert alert-info">
				Silahkan lakukan pembayaran sebesar <?php echo number_format($jumlah_bayar) ?> ke 123456
			</div>
		</div>
	</div>

</div>

</body>
</html>