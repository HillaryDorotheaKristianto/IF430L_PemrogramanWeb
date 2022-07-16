<?php
	session_start();
	require 'include/db_connect.php';
	
	$result = mysqli_query($conn, "SELECT * FROM account");
	$row = mysqli_fetch_assoc($result);
	
	if(isset($_SESSION["login"])){
		if($row["keterangan"] === "admin"){
			$_SESSION["admin"] = $user;
			header("Location: admin/index.php");
		} else{
			$_SESSION["user"] = $user;
			header("Location: user/index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Restoran UTS IF430</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Pacifico|Dancing+Script');
            *{
              margin: 0px;
              padding: 0px;
              box-sizing: border-box;
            }
            ul {
                list-style-type: none;
                margin-top: -8px;
                margin-left: -8px;
                padding: 0;
                width: auto;
                overflow: hidden;
                background-color: #b2b0b0;
            }
            li {
                float: left;
                display: block;
                text-align: center;
                padding: 14px 16px;
                font-family: "Patrick Hand SC";
                font-size: 20px;
            }
            li a{
                cursor: pointer;
                color: black;
                text-decoration:none;
            }
            .right{
                float: right;
            }
            img{
                width: 17px;
            }
            #profil{
                margin-right: 10px;
            }
            #cart{
                margin-right: -13px;
                padding-top: 5px;
                padding-right: -5px;
            }
            #atas{
                background-image: url('assets/Homepage.jpg');
                background-size: cover; 
                background-repeat: no-repeat;
                /* margin-top: 0px; */
                margin-left: -8px;
                text-align: center;
                width: auto;
                height: 494px;
                position: relative;
            }
            #tulisan{
                padding-left: 37px;
            }
            #welcome{
                padding-top: 50px;
                font-family: 'Pacifico';
                font-size: 70px;
            }
            #sweet{
                font-family: 'Dancing Script';
                font-size: 50px;
                margin-top: -10px;
            }
            #quote{
                font-family: 'Pacifico';
                font-size: 30px;
                margin-top: 20px;
            }
            #menu{
                width: 150px;
                position: relative;
                left: 46%;
                margin-top: 3px;
                margin-bottom: 0px;
            }
            #list_menu{
                background-image: url('assets/homepage2.jpg');
                background-size: cover;
                width: auto;
                height: 360px;
                background-repeat: no-repeat;
                margin-left: -8px;
                text-align: center;
                padding: 10px;
            }
            .list_menu{
                font-family: 'Pacifico';
                font-size: 30px;
                border: 1px solid #c4c4c4;
                /*float: left;
                position: relative;*/
                margin-top: 75px;
                /*margin-left: 80px;*/
                padding: 65px 30px;
                width: 200px;
                /* height: 200px; */
                transition: .1s;
                cursor: pointer;
                animation-name: fade;
                animation-duration: 2s;
            }
            @keyframes fade{
              from {opacity: 0;}
              to {opacity: 1;}
            }
            .list_menu:hover{
                transform: scale(1.1);
            }
            .container{
              display: grid;
              grid-gap: 48px;
              
            }
            .row{
              display: flex;
              flex-direction: row;
              justify-content: space-around;
              align-items: center;
            }
            a{
                color: black;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <ul>
            <li>Restoran UTS IF430</li>
            <?php
                if(isset($_SESSION["login"])){
                    echo "<li class='right'><a href='controller/logout.php'><img src='assets/Frame.png' id='profil'>Logout</a></li>";
                } else{
                    echo "<li class='right'><a href='view/login.php'><img src='assets/Frame.png' id='profil'>Login</a></li>";
                }
            ?>
            <!--<li class="right"><a href="view/login.php"><img src="assets/Frame.png" id="profil">Login</a></li>-->
            <li class="right"><a href="view/login.php"><img src="assets/cart.png" id="cart"></a></li>
        </ul>
        
        <div id="atas">
            <div id="tulisan">
                <p id="welcome">Welcome</p>
                <p id="sweet">Sweet Space</p>
                <p id="quote">"May your day be as sweet as you are"</p>
            </div>
        </div>
        
        <img src="assets/menu.png" id="menu">
        
        <div id="list_menu">
			<div class="container">
			  <div class="row">
				<a href="view/login.php" class="list_menu" data-aos="fade-up">Breakfasts</a>
				<a href="view/login.php" class="list_menu">Desserts</a>
				<a href="view/login.php" class="list_menu">Coffee</a>
				<a href="view/login.php" class="list_menu">Non-Coffee</a>
			  </div>  
			</div>
        </div>
    </body>
</html>