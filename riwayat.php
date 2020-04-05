<?php 
  
  session_start();
  include 'koneksi.php';
  $email = $_SESSION['pelanggan'];

  $sql_pelanggan = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
  $data = $sql_pelanggan->fetch_assoc();
  $id = $data['id_pelanggan'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>riwayat</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<pre>
	<?php print_r($data) ?>
</pre>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md">
				
				<h3>Riwayat belanja <?php echo $data['nama_lengkap'] ?></h3>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Total</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>

						<?php 

							$no=1;
							$sqlPembelianByIdPelanggan = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id'");
							while($data2 = $sqlPembelianByIdPelanggan->fetch_assoc()){

						 ?>

						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data2['tanggal_pembelian'] ?></td>
							<td><?php echo $data2['status_pembelian'] ?></td>
							<td>Rp. <?php echo number_format($data2['total_pembelian']) ?></td>
							<td>
								<a href="nota.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-primary">Nota</a>
								<a href="" class="btn btn-success">Pembayaran</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</section>

</body>
</html>