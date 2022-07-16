<?php
    $conn = new mysqli("localhost", "root", "", "uas_pemweb_lab");
    
    function query($query){
		global $conn;
		$result = $conn->query($query);
		$rows = $result->fetch_assoc();
		return $rows;
	}
?>