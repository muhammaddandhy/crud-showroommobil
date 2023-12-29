<?php

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: ../login.php");
	exit;
}

require 'function.php';

$mobil = query("SELECT * FROM mobil");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>

	<style>

		/* Add a black background color to the top navigation */
		.topnav {
		  background-color: #333;
		  overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
		  float: left;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
		  background-color: grey;
		  color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
		  background-color: #04AA6D;
		  color: white;
		}
</style>
</head>
<body>
	<div class="topnav">
	  <a class="active" href="#">Showroom Mobil</a>
	  <a href="../pelanggan/index.php">Pelanggan</a>
	  <a class="active" href="index.php">Mobil</a>
	  <a href="../pembelian/index.php">Pembelian</a>
	</div>

	<a href="../index.php">Kembali ke halaman utama</a>

	<h1>Daftar Mobil</h1>

	<a href="create.php">Tambah Data Mobil</a>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Merk</th>
			<th>Type Mobil</th>
			<th>Warna</th>
			<th>Tahun</th>
			<th>Harga</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($mobil as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="update.php?mobil_id=<?= $row["mobil_id"]; ?>">edit</a> |
				<a href="delete.php?mobil_id=<?= $row["mobil_id"]; ?>">hapus</a>
			<td><?= $row["merk"]; ?></td>
			<td><?= $row["type"]; ?></td>
			<td><?= $row["warna"]; ?></td>
			<td><?= $row["tahun"]; ?></td>
			<td><?= $row["harga"]; ?></td>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>


	</table>

</body>
</html>