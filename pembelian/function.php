<?php 


$conn = mysqli_connect("localhost", "root", "", "showroom_mobil");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function create($pb) {

		global $conn;

       $pelanggan_id = $pb["pelanggan_id"];
       $mobil_id = $pb["mobil_id"];
       $tanggal_beli = $pb["tanggal_beli"];
       $pembayaran = $pb["pembayaran"];

        $query = "INSERT INTO pembelian 
        		VALUES ('', '$pelanggan_id', '$mobil_id', '$tanggal_beli', '$pembayaran')
       	";
       mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
      
}

function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pembelian WHERE pembelian_id = $id");

	return mysqli_affected_rows($conn);
}

function update($pb) {

	   global $conn;

	   $pembelian_id = $pb["pembelian_id"];
       $mobil_id = $pb["mobil_id"];
       $tanggal_beli = $pb["tanggal_beli"];
       $pembayaran = $pb["pembayaran"];


        $query = "UPDATE pembelian SET
        		 pembelian_id = '$pembelian_id',
        		 mobil_id = '$mobil_id',
        		 tanggal_beli = '$tanggal_beli',
        		 pembayaran = '$pembayaran'
        		 WHERE pembelian_id = $pembelian_id 

       	";
       mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
      

}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM pengguna
				WHERE username = '$username'");

	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
			  </script>";

		return false;
	}

	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn); 
}
?>