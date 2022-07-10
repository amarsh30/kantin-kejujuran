<?php 
session_start();
// koneksi ke database
$conn = mysqli_connect("emansj.net", "emnsjnet_amr", "sFVeEujI", "emnsjnet_amr");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
 	$rows = [];
 	while( $row = mysqli_fetch_assoc($result) ) {
 		$rows[] = $row;
 	}
 	return $rows;

 }


function tambah($data) {
	global $conn;
	// ambil data dari setiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	// upload gambar
	$gambar = upload();
	if (!$gambar ) {
		 return false;
	}

	// query insert data
	$query = "INSERT INTO produk
				VALUES
				('', '$nama', '$harga', '$deskripsi','$gambar', 'Belum')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if ($error === 4 ) {
		echo "
			<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar)); 
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) 
	{
		echo "<script>
				alert('yang ada upload bukan gambar!');
			</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "
			<script>
				alert('Ukuran Gambar terlalu besar!');
			</script>";
		return false;
	}
	
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function beli($data) {
	global $conn;
	// ambil data dari setiap elemen dalam form

	$id = $data["id"];
	$jumlah = $data["jumlah"];

	$query = "UPDATE balance_box SET 
				jumlah = jumlah + $jumlah
			";

	$query2 = "UPDATE produk SET 
				status = 'Terjual' 
			  WHERE id = $id
			";		
	
 
	mysqli_query($conn, $query);
	mysqli_query($conn, $query2);

	return mysqli_affected_rows($conn);
}

function withdraw($data) {
	global $conn;
	// ambil data dari setiap elemen dalam form

	$jumlah = $data["jumlah"];

	$query = "UPDATE balance_box SET 
				jumlah = jumlah - $jumlah
			";
 
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$id_pelajar = strtolower(stripcslashes($data["id_pelajar"]));
	$nama = stripcslashes($data["nama"]);
	$password = mysqli_real_escape_String($conn, $data["password"]);
	$password2 = mysqli_real_escape_String($conn, $data["password2"]);

	// id sudah ada atau belum
	$result = mysqli_query($conn, "SELECT id_pelajar FROM users WHERE id_pelajar = '$id_pelajar'");
	
	if (mysqli_fetch_assoc($result)) 
	{
		echo "<script>
				alert('ID Student sudah terdaftar!')
			  </script>";
		return false;	  
	}



	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('Confim Password Wrong!')
			  </script>";
		return false;
	}

	// cek Validasi ID
	if (array_sum(str_split(substr($id_pelajar, 0, 3))) != substr($id_pelajar, 3, 2) or strlen($id_pelajar) != 5) {
		echo "<script>
				alert('ID Student tidak valid!')
			  </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('$id_pelajar', '$nama', '$password')");

	return mysqli_affected_rows($conn);

}


 ?>
