<?php 
	
	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id'");
	$data = $sql->fetch_assoc();
	

	if(!$data){
		?>

		<script type="text/javascript">
		alert('access dibatasi !');
		window.location.href="index.php?halaman=pembelian";
		</script>

		<?php
	}

 ?>
<h2>halaman Konfirmasi</h2>

<div class="container">
	<div class="row">
		<div class="col-md-5">
			<table class="table">
				<tr>
					<td>Tanggal Pembayaran</td>
					<td>:</td>
					<td><?php echo $data['tanggal'] ?></td>
				</tr>
				<tr>
					<td>Penyetor</td>
					<td>:</td>
					<td><?php echo $data['nama'] ?></td>
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
		<div class="col-md-5">
			<img src="../struk_pembayaran/<?php echo $data['bukti'] ?>" class="img-responsive">
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<form method="post">
				<div class="form-group">
					<label>No Resi Pengiriman</label>
					<input type="text" name="resi" class="form-control">
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="" disabled selected>-- PILIH --</option>
						<option value="lunas">Lunas</option>
						<option value="barang dikirim">Barang dikirim</option>
						<option value="batal">batal</option>
					</select>
				</div>
				<button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
			</form>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['konfirmasi'])){

		$resi = $_POST['resi'];
		$status = $_POST['status'];

		$sql2 = $koneksi->query("UPDATE pembelian SET status_pembelian = '$status',resi='$resi' WHERE id_pembelian = '$id'");

		if($sql2){
			?>

			<script type="text/javascript">
			alert('Berhasil konfirmasi pelanggan');
			window.location.href="index.php?halaman=pembelian";
			</script>

			<?php
		}

	}

 ?>