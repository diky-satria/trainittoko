<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","trainittoko");

	if(isset($_SESSION['pelanggan'])){
		header('location:checkout.php');
	}else{

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
    
        <ul class="nav navbar-nav">
          
          <li><a href="index.php">Home</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          
        </ul>
        
    </div>
  </nav>
  <!-- akhir navbar -->

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-3">
			
			<div class="panel panel-default">
			  <div class="panel-heading">LOGIN</div>
			  <div class="panel-body">
			    <form method="post">
					<div class="input-group">
						<label>Email</label>
						<div class="col-md-12">
					  		<input type="text" class="form-control" name="email">	
						</div>
					</div>
					<div class="input-group">
						<label>Password</label>
						<div class="col-md-12">
					  		<input type="password" class="form-control" name="password">	
						</div>
					</div><br>
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>
			  </div>
			</div>

		</div>
	</div>
</div>

</body>
</html>

<?php 

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
		$data = $sql->fetch_assoc();
		$email2 = $data['email_pelanggan'];
		$password2 = $data['password_pelanggan'];

		if($email == $email2 && $password == $password2){

			$_SESSION['pelanggan'] = $email2;
			header('location:checkout.php');

		}else{
			?>

			<script type="text/javascript">
			alert('Email dan Password tidak sesuai');
			</script>

			<?php
		}

	}

 ?>

 <?php } ?>