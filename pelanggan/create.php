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
	<title> Tambah data pelanggan</title>
</head>
<body>
	<h1>Tambah data pelanggan</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="alamat">Alamat : </label>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
			   <label for="jenis_kelamin">Jenis Kelamin : </label>
			   <form action="" method="post">
			   <select name="jenis_kelamin">
			   <option value="">Pilih</option>
			   <option value="Laki-laki">Laki-laki</option>
			   <option value="Perempuan">Perempuan</option>
			</select>
			</form>
			</li>
			<li>
				<label for="telepon">Telepon : </label>
				<input type="text" name="telepon" id="telepon">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>