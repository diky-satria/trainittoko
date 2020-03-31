<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="5"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

</form>

<?php 

	if(isset($_POST['simpan'])){

		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		$berat = $_POST['berat'];
		$deskripsi = $_POST['deskripsi'];

		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto/".$foto);	

		if(!empty($foto)){

			$sql = $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) VALUES ('$nama','$harga','$berat','$foto','$deskripsi')");

			?>

			<script type="text/javascript">
			alert('Produk berhasil ditambahkan');
			window.location.href="index.php?halaman=produk";
			</script>

			<?php
		}else{

			$sql2 = $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) VALUES ('$nama','$harga','$berat','dadu.png','$deskripsi')");

			?>

			<script type="text/javascript">
			alert('Produk berhasil ditambahkan');
			window.location.href="index.php?halaman=produk";
			</script>

			<?php 
		}

	}

 ?>