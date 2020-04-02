<?php 
	
	session_start();
	$id = $_GET['id'];

	unset($_SESSION['keranjang'][$id]);

	?>

	<script type="text/javascript">
	alert('Barang telah dihapus');
	window.location.href="keranjang.php";
	</script>

	<?php

 ?>