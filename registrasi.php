<?php 
require 'function.php';

if (isset($_POST["register"])) {
	
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('Registrasi Berhasil')
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Registrasi</title>
	
	<!-- Boostrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
	<!-- Google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<!-- Costum CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="global-container">
		<div class="card login-form-reg">
			<div class="card-body">
				<h1 class="card-title text-center">Registrasi</h1>
				<div class="card-text">
				<form action="" method="post">
					<div class="form-group">

							<label for="id_pelajar">ID Student :</label>
							<input type="text" class="form-control form-control-sm" name="id_pelajar" id="id_pelajar" required="">
					</div>
					<div class="form-group">	
							<label for="nama">Name :</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" required="">
					</div>
					<div class="form-group">		
							<label for="password">Password :</label>
							<input type="password" class="form-control form-control-sm" name="password" id="password" required="">
					</div>
					<div class="form-group">		
							<label for="password2">Confirm Password :</label>
							<input type="password" class="form-control form-control-sm" name="password2" id="password2" required="">
					</div>	
							<button type="submit" class="btn btn-primary btn-block" name="register">Registrasi</button>
				</form>	
				</div>
			</div>
		</div>
	</div>




</body>
</html>