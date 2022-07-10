<?php  
require 'function.php';
if (!isset($_SESSION['id_pelajar'])) {
	header("location: index.php");
}
// $produk = query("SELECT * FROM produk WHERE status ='Belum'"); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Dashboard</title>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Costum CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="dashboard.php">KANTIN KEJUJURAN</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				<?php $query = $conn->query("SELECT * FROM balance_box"); while ($row = $query->fetch_assoc()): ?>
					<a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
					<a class="nav-link" href="tambah.php">Tambah Produk</a>
					<a class="nav-link" href="withdraw.php"> Rp.<?= number_format($row["jumlah"]); ?></a>
					<a class="nav-link" href="logout.php">Logout</a>
				</div>
				<?php endwhile; ?>
				</div>
			</div>
		</nav>
	</header>
<body>
<div class="container-fluid py-5">
	<h2 class="text-center">Jajan Kantin</h2>
	<form action="" method="post">
			
		<div class="container">
		<div class="row">
		<?php $query = $conn->query("SELECT * FROM produk WHERE status ='Belum'"); while ($row = $query->fetch_assoc()): ?>
			<div class="col-lg-3 col-md-3" style="margin: 20px;">
				<div class="card" style="width: 18rem;">
					<img src="img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $row["nama"]; ?></h5>
						<p class="card-text">Rp.<?= number_format($row["harga"]); ?></p>
						<p class="card-text"><?= $row["deskripsi"]; ?></p>
						<a href="beli.php?id=<?= $row["id"] ?>" class="btn btn-primary">Beli</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>	
		</div>
	</div>
	</form>
	</div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>