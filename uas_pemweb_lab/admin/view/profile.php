<?php
  session_start();
  require '../controller/profile_detail.php';
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
        margin: 15px 15px 0px 15px;
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
        margin-left: 230px;
      }
      #aboutus{
        margin-right: 1px;
        padding-top: 15px;
        width: 28px;
      }
      .data{
        font-family: 'Baumans';
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
        <h1>Your Profile</h1>
      </div>
      <div class="photocontainer left2">
        <img src="../../assets/users/<?= $row['foto'] ?>" class="foto">
      </div>
      <div class="Nama right2">
        <a>Nama :</a><br>
        <a class="data"><?= $row['first_name'] . ' ' . $row['last_name'] ?></a>
      </div>
      <div class="Email right2">
        <a>Email :</a><br>
        <a class="data"><?= $row['email'] ?></a>
      </div>
      <div class="TanggalLahir right2">
        <a>Tanggal Lahir :</a><br>
        <a class="data"><?= $row['birth_date'] ?></a>
      </div>
      <div class="NoTelp right2">
        <a>Nomor Telepon :</a><br>
        <a class="data"><?= $row['telp'] ?></a>
      </div>
      <div class="buttonedit netral">
        <a href="edit_profile.php?id=<?= $row['id'] ?>"><button class="edit">Edit Profile</button></a>
      </div>
    </div>
  </body>
</html>