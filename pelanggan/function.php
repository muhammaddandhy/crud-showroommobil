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

function create($p) {

		global $conn;

       $nama = $p["nama"];
       $alamat = $p["alamat"];
       $jenis_kelamin = $p["jenis_kelamin"];
       $telepon = $p["telepon"];

        $query = "INSERT INTO pelanggan 
        		VALUES ('', '$nama', '$alamat', '$jenis_kelamin', '$telepon')
       	";
       mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
      
}

function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pelanggan WHERE pelanggan_id = $id");

	return mysqli_affected_rows($conn);
}

function update($p) {

	global $conn;

	   $pelanggan_id = $p["pelanggan_id"];
       $nama = $p["nama"];
       $alamat = $p["alamat"];
       $jenis_kelamin = $p["jenis_kelamin"];
       $telepon = $p["telepon"];

        $query = "UPDATE pelanggan SET
        		 nama = '$nama',
        		 alamat = '$alamat',
        		 jenis_kelamin = '$jenis_kelamin',
        		 telepon = '$telepon'
        		 WHERE pelanggan_id = $pelanggan_id 

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