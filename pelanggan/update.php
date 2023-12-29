<?php

require 'function.php';

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: login.php");
	exit;
}

$id = ($_GET['pelanggan_id']);

$p = query("SELECT * FROM pelanggan WHERE pelanggan_id = $id") [0];


if ( isset($_POST["submit"]) ) {


	if (update($_POST) > 0 ) {
	
	echo "
		<script>
			alert('data berhasil update');
			document.location.href = 'index.php';
		</script>";

	} else {
		echo "
			<script>
				alert('data gagal update');
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
	<title> Update data pelanggan</title>
</head>
<body>
	<h1>Update data pelanggan</h1>

	<form action="" method="post">
		<input type="hidden" name="pelanggan_id" value="<?= $p["pelanggan_id"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?= $p["nama"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat : </label>
				<input type="text" name="alamat" id="alamat" value="<?= $p["alamat"]; ?>">
			</li>
			<li>
				<label for="jenis_kelamin">Jenis Kelamin : </label>
				<input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= $p["jenis_kelamin"]; ?>">
			</li>
			<li>
				<label for="telepon">Telepon : </label>
				<input type="text" name="telepon" id="telepon" value="<?= $p["telepon"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Update Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>