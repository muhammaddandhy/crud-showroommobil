<?php

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: ../login.php");
	exit;
}

require 'function.php';
$pelanggan = query("SELECT * FROM pelanggan");
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
	  <a class="active" href="index.php">Pelanggan</a>
	  <a href="../mobil/index.php">Mobil</a>
	  <a href="../pembelian/index.php">Pembelian</a>
	</div>
	<a href="../index.php">Kembali ke halaman utama</a>

	<h1>Daftar Pelanggan</h1>

	<a href="create.php">Tambah Data Pelanggan</a>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Telepon</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($pelanggan as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="update.php?pelanggan_id=<?= $row["pelanggan_id"]; ?>">edit</a> |
				<a href="delete.php?pelanggan_id=<?= $row["pelanggan_id"]; ?>">hapus</a>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td><?= $row["jenis_kelamin"]; ?></td>
			<td><?= $row["telepon"]; ?></td>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>


	</table>

</body>
</html>