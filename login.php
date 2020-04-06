<?php 
	session_start();
	include 'koneksi.php';

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

<?php include 'navbar.php'; ?>

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
				<p>Belum punya account silahkan <a href="daftar.php">daftar</a></p>
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

			$_SESSION['pelanggan'] = $data;

			if(isset($_SESSION['keranjang'])){
				header('location:checkout.php');	
			}else{
				header('location:riwayat.php');
			}


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