<?php
    require '../include/db_connect.php';
    
    function tambah($data){
        global $conn;
        $nama = $_POST["nama_menu"];
		$harga = $_POST["harga"];
		$kategori = $_POST["categori"];
		$desc = $_POST["description"];
		//$gambar = $_POST["gambar
        
        $gambar = upload();
		if(!$gambar){
			return false;
		}
		
		// query insert data
		$query = "INSERT INTO menu
				  VALUES
				  ('', '$nama', '$harga', '$kategori', '$desc', '$gambar')
				  ";
        
        mysqli_query($conn, $query);
        
		return mysqli_affected_rows($conn);
    }
    
    function upload(){
		$namaFile = $_FILES["gambar"]["name"];
		$ukuranFile = $_FILES["gambar"]["size"];
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
		if($ukuranFile > 1000000){
			echo "UKURAN TERLALU BESAR!";
			return false;
		}
		
		// lolos pengecekan, gambar siap diuplaod
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		
		move_uploaded_file($tmpName, '../../assets/menu/' . $namaFileBaru);
		
		return $namaFileBaru;
	}
    
    if(isset($_POST["add"])){		
		// cek apakah tombol submit udah ditekan atau belum
		if(tambah($_POST) > 0){
            $kategori = $_POST["categori"];
			if($kategori == "Breakfast"){
                header("Location: breakfast.php");
            } else if($kategori == "Dessert"){
                header("Location: dessert.php");
            } else if($kategori == "Coffee"){
                header("Location: cofee.php");
            } else if($kategori == "Non-Coffee"){
                header("Location: non_coffee.php");
            } else{
                echo "Kategori tidak tersedia!";
            }
		} else{
			echo "Data gagal ditambahkan!";
		}
	}
    
    if(isset($_POST["cancel"])){
        $kategori = $_GET["kategori"];
        if($kategori == "Breakfast"){
            header("Location: breakfast.php");
        } else if($kategori == "Dessert"){
            header("Location: dessert.php");
        } else if($kategori == "Coffee"){
            header("Location: coffee.php");
        } else if($kategori == "Non-Coffee"){
            header("Location: non_coffee.php");
        } else{
            echo "Kategori tidak tersedia!";
        }
    }
?>