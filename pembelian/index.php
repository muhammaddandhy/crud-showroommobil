<?php

session_start();

if (!isset($_SESSION['login']) ) {
	header("location: login.php");
	exit;
}

require 'function.php';
$pembelian = query("SELECT pembelian.pembelian_id, pelanggan.nama, mobil.type, pembelian.tanggal_beli, pembelian.pembayaran
		 	FROM pembelian
			INNER JOIN pelanggan ON pembelian.pelanggan_id = pelanggan.pelanggan_id
			INNER JOIN mobil ON pembelian.mobil_id = mobil.mobil_id
 ");
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
	  <a href="../mobil/index.php">Mobil</a>
	  <a class="active" href="index.php">Pembelian</a>
	</div>

	<a href="../index.php">Kembali ke halaman utama</a>

	<h1>Daftar Pembeli</h1>

	<a href="create.php">Tambah Data Pembeli</a>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>ID Pembelian</th>
			<th>Nama Pelanggan</th>
			<th>Type Mobil</th>
			<th>Tanggal Beli</th>
			<th>Pembayaran</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($pembelian as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="update.php?pembelian_id=<?= $row["pembelian_id"]; ?>">edit</a> |
				<a href="delete.php?pembelian_id=<?= $row["pembelian_id"]; ?>">hapus</a>
			<td><?= $row["pembelian_id"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["type"]; ?></td>
			<td><?= $row["tanggal_beli"]; ?></td>
			<td><?= $row["pembayaran"]; ?></td>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>


	</table>

</body>
</html>