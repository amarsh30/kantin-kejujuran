<?php 
require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data produk berdasarkan id
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

	// cek apakah data berhasil diubah
	if ( ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Produk</title>
</head>
<body>
	<h1>Ubah Data Produk</h1>

	<form action="" method="post"  enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $produk["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" size="40" name="nama" id="nama" required 
				value="<?= $produk["nama"]; ?>">
			</li>
			<li>
				<label for="harga">Harga : </label>
				<input type="text" name="harga" id="harga" required
				value="<?= $produk["harga"]; ?>">
			</li>
			<li>
				<label for="stok">Stok : </label>
				<input type="text" name="stok" id="stok" required
				value="<?= $produk["stok"]; ?>">
			</li>
			<li>
				<label for="size">Size : </label>
				<input type="text" name="size" id="size" required
				value="<?= $produk["size"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<img src="img/<?= $produk['gambar']; ?>">
				<input type="file" name="gambar" id="gambar">
			</li>
			
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>
		
	</form>
</body>
</html>