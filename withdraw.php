<?php 
require 'function.php';
if (!isset($_SESSION['id_pelajar'])) {
	header("location: index.php");
}
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

	// cek apakah data berhasil di tambahkan
	if ( withdraw($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tarik Uang</title>
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
	<h1>Tarik Uang</h1>
	<div class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h1 class="card-title text-center">Tarik Uang</h1>
					<div class="card-text">	 
					<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
					<label for="jumlah">Jumlah Tarik Uang: </label>
					<input type="text" class="form-control form-control-sm" name="jumlah" id="jumlah">
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="submit">Tarik Uang</button>
					<a href="dashboard.php" class="btn btn-primary btn-block">Batal</a>
					</form>
				</div>
			</div>
		</div>				
</body>
</html>