<?php 
  
  session_start();
  include 'koneksi.php';
  $id = $_GET['id'];

  $sql = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id'");
  $data = $sql->fetch_assoc();
  $id_pembelian = $data['id_pembelian'];
  $id_pelanggan = $data['id_pelanggan'];
  $id_pelanggan2 = $_SESSION['pelanggan']['id_pelanggan'];

  if($id_pelanggan2 !== $id_pelanggan || $data['status_pembelian'] !== 'pending'){
  	?>
  	<script type="text/javascript">
  	alert('access dibatasi !');
  	window.location.href="riwayat.php";
  	</script>
  	<?php
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>home</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

  <?php include 'navbar.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
			<h2>Konfirmasi pembayaran</h2>
			<div class="alert alert-info">Total pembayaran anda <?php echo $data['total_pembelian'] ?></div>

			<form method="post" enctype="multipart/form-data">
				
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" name="nama" class="form-control">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" name="bank" class="form-control">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="text" name="jumlah" class="form-control">
			</div>
			<div class="form-group">
				<label>Foto Bukti Pembayaran</label>
				<input type="file" name="bukti" class="form-control" required>
			</div>
			<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>

			</form>

			<?php 

				if(isset($_POST['kirim'])){

					$nama = $_POST['nama'];
					$bank = $_POST['bank'];
					$jumlah = $_POST['jumlah'];
					$tanggal = date('Y-m-d');

					$bukti = $_FILES['bukti']['name'];
					$lokasi = $_FILES['bukti']['tmp_name'];
					move_uploaded_file($lokasi, 'struk_pembayaran/'.$bukti);

					$sql2 = $koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$id','$nama','$bank','$jumlah','$tanggal','$bukti')");

					$sql3 = $koneksi->query("UPDATE pembelian SET status_pembelian = 'sudah bayar' WHERE id_pembelian='$id'");

					?>

					<script type="text/javascript">
					alert('berhasil melakukan konfirmasi pembayaran');
					window.location.href="riwayat.php";
					</script>

					<?php
				}

			 ?>

			</div>
		</div>
	</div>
</section>

</body>
</html>