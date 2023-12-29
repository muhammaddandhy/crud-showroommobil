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
	<title> Tambah data pembelian</title>
</head>
<body>
	<h1>Tambah data pembelian</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="pelanggan_id">pelanggan_id : </label>
				<input type="text" name="pelanggan_id" id="pelanggan_id">
			</li>
			<li>
				<label for="mobil_id">mobil_id : </label>
				<input type="text" name="mobil_id" id="mobil_id">
			</li>
			<li>
				<label for="tanggal_beli">Tanggal Beli : </label>
				<input type="date" name="tanggal_beli" id="tanggal_beli">
			</li>
			<li>
			   <label for="pembayaran">Pembayaran : </label>
			   <form action="" method="post">
			   <select name="pembayaran">
			   <option value="">Pilih</option>
			   <option value="Cash">Cash</option>
			   <option value="Kredit">Kredit</option>
			</select>
			</form>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data !</button>
			</li>
		</ul>
	</form>

</body>
</html>