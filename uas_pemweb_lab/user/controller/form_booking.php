<?php
    require '../include/db_connect.php';
    
    $id_hotel = $_GET['id_hotel'];
    //$id_user = $_GET['id_user'];
    $result = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = $id_hotel");
    //$result2 = mysqli_query($conn, "SELECT * FROM user WHERE id = $id_user");
    
    $id = $_SESSION['id_user'];
    //var_dump($id);die;
    $query = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'") or die(mysqli_error());
    $row2 = mysqli_fetch_array($query);
    
    function dateDiffInDays($check_in, $check_out) {
        // Calculating the difference in timestamps
        $diff = strtotime($check_out) - strtotime($check_in);
          
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }
    
    function pesan($data){
        global $conn;
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $name = $first_name . ' '. $last_name;
        $id_hotel = $_GET['id_hotel'];
        $telp = $_POST["telp"];
        $email = $_POST["email"];
		$check_in = $_POST["check_in"];
        $check_out = $_POST["check_out"];
        $jumlah_orang = $_POST["jumlah_orang"];
        $jumlah_kamar = $_POST["jumlah_kamar"];
        
        $harga = $_POST["harga"];
        $hari = dateDiffInDays($check_in, $check_out);
        $total_harga = $hari*$jumlah_kamar*$harga;
        $id_user = $_SESSION['id_user'];
		//var_dump($total_harga); var_dump($hari);die;
        
		// query insert data
		$query2 = "INSERT INTO booking
				  VALUES
				  ('$id_user','$id_hotel','','$name', '$telp', '$email', '$jumlah_kamar', '$jumlah_orang', '$check_in', '$check_out', '$total_harga')
				  ";
        //var_dump($query2);die;
        mysqli_query($conn, $query2);
        
		return mysqli_affected_rows($conn);
    }
    
    if(isset($_POST["book"])){		
		// cek apakah tombol submit udah ditekan atau belum
		if(pesan($_POST) > 0){
            header("Location: ../index.php");
		} else{
			echo "Data gagal ditambahkan!";
		}
	}
    
    if(isset($_POST["cancel"])){
        header("Location: detail_hotel.php?id=$id_hotel");
    }
?>