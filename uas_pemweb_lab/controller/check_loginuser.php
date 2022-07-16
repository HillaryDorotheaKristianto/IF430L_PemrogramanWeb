<?php
    require '../include/db_connect.php';
    
    if(isset($_POST["login"])){
		$user = $_POST["email"];
		$password = $_POST["password"];
		$stmt = $conn->prepare("SELECT * FROM user WHERE email  = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        //$user = $result->fetch_assoc(); // fetch data   
        $stmt->close();
        $conn->close();
		//$result = mysqli_query($conn, "SELECT * FROM account WHERE email  = '$user'");
		
		//cek username
		if(mysqli_num_rows($result) === 0){
			//cek password
			$error = true;
		}
		else{
            $row = mysqli_fetch_assoc($result);
            //$query2 = "SELECT * FROM user WHERE email='$user' AND password='$password'";
            //$result3 = mysqli_query($conn, $query2);
  
            $_SESSION['id_user']=$row['id'];
            //var_dump($_SESSION); die;
			if(password_verify($password, $row["password"])){
                // cek captcha
                $form_captcha = $_POST['captcha'];
                //var_dump($_SESSION);die;
                $captcha_image = $_SESSION['captcha']['code'];
                if ($form_captcha == $captcha_image){
                    //set session
                    $_SESSION["login"] = true;
                    //$_SESSION["id_user"] = $id_user;
                    if($row["keterangan"] === "admin"){
                        $_SESSION["admin"] = $user;
                        header("Location: ../admin/index.php");
                    } else{
                        $_SESSION["user"] = $user;
                        header("Location: ../user/index.php");
                    }
                    exit;
                } else{
                    $captcha_salah = true;
                }
			}
        }
		
	}
?>