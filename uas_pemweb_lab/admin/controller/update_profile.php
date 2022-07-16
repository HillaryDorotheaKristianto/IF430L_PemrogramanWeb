<?php
	require '../include/db_connect.php';
	
	function ubah($data){
        global $conn;
		global $id;
		$first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $birth_date = $_POST["birth_date"];
        $telp = $_POST["telp"];
		$email = $_POST["email"];
        $password = $_POST["password"];
        $keterangan = $_POST["keterangan"];
		$gambarLama = $data["gambarLama"];
		
		// cek apakah user pilih gambar baru atau tidak
		if($_FILES["gambar"]["error"] === 4){
			$gambar = $gambarLama;
		} else{
			$gambar =  upload();
		}
		
		$query = "UPDATE user SET
					id = '$id',
					first_name = '$first_name',
					last_name = '$last_name',
					birth_date = '$birth_date',
					telp = '$telp',
					email = '$email',
					password = '$password',
					keterangan = '$keterangan',
					foto = '$gambar'
					
					WHERE id = $id;
				 ";
        //var_dump($query);die;
		mysqli_query($conn, $query);
		
		
		return mysqli_affected_rows($conn);
    }
	
	function upload(){
		$namaFile = $_FILES["gambar"]["name"];
		//$ukuranFile = $_FILES["gambar"]["size"];
		$error = $_FILES["gambar"]["error"];
		$tmpName = $_FILES["gambar"]["tmp_name"];
		
		// cek apakah tidak ada gambar yang diupload
		if($error === 4){
			echo "MASUKIN GAMBAR!";
			return false;
		}
		
		// cek apakah yang diupload gambar atau bukan
		$ekstensiGambarValid = ["jpg", "jpeg", "png"];
		$ekstensiGambar = explode(".", $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "YANG DIUPLOAD BUKAN GAMBAR!";
			return false;
		}
        
        // cek jika ukurannya terlalu besar
		//if($ukuranFile > 1000000){
		//	echo "UKURAN TERLALU BESAR!";
		//	return false;
		//}
		
		// lolos pengecekan, gambar siap diuplaod
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		
		move_uploaded_file($tmpName, '../../assets/users/' . $namaFileBaru);
		
		return $namaFileBaru;
	}
	
	$id = $_GET["id"];
	
	$data = query("SELECT * FROM user WHERE id = $id")[0];
	
	// cek apakah tombol submit udah ditekan atau belum
	if(isset($_POST["edit"])){
		// cek apakah tombol submit udah ditekan atau belum
		if(ubah($_POST) > 0){
			 header("Location: ../index.php");
		} else{
			echo "Data gagal diubah!";
		}
	}
	
	if(isset($_POST["cancel"])){
        header("Location: ../index.php");
    }
?>