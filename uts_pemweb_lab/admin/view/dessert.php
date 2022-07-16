<?php
	session_start();
	
	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}
	
	require '../controller/menu_dessert.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Desserts</title>
        <style>
          @import url('https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Pacifico|Dancing+Script|Righteous');
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
                background-color: #856D3E;
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
            #home{
                margin-right: -10px;
                padding-top: 5px;
                padding-right: -10px;
            }
            #atas{
                background-image: url('../assets/dessert.png');
                background-size: cover; 
                background-repeat: no-repeat;
                margin-left: -8px;
                text-align: center;
                width: auto;
                height: 400px;
                position: relative;
            }
            body{
              background: rgba(176, 119, 7, 0.6);
            }
            .judul{
              margin-top: 100px;
              width: 30%;
              left: 0px;
            }
            .bar{
              width: 100%;
              margin-top: 20px;
			  margin-bottom: -50px;
            }
            #list_menu{
                float: left;
                padding: 65px 30px;
                margin-left: 105px;
				margin-top: -50px;
                width: 200px;
                height: 200px; 
                transition: .1s;
                cursor: pointer;
                animation-name: fade;
                animation-duration: 2s;
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
			  position: relative;
            }
			.menu_pic{
				width: 200px;
				/*background-color: rgba(255,0,0,0.5);*/
                padding: 85px 40px;
			}
			.content_img{
				position: relative;
				/*margin-bottom: 30px;*/
				float: left;
			}
			.content_img p{
				position: absolute;
				bottom: 88px;
				right: 40px;
				background-color: rgba(0,0,0,0.7);
				color: white;
				font-size: 25px;
				font-family: "Righteous";
				opacity: 0;
				visibility: hidden;
				-webkit-transition: visibility 0s, opacity 0.5s; 
				transition: visibility 0s, opacity 0.5s;
			}
			.content_img:hover{
				cursor: pointer;
			}
			.content_img:hover p{
				padding: 29px 23.6px;
				visibility: visible;
				opacity: 1;
				z-index: 1;
			}
			.edit_delete{
				color: white;
				text-decoration: none;
				transition: .2s;
			}
			.edit_delete:hover{
				color: #aaa;
			}
			.add_menu{
				margin-top: 15px;
				margin-left: 135px;
				margin-bottom: 30px;
				font-family: "Righteous";
				font-size: 25px;
				text-align: center;
                padding: 25px 23px;
				font-size: 30px;
				background-color: rgba(0,0,0,0.4);
				cursor: pointer;
				transition: .2s;
				float: left;
			}
			.add_menu:hover{
				background-color: rgba(0,0,0,0.5);
				color: #aaa;
			}
        </style>
    </head>
    <body>
         <ul>
            <li>Restoran UTS IF430</li>
            <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
            <li class="right"><a href="../index.php"><img src="../assets/home.png" id="home"></a></li>
        </ul>

        <div id="atas">
        </div>
        
        <img src="../assets/bar.png" class="bar">
		
		<?php
			while($row = $result->fetch_assoc()) :
		?>
        <div id="list_menu">
          <div class="container">
            <div class="row">
				<div class="content_img">
					<img src="../../assets/menu/<?= $row['gambar'] ?>" class="menu_pic">
					<p style="text-align:center;"><a class="edit_delete" href="../controller/hapus_menu.php?id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>">Delete</a><br><a class="edit_delete" href="edit_menu.php?id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>">Edit</a></p>
				</div>
			</div>  
          </div>
        </div>
		<?php
			endwhile;
			mysqli_free_result($result);
			mysqli_close($conn);
		?>
		
		<div class="content_img menu_pic">
			<a href="tambah_menu.php?kategori=Breakfast" class="add_menu edit_delete">
				Add Menu
			</a>
		</div>
    </body>
</html>