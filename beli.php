<?php 
require 'function.php';
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
	// cek apakah data berhasil di tambahkan
	if ( beli($_POST) > 0) {
		echo "
			<script>
				alert('Produk berhasil dibeli!');
				document.location.href = 'dashboard.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Produk berhasildibeli!');
				document.location.href = 'dashboard.php';
			</script>";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bayar Produk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Beli</title>
	
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
		<div class="card login-form">
			<div class="card-body">
				<h1 class="card-title text-center">Bayar</h1>
				<div class="card-text">	 
				<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
				
				<!-- <div class="form-group">
					<label for="nama">Nama : </label>
					<input type="text" class="form-control form-control-sm" name="nama" id="nama" required>
				</div>
				<div class="form-group">
					<label for="harga">Harga : </label>
					<input type="text" class="form-control form-control-sm" name="harga" id="harga" required>
				</div> -->
					<!-- <label for="deksripsi">Deskripsi : </label>
					<input type="text" name="deksripsi" id="deksripsi" required>
				
					<label for="gambar">Gambar : </label>
					<input type="file" name="gambar" id="gambar"> -->
				<div class="form-group">
					<label for="jumlah">Jumlah Bayar : </label>
					<input type="text" class="form-control form-control-sm" name="jumlah" id="jumlah">
				</div>
					<button type="submit"  class="btn btn-primary btn-block" name="submit">Bayar!</button>
					<a href="dashboard.php" class="btn btn-primary btn-block">Batal</a>
	
			</div>
		</div>		
	</div>
	</form>
</body>
</html>