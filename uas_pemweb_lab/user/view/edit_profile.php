<?php
	require '../controller/update_profile.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Profile User</title>
	  <style>
		@import url('https://fonts.googleapis.com/css2?family=Baumans&family=Sirin+Stencil&display=swap');
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
		.right2{
		  float: right;
		  width: 65%;
		  padding: 30px 25px;
		  font-family: 'Sirin Stencil';
		  text-align: left;
		  font-size: 20px;
		}
		.left2{
		  float: left;
		  width: 35%;
		  padding: 30px 25px;
		}
		.logo{
		  width: 150px;
		}
		#profil{
		  margin-right: 1px;
		  width: 25px;
		  padding-top: 15px;
		}
		#tickets{
		  margin-right: 1px;
		  padding-top: 15px;
		  padding-right: -5px;
		  width: 25px;
		}
		#settings{
		  margin-right: 0px;
		  padding-top: 15px;
		  padding-right: -5px;
		  width: 25px;
		}
		.box{
		  border: 5px solid #1f58b5;
		  overflow: auto;
		  left: 0;
		  right: 0;
		  top: 0;
		  bottom: 0;
		  margin: 15px 15px 15px 15px;
		}
		.foto{
		  width: 50%;
		  border-radius: 5px;
		  margin-left: 100px;
		  margin-top: 80px;
		}
		h1{
		  font-family: 'Baumans', cursive;
		  margin-left: 10px;
		  margin-top: 10px;
		}
		.edit{
			border: 3px solid #1f58b5;
			border-radius: 5px;
			padding: 5px 10px;
			cursor: pointer;
			font-family: 'Sirin Stencil', cursive;
			font-size: 18px;
			width: 100px;
			transition: .2s;
			  }
		  .edit:hover{
			background-color: #ddd;
		  }
		.netral{
		  padding: 30px 0px 20px 850px;
		  margin-left: 340px;
		}
		.searchbar{
		  border-radius: 5px;
		  border: 2px solid #1f58b5;
		  padding: 12px 15px;
		  width: 100%;
		  font-family: 'Baumans';
		}
		#aboutus{
		  margin-right: 1px;
		  padding-top: 15px;
		  width: 28px;
		}
	  </style>
	</head>
	<body>
		<ul>
			<li class="left"><a href="../index.php"><img src="../assets/Nginep.png" class="logo">
			<li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
			<li class="right"><a href="aboutus.php"><img src="../assets/group.png" id="aboutus">About Us</a></li>
			<li class="right"><a href="booking_list.php?id=0"><img src="../assets/tickets.png" id="tickets">Booking List</a></li>
			<!--<li class="right"><a href="profile.php"><img src="../assets/settings.png" id="settings">Profile</a></li>-->
		</ul>
	
	  <div class="box">
		<div class="user">
		  <h1>Edit Your Profile</h1>
		</div>
		<div class="photocontainer left2">
		  <img src="../../assets/users/<?= $data['foto']; ?>" class="foto">
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="Nama right2">
			  <a>Nama Depan:</a><br>
			  <input type="text" name="first_name" placeholder="Nama Depan" class="searchbar" value="<?= $data['first_name']; ?>">
			</div>
			<div class="Nama right2">
			  <a>Nama Belakang:</a><br>
			  <input type="text" name="last_name" placeholder="Nama Belakang" class="searchbar" value="<?= $data['last_name']; ?>">
			</div>
			<!--<div class="Email right2">
			  <a>Email :</a><br>
			  <a>Email cannot be edited!</a>
			</div>-->
			<div class="TanggalLahir right2">
			  <a>Tanggal Lahir :</a><br>
			  <input type="text" name="birth_date" placeholder="Tanggal Lahir" class="searchbar" value="<?= $data['birth_date']; ?>">
			</div>
			<div class="NoTelp right2">
			  <a>No. Telepon :</a><br>
			  <input type="text" name="telp" placeholder="No. Telp" class="searchbar" value="<?= $data['telp']; ?>">
			</div>
			<div class="Foto right2">
			  <a>Foto :</a><br>
			  <input type="file" name="gambar">
			  <input type="hidden" name="gambarLama" value="<?= $data["foto"]; ?>">
			</div>
			
			  <input type="hidden" name="email" value="<?= $data['email']; ?>">
			  <input type="hidden" name="password" value="<?= $data['password']; ?>">
			  <input type="hidden" name="keterangan" value="<?= $data['keterangan']; ?>">
			
			<div class="buttonedit netral">
			  <button class="edit" type="submit" name="edit">Update</button>
			</div>
		</form>
	  </div>
	</body>
</html>