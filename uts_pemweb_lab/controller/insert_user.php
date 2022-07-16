<?php
    require '../include/db_connect.php';
    
    function registrasi($data){
		global $conn;
        $firstName = stripslashes($data["firstname"]);
        $lastName = stripslashes($data["lastname"]);
        $gender = $data["gender"];
        $birthdate = $data["birthdate"];
		$email = strtolower(stripslashes($data["email"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
		
		// cek username udah ada atau belum
		$result = mysqli_query($conn, "SELECT email FROM account WHERE email = '$email'");
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
		mysqli_query($conn, "INSERT INTO account VALUES('', '$firstName', '$lastName', '$gender', '$birthdate', '$email', '$password', 'user')");
		
		return mysqli_affected_rows($conn);
	}
    
    if(isset($_POST["signup"])){
		if(registrasi($_POST) > 0){
			header("Location: ../index.php");
		} else {
			echo mysqli_error($conn);
		}
	}
?>