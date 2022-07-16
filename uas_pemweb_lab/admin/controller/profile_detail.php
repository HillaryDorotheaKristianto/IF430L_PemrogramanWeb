<?php
    require '../include/db_connect.php';
	
    $id = $_SESSION['id_user'];
    //var_dump($id);die;
    $query = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    
//	function getUsersData($id){
//        global $conn;
//        $array = array();
//        $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
//        
//        while($row = $result->fetch_assoc()){
//            $array['id'] = $row['id'];
//            $array['first_name'] = $row['first_name'];
//            $array['last_name'] = $row['last_name'];
//            $array['telp'] = $row['telp'];
//            $array['birth_date'] = $row['birth_date'];
//            $array['email'] = $row['email'];
//        }
//        return $array;
//    }
//    
//    function getId($email){
//        global $conn;
//        $result = mysqli_query($conn, "SELECT id FROM user WHERE email=$email");
//        
//        while($row = $result->fetch_assoc()){
//            return $row['id'];
//        }
//    }
?>