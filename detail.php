<?php 
	
	session_start();
	include 'koneksi.php';
	$id = $_GET['id'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<?php 

	$sql_produk = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
	$data = $sql_produk->fetch_assoc();

 ?>

<!-- kontent -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto/<?php echo $data['foto_produk'] ?>" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2><?php echo $data['nama_produk'] ?></h2>
				<h4>Rp. <?php echo number_format($data['harga_produk']) ?></h4>
				<p><?php echo $data['deskripsi_produk'] ?></p>
				<h4 style="font-weight:bold;color:red;">Stok : <?php echo $data['stok_produk'] ?></h4>

				<form method="post">
					<label>Jumlah</label>
					<div class="form-group">
						<input type="number" min="1" max="<?php echo $data['stok_produk'] ?>" class="form-control" name="jumlah">
					</div>
						<button type="submit" class="btn btn-primary" name="beli">Beli</button>	
				</form>

				<?php 

					if(isset($_POST['beli'])){

						$jumlah = $_POST['jumlah'];

						$_SESSION['keranjang'][$id] = $jumlah;

						?>

						<script type="text/javascript">
						alert('Produk ditambahkan ke keranjang');
						window.location.href="keranjang.php";
						</script>

						<?php

					}

				 ?>

			</div>
		</div>		
	</div>
</section>
<!-- akhir kontent -->

</body>
</html>