<?php 
	
	session_start();
	include 'koneksi.php';
	$id = $_GET['id'];

	$sql = $koneksi->query("SELECT * FROM pembayaran 
									JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
									WHERE pembayaran.id_pembayaran = '$id'");
	$data = $sql->fetch_assoc();

	if($data['id_pelanggan'] != $_SESSION['pelanggan']['id_pelanggan']){
		?>

		<script type="text/javascript">
		alert('Dilarang melihat pembayran orang lain');
		window.location.href="riwayat.php";
		</script>

		<?php
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>lihat pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- <pre>
	<?php //print_r($data); ?>
</pre>
<pre>
	<?php //print_r($_SESSION['pelanggan']); ?>
</pre> -->

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<td>Nama Penyetor</td>
						<td>:</td>
						<td><?php echo $data['nama'] ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo $data['tanggal'] ?></td>
					</tr>
					<tr>
						<td>BANK</td>
						<td>:</td>
						<td><?php echo $data['bank'] ?></td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td>:</td>
						<td><?php echo number_format($data['jumlah']) ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="struk_pembayaran/<?php echo $data['bukti'] ?>" class="img-responsive">
			</div>
		</div>
	</div>
</section>

</body>
</html>