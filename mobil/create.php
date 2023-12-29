<?php

require 'function.php';

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: login.php");
	exit;
}

if ( isset($_POST["submit"]) ) {


	if (create($_POST) > 0 ) {
	
	echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>";

	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>";
	}
}

 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Tambah Data Mobil</title>
</head>
<body>
	<h1>Tambah Data Mobil</h1>

	<form action="" method="post">
		<ul>
			<li>
			   <label for="merk">Merk : </label>
			   <form action="" method="post">
			   <select name="merk">
			   <option value="">Pilih Merk</option>
			   <option value="Toyota">Toyota</option>
			   <option value="Honda">Honda</option>
			   <option value="Daihatsu">Daihatsu</option>
			   <option value="Suzuki">Suzuki</option>
			   <option value="Mitsubishi">Mitsubishi</option>
			   <option value="Isuzu">Isuzu</option>
			</select>
			</form>
			</li>
			<li>
				<label for="type">Type : </label>
				<input type="text" name="type" id="type">
			</li>
			<li>
				<label for="warna">Warna : </label>
				<input type="text" name="warna" id="warna">
			</li>
			<li>
				<label for="tahun">Tahun : </label>
				<input type="int" name="tahun" id="tahun">
			</li>
			<li>
				<label for="harga">Harga : </label>
				<input type="int" name="harga" id="harga">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>