<?php
	require '../controller/detail.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Menu Detail</title>
		<style>
          @import url('https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Pacifico|Dancing+Script|Righteous|Staatliches|Overpass');
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
            #home{
                margin-right: -10px;
                padding-top: 5px;
                padding-right: -10px;
            }
			body{
              background: rgba(176, 119, 7, 0.6);
            }
			#menu_img{
				width: 330px;
			}
            #addmenu{
              width: 95%;
              margin-left: 30px;
              margin-top: 20px;
            }
			#menu_detail{
				border: 3px solid black;
				margin: 5px;
				padding: 40px 35px;
				column-count: 2;
			}
			.modal_text{
				font-family: "Overpass";
				font-style: italic;
				margin-left: -280px;
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
				margin-top: 50px;
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
				margin-top: 210px;
				margin-left: 480px;
			}
			a{
				color: black;
				text-decoration: none;
			}
			button{
				font-family: "Staatliches";
				font-size: 20px;
				border: 0px;
				border-radius: 5px;
				transition: .2s;
				background-color: #cfad6a;
			}
			#other_menu{
				border: 3px solid black;
				margin: 5px;
				padding: 40px 35px;
				text-align: center;
			}
			.harga{
				margin-top: 10px;
			}
			#menus{
				width: 150px;
				margin-left: 30px;
				transition: .2s;
			}
			#menus:hover{
				transform: scale(1.25);
			}
			#others{
				font-family: "Overpass";
				margin-bottom: 20px;
				font-size: 20px;
			}
			#qty{
				width: 50px;
				text-align: center;
				border-radius: 5px;
				border: 0px;
				padding: 5px 10px;
				background-color: #cfad6a;
				font-family: "Staatliches";
				float: right;
				margin-top: 170px;
				margin-right: 15px;
				font-size: 18px;
			}
			#quantity{
				width: 50px;
				text-align: center;
				font-family: "Staatliches";
				float: right;
				font-size: 20px;
				margin-top: 173px;
				margin-right: 15px;
			}
		</style>
	</head>
	<body>
		<ul>
            <li>Restoran UTS IF430</li>
            <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
            <li class="right"><a href="../index.php"><img src="../assets/home.png" id="home"></a></li>
        </ul>
		
        <img src="../assets/menu_detail.png" id="addmenu">
		  
		<div id="menu_detail">
			<?php while($row = $result->fetch_assoc()): ?>
			
			<img src="../../assets/menu/<?= $row['gambar']; ?>" id="menu_img">
			<p class="modal_text nama_menu_modal"><?= $row['nama']; ?></p>
			<p class="modal_text"><?= $row['deskripsi']; ?></p>
			<p class="modal_text harga">Harga: Rp. <?= $row['harga']; ?></p>
			<input type="hidden" name="harga" value="<?= $row['harga']; ?>">
			
			<input id="qty" type="number" name="qty" min="1" max="100" value="1"><label id="quantity">Quantity: </label>
			<div class="addtocart">
				<button type="submit" name="add" class="cart_modal"><img src="../assets/cart.png">ADD TO CART</button>
				<input type="hidden" name="menu_id" value="<?= $row['id']; ?>">
			</div>
			
			<?php endwhile; ?>
		</div>
		
		<div id="other_menu">
			<p id="others">Other menus:</p>
			<?php while($row2 = $menus->fetch_assoc()): ?>
			
			<a href="menu_detail.php?id=<?= $row2['id'] ?>&kategori=<?= $row2['kategori'] ?>">
				<img src="../../assets/menu/<?= $row2['gambar']; ?>" id="menus">
			</a>
			
			<?php endwhile; ?>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
		crossorigin="anonymous"></script>
			<script>
				$(document).ready(function() {
                $(".addtocart").click(function(){
                    $.ajax({
                        url: "../controller/add_to_cart.php", 
                        type: "post", 
                        data:{product_id:$("input[name='menu_id']").val(),
                        quantity: $("input[name='qty']").val(),
                        nama_menu:$(".nama_menu_modal").html(),
                        harga:$("input[name='harga']").val()}, 
                        success: function(result){
                            window.location.replace("../index.php");
                        }
                    });
                });
           	});

			</script>
	</body>
</html>