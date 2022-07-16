<?php
	require '../include/db_connect.php';
	
	function ubah($data){
        global $conn;
		global $id;
		$nama = $data["nama_menu"];
		$harga = $data["harga"];
		$kategori = $data["categori"];
		$desc = $data["description"];
		$gambarLama = $data["gambarLama"];
		
		// cek apakah user pilih gambar baru atau tidak
		if($_FILES["gambar"]["error"] === 4){
			$gambar = $gambarLama;
		} else{
			$gambar =  upload();
		}
		
		$query = "UPDATE menu SET
					id = '$id',
					nama = '$nama',
					harga = '$harga',
					kategori = '$kategori',
					deskripsi = '$desc',
					gambar = '$gambar'
					
					WHERE id = $id;
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
	
	$id = $_GET["id"];
	
	$data = query("SELECT * FROM menu WHERE id = $id")[0];
	
	// cek apakah tombol submit udah ditekan atau belum
	if(isset($_POST["edit"])){
		// cek apakah tombol submit udah ditekan atau belum
		if(ubah($_POST) > 0){
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
			echo "Data gagal diubah!";
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