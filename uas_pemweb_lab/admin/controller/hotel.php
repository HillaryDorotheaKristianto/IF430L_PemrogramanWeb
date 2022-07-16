<?php
    require '../include/db_connect.php';
	
	$query = "SELECT * FROM hotel";
	$result2 = $conn->query($query);
    
	$result3 = $conn->query($query);
    
    function cari($kota,$bintang,$harga){
		global $conn;
		$query = "SELECT * FROM hotel
					WHERE
					kota LIKE '$kota' AND
					bintang = '$bintang' AND
					harga $harga
				 ";
        
		return query($query);
	}
?>