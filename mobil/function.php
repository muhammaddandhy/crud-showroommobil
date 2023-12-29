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

function create($m) {

		global $conn;

       $merk = $m["merk"];
       $type = $m["type"];
       $warna = $m["warna"];
       $tahun = $m["tahun"];
       $harga = $m["harga"];

       $query = "INSERT INTO mobil 
        		VALUES ('', '$merk', '$type', '$warna', '$tahun', '$harga')
       	";
       mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
      
}

function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mobil WHERE mobil_id = $id");

	return mysqli_affected_rows($conn);
}

function update($m) {

	global $conn;

	   $mobil_id = $m["mobil_id"];
       $merk = $m["merk"];
       $type = $m["type"];
       $warna = $m["warna"];
       $tahun = $m["tahun"];
       $harga = $m["harga"];

        $query = "UPDATE mobil SET
        		 merk = '$merk',
        		 type = '$type',
        		 warna = '$warna',
        		 tahun = '$tahun',
        		 harga = '$harga'
        		 WHERE mobil_id = $mobil_id 

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