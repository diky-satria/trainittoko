<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
	$data = $sql->fetch_assoc();

	$foto = $data['foto_produk'];

	if(file_exists("../foto/".$foto)){
		unlink("../foto/".$foto);
	}

	$sql2 = $koneksi->query("DELETE FROM produk WHERE id_produk='$id'");

	if($sql2){
		?>

		<script type="text/javascript">
		alert('Produk berhasil dihapus');
		window.location.href="index.php?halaman=produk";
		</script>

		<?php
	}else{
		?>

		<script type="text/javascript">
		alert('Produk gagal dihapus');
		window.location.href="index.php?halaman=produk";
		</script>

		<?php
	}

 ?>