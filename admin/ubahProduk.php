<?php 
	 
	$id = $_GET['id'];

	$sql = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
	$data = $sql->fetch_assoc();

 ?>
	
<h2>Ubah Produk</h2>

<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $data['harga_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $data['berat_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="5"><?php echo $data['deskripsi_produk'] ?></textarea>
	</div>
	<div class="form-group">
		<img src="../foto/<?php echo $data['foto_produk'] ?>" width="80">
		<!-- <input type="file" name="foto" class="form-control"> -->
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button type="submit" name="ubah" class="btn btn-primary">Ubah</button>

</form>

<?php 

	if(isset($_POST['ubah'])){

		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		$berat = $_POST['berat'];
		$deskripsi = $_POST['deskripsi'];

		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto/".$foto);

		if(!empty($foto)){

			$sql2 = $koneksi->query("UPDATE produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat',foto_produk='$foto',deskripsi_produk='$deskripsi' WHERE id_produk='$id'");

			?>

			<script type="text/javascript">
			alert('Produk berhasil diubah');
			window.location.href="index.php?halaman=produk";
			</script>

			<?php

		}else{

			$sql2 = $koneksi->query("UPDATE produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat',deskripsi_produk='$deskripsi' WHERE id_produk='$id'");
			?>

			<script type="text/javascript">
			alert('Produk berhasil diubah');
			window.location.href="index.php?halaman=produk";
			</script>
			
			<?php

		}

	}

 ?>