<?php
    require '../include/db_connect.php';
    
    function registrasi($data){
		global $conn;
        $firstName = stripslashes($data["firstname"]);
        $lastName = stripslashes($data["lastname"]);
        $telp = $data["telp"];
        $birthdate = $data["birthdate"];
		$email = strtolower(stripslashes($data["email"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $gambar = upload();
		if(!$gambar){
			return false;
		}
		
		// cek username udah ada atau belum
		$result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
		if(mysqli_fetch_assoc($result)){
			echo "<script>
					alert('Email sudah terdaftar');
				 </script>";
			return false;
		}
		
		// cek confirm password
		if($password !== $password2){
			echo "<script>
					alert('Password tidak sama');
				 </script>";
			return false;
		}
		
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		// tambah user baru ke database
		mysqli_query($conn, "INSERT INTO user VALUES('', '$firstName', '$lastName', '$telp', '$birthdate', '$email', '$password', 'user','$gambar')");
		
		return mysqli_affected_rows($conn);
	}
    
    if(isset($_POST["signup"])){
		if(registrasi($_POST) > 0){
			header("Location: login.php");
		} else {
			echo mysqli_error($conn);
		}
	}
    
    function upload(){
		$namaFile = $_FILES["foto"]["name"];
		//$ukuranFile = $_FILES["foto"]["size"];
		//$error = $_FILES["foto"]["error"];
		$tmpName = $_FILES["foto"]["tmp_name"];
		
		// cek apakah tidak ada gambar yang diupload
		//if($error === 4){
		//	echo "MASUKIN GAMBAR!";
		//	return false;
		//}
		
		// cek apakah yang diupload gambar atau bukan
		$ekstensiGambarValid = ["jpg", "jpeg", "png"];
		$ekstensiGambar = explode(".", $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		//if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		//	echo "YANG DIUPLOAD BUKAN GAMBAR!";
		//	return false;
		//}
		
		// cek jika ukurannya terlalu besar
		//if($ukuranFile > 1000000){
		//	echo "UKURAN TERLALU BESAR!";
		//	return false;
		//}
		
		// lolos pengecekan, gambar siap diuplaod
		// generate nama gambar baru
		$namaFileBaru = uniqid() . '.' . $ekstensiGambar;
		
		move_uploaded_file($tmpName, '../assets/users/' . $namaFileBaru);
		
		return $namaFileBaru;
	}
?>