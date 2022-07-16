<?php
	session_start();
	//require 'include/db_connect.php';
	require 'controller/hotel.php';
	
	$result = mysqli_query($conn, "SELECT * FROM user");
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
	
	if(isset($_POST["search"])){
		$mahasiswa = cari($_POST["kota"],$_POST["bintang"],$_POST["harga"]);
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>UAS IF430 AL - Nginep</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Rock+Salt&family=Baumans&family=Sirin+Stencil&display=swap');
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
		  background-color: #66B0EE;
		}
		li {
		  float: left;
		  display: block;
		  text-align: center;
		  padding: 14px 16px;
		  font-family: 'Londrina Solid', cursive;
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
		.left{
		  float: left;
		}
		.logo{
		  width: 150px;
		}
		#profil{
		  margin-right: 1px;
		  width: 25px;
		  padding-top: 15px;
		}
		#aboutus{
		  margin-right: 1px;
		  padding-top: 15px;
		  width: 28px;
		}
		#atas{
		  background-image: url('assets/Background.png');
		  background-size: 100%; 
		  background-repeat: no-repeat;
		  margin-left: 0px;
		  width: 100%;
		  height: 520px;
		  position: relative;
		}
		.list_hotel{
		  font-family: 'Sirin Stencil';
		  font-size: 30px;
		  border: 1px solid #c4c4c4;
		  margin-top: 75px;
			width: 200px;
		  cursor: pointer;
		}
		.container{
		  display: grid;
		  grid-gap: 48px;  
			float: left;
			margin-left: 100px;
			/*width: 200px;*/
		}
		.row{
		  /*display: flex;*/
		  /*flex-direction: row;*/
		  /*justify-content: space-around;*/
		  /*align-items: center;*/
		}
		a2{
		  color: black;
		  text-decoration: none;
		}
		#recomended{
		  font-family: 'Rock Salt', cursive;
		  margin-left: 85px;
		  margin-top: 30px;
		  margin-bottom: -65px;
		  font-size: 22px;
		}
		.card{
		  border-style: dashed;
		  margin-left: 270px;
		  margin-right: 270px;
		  margin-top: 50px;
		  margin-bottom: 75px;
		  padding: 20px 15px 20px;
		  background-color: #66B0EE;
		  border-radius: 10px;
		  box-shadow: 10px 15px #1f58b5;
		}
		h1{
		  font-family: 'Baumans', cursive;
		  color: white;
		}
		.searchbar{
		  border-radius: 5px;
		  border: 2px solid #000000;
		  padding: 12px 15px;
		  width: 90%;
			left: 10%;
			position: relative;
			z-index: 0;
		}
		a1{
		  padding-right: 20px;
		}
		.input-icons i {
		  position: absolute;
		}
		.input-icons {
		  width: 100%;
		  margin-bottom: 10px;
		}
		.icon {
		  padding: 14px;
		  color: black;
		  min-width: 75px;
		  text-align: center;
		}
		.z{
		  margin-top: 15px;
		}
		.submit{
		  border: 3px solid #1f58b5;
		  border-radius: 5px;
		  padding-top: 10px;
		  padding-bottom: 10px;
		  padding-left: 35px;
		  padding-right: 10px;
		  cursor: pointer;
		  font-family: 'Sirin Stencil', cursive;
		  background-color: #1f58b5;
		  font-size: 18px;
		  color: white;
		}
		.input-icons2 {
		  width: 100%;
		  margin-bottom: 10px;
		}
		.input-icons2 i {
		  position: absolute;
		}
		.icon2 {
		  padding: 18px;
		  color: black;
		  min-width: 30px;
		  text-align: center;
		  color: white;
		}
		#search{
			margin-top: -200px;
		}
		#list_hotel{
			margin-bottom: 50px;
		}
		.content_img p{
				position: absolute;
				margin-top: -203px;
				height: 200px;
				padding: 65px 43px;
				width: 200px;
				background-color: rgba(0,0,0,0.7);
				font-size: 15px;
				font-family: "Sirin Stencil";
				opacity: 0;
				color: white;
				/*visibility: hidden;*/
				-webkit-transition: visibility 0s, opacity 0.5s; 
				transition: visibility 0s, opacity 0.5s;
			}
			.content_img:hover{
				cursor: pointer;
			}
			.content_img:hover p{
				padding: 65px 43px;
				visibility: visible;
				opacity: 1;
				z-index: 1;
			}
			a{
				color: black;
				text-decoration: none;
			}
	</style>
  </head>
  <body>
     <ul>
        <li class="left"><a href="index.php"><img src="assets/Nginep.png" class="logo">
        <li class="right"><a href="view/login.php"><img src="assets/Frame.png" id="profil">Login</a></li>
        <li class="right"><a href="view/aboutus.php"><img src="assets/group.png" id="aboutus">About Us</a></li>
      </ul>

      <div id="atas">
      </div>

      <div id="search">
        <div class="card">
          <h1>Search hotels by star, city, and price</h1>
						<form class="z" action="" method="post">
								<div class="input-icons">
									<i class="fa fa-building icon"></i>
									<!--<input type="text" name="kota" placeholder="Kota" class="searchbar">  -->
									<select name="kota" class="searchbar">
										<option value="" disabled selected>Kota</option>
										<?php
											while($row2 = $result3->fetch_assoc()) :
										?>
										<option value="<?= $row2['kota'] ?>"><?= $row2['kota'] ?></option>
										<?php
											endwhile;
											mysqli_free_result($result3);
										?>
									</select>
								</div>
								<div class="input-icons">
									<i class="fa fa-star icon"></i>
									<!--<input type="number" name="bintang" placeholder="Bintang" class="searchbar">-->
									<select name="bintang" class="searchbar">
										<option value="" disabled selected>Bintang</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="input-icons">
									<i class="fa fa-money icon"></i>
									<!--<input type="number" name="harga" placeholder="Harga" class="searchbar">-->
									<select name="harga" class="searchbar">
										<option value="" disabled selected>Harga</option>
										<option value="<500000">< Rp 500.000</option>
										<option value=">=500000 AND harga <=1000000">Rp 500.000 - Rp 1.000.000</option>
										<option value=">1000000 AND harga <=2000000">Rp 1.000.001 - Rp 2.000.000</option>
										<option value=">2000000 AND harga <=3000000">Rp 2.000.001 - Rp 3.000.000</option>
										<option value=">3.000.000">Rp 3.000.000</option>
									</select>
								</div>
								<div class="input-icons2">
									<i class="fa fa-search icon2"></i>
									<button type="submit" class="submit" name="search">Find Hotels!</button>
								</div>
						</form>
        </div>
      </div>

      <div id="recomended">
        <a class="a2">Recomended Hotels</a>
      </div>
	  <?php 
			if(isset($_POST['search'])){
		?>
				<div id="list_hotel">
					<div class="container">
						<div class="row">
								<div class="content_img">
									<!--<a class="list_hotel">Hotel a, bintang, kota, harga</a>-->
									<img src="assets/hotel/<?= $mahasiswa['foto'] ?>" class="list_hotel">
									<a href="view/detail_hotel.php?id=<?= $mahasiswa['id_hotel'] ?>"><p style="text-align:center;" class="edit_delete"><?= $mahasiswa['nama_hotel'] ?><br>Rp. <?= $mahasiswa['harga'] ?></p></a>
								</div>
						</div>  
				</div>
			</div>
		<?php 
			}else{
				while($row = $result2->fetch_assoc()){
		?>
      <div id="list_hotel">
        <div class="container">
          <div class="row">
						<div class="content_img">
							<!--<a class="list_hotel">Hotel a, bintang, kota, harga</a>-->
							<img src="assets/hotel/<?= $row['foto'] ?>" class="list_hotel">
							<a href="view/detail_hotel.php?id=<?= $row['id_hotel'] ?>"><p style="text-align:center;" class="edit_delete"><?= $row['nama_hotel'] ?><br>Rp. <?= $row['harga'] ?></p></a>
						</div>
          </div>  
        </div>
      </div>
			<?php
				}
				mysqli_free_result($result2);
				mysqli_close($conn);
			}
			?>

		
  </body>
</html>