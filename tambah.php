<?php 
require 'function.php';
if (!isset($_SESSION['id_pelajar'])) {
	header("location: index.php");
}
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

	// cek apakah data berhasil di tambahkan
	if ( tambah($_POST) > 0) {
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
	<title>Tambah Data Produk</title>
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
		<div class="card login-form-tambah">
			<div class="card-body">
				<h2 class="card-title text-center">Tambah Produk</h2>
				<div class="card-text">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<label for="nama">Nama : </label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" required>
					</div>	
					<div class="form-group">
							<label for="harga">Harga : </label>
							<input type="text" class="form-control form-control-sm" name="harga" id="harga" required>
					</div>
					<div class="form-group">
							<label for="deskripsi">Deskripsi : </label>
							<!-- <input type="text" class="form-control" rows="3" name="deskripsi" id="deskripsi" required> -->
							<textarea name="deskripsi" id="deskripsi"  rows="3" required></textarea>
					</div>
					<div class="form-group">	
							<label for="gambar">Gambar : </label>
							<input type="file" class="form-control form-control-sm" name="gambar" id="gambar">
					</div>	
							<button type="submit"  class="btn btn-primary btn-block" name="submit">Tambah Data!</button>
							<a href="dashboard.php" class="btn btn-primary btn-block">Batal</a>
					
				</form>
</body>
</html>