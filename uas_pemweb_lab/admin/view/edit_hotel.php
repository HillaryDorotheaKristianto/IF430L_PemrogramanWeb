<?php
	require '../controller/update_hotel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Hotel</title>
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
		/*.edit{
			border: 3px solid #1f58b5;
			border-radius: 5px;
			padding-top: 25px;
			padding-bottom: 25px;
			padding-left: 25px;
			padding-right: 25px;
			cursor: pointer;
			font-family: 'Sirin Stencil', cursive;
			background-color: #1f58b5;
			font-size: 18px;
			color: white;
		}*/
    .add{
			border: 3px solid #1f58b5;
			border-radius: 5px;
			padding: 5px 10px;
			cursor: pointer;
			font-family: 'Sirin Stencil', cursive;
			font-size: 18px;
      width: 100px;
      transition: .2s;
		}
    .add:hover{
      background-color: #ddd;
    }
		.netral{
			padding: 30px 0px 20px 850px;
      margin-left: 230px;
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
    <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Log Out</a></li>
    <li class="right"><a href="aboutus.php"><img src="../assets/group.png" id="aboutus">About Us</a></li>
    <li class="right"><a href="booking.php?id=0"><img src="../assets/tickets.png" id="tickets">Booking List</a></li>
    <li class="right"><a href="profile.php"><img src="../assets/settings.png" id="settings">Settings</a></li>
  </ul>

  <div class="box">
    <div class="user">
      <h1>Edit Hotel</h1>
    </div>
    <div class="photocontainer left2">
      <img src="../../assets/hotel/<?= $data['foto']; ?>" class="foto">
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <li class="Nama right2">
        <label>Nama Hotel</label><br>
        <input type="text" placeholder="Nama Hotel" class="searchbar" name="nama_hotel" value="<?= $data['nama_hotel']; ?>">
      </li>
      <li class="Alamat right2">
        <label>Alamat Hotel</label><br>
        <input type="text" placeholder="Alamat" class="searchbar" name="alamat" value="<?= $data['alamat']; ?>">
      </li>
      <li class="Alamat right2">
        <label>No. Telp</label><br>
        <input type="text" placeholder="To. Telp" class="searchbar" name="telp" value="<?= $data['telp']; ?>">
      </li>
      <li class="Alamat right2">
        <label>Kota</label><br>
        <input type="text" placeholder="Kota" class="searchbar" name="kota" value="<?= $data['kota']; ?>">
      </li>
      <li class="Harga right2">
        <label>Harga</label><br>
        <input type="text" placeholder="Harga" class="searchbar" name="harga" value="<?= $data['harga']; ?>">
      </li>
      <li class="Bintang right2">
        <label>Bintang</label><br>
        <select name="bintang" class="searchbar">
          <option value="<?= $data['bintang']; ?>"><?= $data['bintang']; ?></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </li>
      <li class="Bintang right2">
        <label>Jumlah Kamar</label><br>
        <select name="kamar" class="searchbar">
          <option value="<?= $data['kamar']; ?>"><?= $data['kamar']; ?></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </li>
      <li class="Foto right2">
        <label>Foto</label><br>
        <input type="file" name="gambar">
				<input type="hidden" name="gambarLama" value="<?= $data["foto"]; ?>">
      </li>
      <li class="buttonedit netral">
        <button class="add" type="submit" name="edit">Update</button>
				<button class="add" name="cancel">Cancel</button>
      </li>
    </form>
  </div>
</body>
</html>