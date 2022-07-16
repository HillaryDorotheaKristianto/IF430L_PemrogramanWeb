<?php
    $conn = new mysqli("localhost", "root", "", "uas_pemweb_lab");
    
    function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}
?>