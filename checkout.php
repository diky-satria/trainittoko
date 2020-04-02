<?php session_start(); ?>
<?php 

	if(!$_SESSION['pelanggan']){
		?>

		<script type="text/javascript">
		alert('Anda belum Login, silahkan Login');
		window.location.href="login.php";
		</script>

		<?php
	}else{

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
    
        <ul class="nav navbar-nav">
          
          <li><a href="index.php">Home</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <?php if(isset($_SESSION['pelanggan'])): ?>
          	<li><a href="logout.php">Logout</a></li>
          <?php else: ?>
          	<li><a href="login.php">Login</a></li>
          <?php endif; ?>
          <li><a href="checkout.php">Checkout</a></li>
          
        </ul>
        
    </div>
  </nav>
  <!-- akhir navbar -->

  <pre>
	<?php echo $_SESSION['pelanggan'] ?>
</pre>

</body>
</html>

<?php } ?>