<?php
    require '../include/db_connect.php';
    
    $id = $_GET["id"];
    
    function hapus($id){
		global $conn;
        global $id;
		mysqli_query($conn, "DELETE FROM hotel WHERE id_hotel = $id");
		
		return mysqli_affected_rows($conn);
	}
    
    if(hapus($id) > 0){
        header("location: ../index.php");
    } else{
        echo "Data Gagal Dihapus!";
    }
    
?>