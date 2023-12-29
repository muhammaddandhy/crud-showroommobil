<?php

require 'function.php';

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: login.php");
	exit;
}

$id = ($_GET['pembelian_id']);

$pb = query("SELECT * FROM pembelian WHERE pembelian_id = $id") [0];


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
	<title> Update data pembelian</title>
</head>
<body>
	<h1>Update data pembelian</h1>

	<form action="" method="post">
		<input type="hidden" name="pembelian_id" value="<?= $pb["pembelian_id"]; ?>">
		<ul>
			<li>
				<label for="pelanggan_id">pelanggan_id : </label>
				<input type="text" name="pelanggan_id" id="pelanggan_id" value="<?= $pb["pelanggan_id"]; ?>">
			</li>
			<li>
				<label for="mobil_id">mobil_id : </label>
				<input type="text" name="mobil_id" id="mobil_id" value="<?= $pb["mobil_id"]; ?>">
			</li>
			<li>
				<label for="tanggal_beli">Tanggal Beli : </label>
				<input type="text" name="tanggal_beli" id="tanggal_beli" value="<?= $pb["tanggal_beli"]; ?>">
			</li>
			<li>
				<label for="pembayaran">pembayaran : </label>
				<input type="text" name="pembayaran" id="pembayaran" value="<?= $pb["pembayaran"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Update Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>