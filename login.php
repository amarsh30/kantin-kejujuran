<?php 
require 'function.php';

if (isset($_POST["login"])) {
	
	$id_pelajar = $_POST["id_pelajar"];
	$password   = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE id_pelajar = '$id_pelajar'");

	// cek id pelajar
	if (mysqli_num_rows($result) === 1) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			$_SESSION['id_pelajar'] = $row['id_pelajar'];
			$_SESSION['nama'] = $row['nama'];
			header("Location: dashboard.php");
			exit;
		}
	}
	$error = true;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
	<!-- Boostrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
	<!-- Google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<!-- Costum CSS -->
	<link rel="stylesheet" href="style.css">

	<?php if (isset($error)) : ?>
		<p style="color: red; font-style: italic;">Id/password salah</p>
	<?php endif ?>	

	<div class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h1 class="card-title text-center">Login</h1>
				<div class="card-text">	 
				<form action="" method="post">
					<div class="form-group">
						<label for="id_pelajar">ID Student :</label>
						<input type="text"  class="form-control form-control-sm" name="id_pelajar" id="id_pelajar">
					</div>
					<div class="form-group">
						<label for="password">Password :</label>
						<input type="password"  class="form-control form-control-sm" name="password" id="password">
					</div>
						<button type="submit"  class="btn btn-primary btn-block" name="login">Login</button>

	</form>

</body>
</html>