<?php
    require '../include/db_connect.php';
    
    function tambah($data){
        global $conn;
        $nama = $_POST["nama_hotel"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $kota = $_POST["kota"];
		$harga = $_POST["harga"];
        $bintang = $_POST["bintang"];
        $kamar = $_POST["kamar"];
		//$gambar = $_POST["gambar
        
        $gambar = upload();
		if(!$gambar){
			return false;
		}
		
		// query insert data
		$query = "INSERT INTO hotel
				  VALUES
				  ('', '$nama', '$alamat', '$telp', '$kota', '$harga', '$bintang', '$kamar', '$gambar')
				  ";
        //var_dump($query);die;
        mysqli_query($conn, $query);
        
		return mysqli_affected_rows($conn);
    }
    
    function upload(){
		$namaFile = $_FILES["foto"]["name"];
		//$ukuranFile = $_FILES["foto"]["size"];
		$error = $_FILES["foto"]["error"];
		$tmpName = $_FILES["foto"]["tmp_name"];
		
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
		
		move_uploaded_file($tmpName, '../../assets/hotel/' . $namaFileBaru);
		
		return $namaFileBaru;
	}
    
    if(isset($_POST["add"])){		
		// cek apakah tombol submit udah ditekan atau belum
		if(tambah($_POST) > 0){
            header("Location: ../index.php");
		} else{
			echo "Data gagal ditambahkan!";
		}
	}
    
    if(isset($_POST["cancel"])){
        header("Location: ../index.php");
    }
?>