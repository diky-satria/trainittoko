<?php 
	session_start();

	$id = $_GET['id'];

	//jika sudah ada barangnya maka ditambah 1
	if(isset($_SESSION['keranjang'][$id])){
		$_SESSION['keranjang'][$id]+=1;
	}
	//jika belum ada barangnya maka jumlahnya 1
	else{
		$_SESSION['keranjang'][$id]=1;
	}

 ?>
 
 <script type="text/javascript">
 alert('Barang telah ditambah ke keranjang belanja');
 window.location.href="keranjang.php";
 </script>