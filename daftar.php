<?php 
	
	include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>daftar</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading">LOGIN</div>
				  <div class="panel-body">
				    <form method="post">
						<label>Nama</label>
						<div class="form-group">
						  	<input type="text" class="form-control" name="nama">	
						</div>
						<label>Email</label>
						<div class="form-group">
						  	<input type="text" class="form-control" name="email">	
						</div>
						<label>Alamat</label>
						<div class="form-group">
							<textarea class="form-control" name="alamat" rors="3"></textarea>	
						</div>
						<label>Telepon</label>
						<div class="form-group">
						  	<input type="text" class="form-control" name="telepon">	
						</div>
						<label>Password</label>
						<div class="form-group">
						  	<input type="password" class="form-control" name="password">	
						</div>
						<br>
						<button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
					</form>

					<?php 

						if(isset($_POST['daftar'])){

							$nama = $_POST['nama'];
							$email = $_POST['email'];
							$alamat = $_POST['alamat'];
							$telepon = $_POST['telepon'];
							$password = $_POST['password'];

							$sql = $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_lengkap,alamat_pelanggan,telepon_pelanggan) VALUES ('$email','$password','$nama','$alamat','$telepon')");

							if($sql){
								?>

								<script type="text/javascript">
								alert('Berhasil daftar, silahkan Login');
								window.location.href="login.php";
								</script>

								<?php
							}

						}

					 ?>

				  </div>
			</div>

			</div>
		</div>
	</div>
</section>

</body>
</html>