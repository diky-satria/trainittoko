<?php 
  
  session_start();
  include 'koneksi.php';
  $pelanggan = $_SESSION['pelanggan'];

  $sql_pelanggan = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$pelanggan[email_pelanggan]'");
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
							<td>
								<?php echo $data2['status_pembelian'] ?><br>
								<?php if($data2['resi'] == null): ?>
									Resi : ---
								<?php else: ?>
									Resi : <?php echo $data2['resi'] ?>
								<?php endif; ?>
							</td>
							<td>Rp. <?php echo number_format($data2['total_pembelian']) ?></td>
							<td>
								<?php if($data2['status_pembelian'] == 'pending'): ?>
								<a href="nota.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-primary">Nota</a>
								<a href="pembayaran.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
							<?php else: ?>
								<a href="nota.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-primary">Nota</a>
							<?php endif; ?>
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