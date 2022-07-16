<?php
	session_start();
	
	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}
	
	require '../controller/menu_non_coffee.php';
	require '../controller/fetch.php';	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Non-Coffees</title>
		
        <style>
          @import url('https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Pacifico|Dancing+Script|Righteous|Overpass|Staatliches');
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
                background-image: url('../assets/Group 6.png');
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
				height: 120px;
				width: 120px;
				background-color: rgba(0,0,0,0.7);
				color: white;
				font-size: 15px;
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
				padding: 25px 23px;
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
			.modal_menu{
				column-count: 2;
			}
			.modal_text{
				font-family: "Overpass";
				font-style: italic;
				margin-left: -30px;
				margin-right: 20px;
			}
			.modal_pic{
				margin-top: 50px;
				margin-left: 40px;
			}
			.nama_menu_modal{
				font-weight: bold;
				text-align: center;
				margin-bottom: 20px;
				margin-top: 30px;
			}
			.cart_modal{
				font-family: "Staatliches";
				font-size: 20px;
				border: 1px solid black;
				padding: 5px 10px;
				border-radius: 5px;
				transition: .2s;
			}
			.cart_modal img{
				margin-right: 5px;
			}
			.cart_modal:hover{
				background-color: #905F3A;
				color: white;
				cursor: pointer;
			}
			.addtocart{
				text-align: center;
				margin-top: 10px;
				margin-left: 240px;
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
            <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
            <li class="right"><a href="cart.php"><img src="../assets/cart.png" id="cart"></a></li>
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
					<a href="menu_detail.php?id=<?= $row['id'] ?>&kategori=<?= $row['kategori'] ?>"><p style="text-align:center;" class="edit_delete"><?= $row['nama'] ?><br>Rp. <?= $row['harga'] ?></p></a>
				</div>
			</div>  
          </div>
        </div>
		<?php
			endwhile;
			mysqli_free_result($result);
			mysqli_close($conn);
		?>
    </body>
</html>