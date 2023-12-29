<?php

require 'function.php';

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: login.php");
	exit;
}

$id = ($_GET['mobil_id']);

$p = query("SELECT * FROM mobil WHERE mobil_id = $id") [0];


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
	<title> Update Data Mobil</title>
</head>
<body>
	<h1>Update Data Mobil</h1>

	<form action="" method="post">
		<input type="hidden" name="mobil_id" value="<?= $p["mobil_id"]; ?>">
		<ul>
			<li>
				<label for="merk">Merk : </label>
				<input type="text" name="merk" id="merk" value="<?= $p["merk"]; ?>">
			</li>
			<li>
				<label for="type">Type Mobil : </label>
				<input type="text" name="type" id="type" value="<?= $p["type"]; ?>">
			</li>
			<li>
				<label for="warna">Warna: </label>
				<input type="text" name="warna" id="warna" value="<?= $p["warna"]; ?>">
			</li>
			<li>
				<label for="tahun">Tahun : </label>
				<input type="int" name="tahun" id="tahun" value="<?= $p["tahun"]; ?>">
			</li>
			<li>
				<label for="harga">Harga : </label>
				<input type="" name="harga" id="harga" value="<?= $p["harga"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Update Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>