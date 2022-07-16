<?php
    session_start();
	
	if(isset($_SESSION["login"])){
		header("Location: ../index.php");
		exit;
	}
    
	require '../controller/check_loginuser.php';
    require '../captcha/captcha2.php';
    $_SESSION['captcha'] = simple_php_captcha();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Merienda&display=swap');
            body{
              background-color: #a4cef1;
              height: auto;
              margin: 3px;
              box-sizing: border-box;
            }
            img{
              width: 300px;
              margin-top: 300px;
              margin-left: 100px;
            }
            ul{
              list-style-type: none;
            }
            li{
              margin-top: 10px;
            }
            input{
              display: block;
              padding: 10px 15px;
              margin-top: 5px;
              width: 270px;
              font-family: "Akaya Telivigala";
              border-radius: 5px;
            }
            button{
              padding: 10px 15px;
              text-align: center;
              font-family: "Merienda";
            }
            form{
              border: 1px solid black;
              width: 350px;
              padding: 20px 15px;
              padding-right: 50px;
              float: right;
              position: relative;
              margin-top: 7%;
              margin-left: 5%;
              background-color: rgba(218, 218, 218, 0.5);
            }
            a{
              text-decoration: none;
              color: blue;
            }
            label{
              font-family: "Merienda";
            }
            .center{
              text-align: center;
            }
            #captcha{
                width: 150px;
                height: 50px;
                margin-top: 25px;
                margin-left: -5px;
            }
            #refresh{
                width: 30px;
                margin-bottom: 8px;
                margin-left: -1px;
                margin-top: -10px;
                cursor: pointer;
            }
            #wrapper{
              position: absolute;
              overflow: auto;
              left: 5px;
              right: 5px;
              top: 5px;
              bottom: 5px;
              border: 3px solid #25ccc4;
            }
            #left{
              width: 50%;
              /*left: 0px;*/
              margin-top: -30px;
              height: 100%;
              float: right;
            }
        </style>
    </head>
    <body onload="new_captcha();">
    <div id="wrapper">
        <div id="left">
          <img src="../assets/login.png">
        </div>
        
        <div id="right">
            <form action="" method="post">
                <?php if(isset($error)): ?>
                    <i style="color:red;">Email / Password salah</i>
                <?php endif; ?>
                <ul>
                  <li>
                    <label>E-mail</label>
                    <input type="email" name="email">
                  </li>
                  <li>
                    <label>Password</label>
                    <input type="password" name="password">
                  </li>
                  <li class="center">
                    <?php
                        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" id="captcha">';
                    ?>
                    <br>
                    <label>Enter the code above:</label>
                    <input type="text" name="captcha">
                    <?php if(isset($captcha_salah)): ?>
                        <i style="color:red;">Captcha salah</i>
                    <?php endif; ?>
                  </li>
                  <li class="center">
                    <button type="submit" name="login">Login</button>
                  </li>
                  <li class="center">
                    <label>Don't have an account? Sign up <a href="signup.php">here</a></label>
                  </li>
                </ul>
            </form>
        </div>
    </div>
    </body>
</html>