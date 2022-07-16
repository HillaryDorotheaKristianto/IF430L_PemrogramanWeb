<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="aboutus.css" rel="stylesheet" type="text/css" />
    <title>About Us</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Rock+Salt&family=Baloo+Bhai+2&family=Odibee+Sans&display=swap');
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
		h1{
			text-align: center;
			font-family: 'Odibee Sans', cursive;
			color: #193f7c;
			font-size: 70px;
			margin-top: 25px;
		}
		h2{
			text-align: center;
			font-family: 'Baloo Bhai 2', cursive;
			color: #193f7c;
			font-size: 18px;
			margin-top: 25px;
		}
		.kanan{
			margin-right: 50px;
			margin-top: 50px;
			float:right;
		}
		.kiri{
			margin-top: 50px;
			margin-left: 50px;
			float:left;
		}
		.pesawat{
			width: 30%;
			margin-left: 470px;
			margin-top: 135px;
			display: block;
			position: absolute;
			/*height: 100%;*/
			/*opacity: 0.5;*/
			/*top: 0;*/
			/*left: 0;*/
			z-index: -1;
		}
		.juan{
			border: 3px solid #193f7c;
			border-radius: 5px;
			text-align: center;
			padding: 15px 5px 15px 0px;
			background-color: #f2f2f2;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			font-family: 'Odibee Sans', cursive;
			font-size: 22px;
		}
		.foto{
			width: 20%;
			border-radius: 50%;
			margin-top: 15px;
			margin-bottom: 15px;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.thea{
			margin-top: 50px;
			border: 3px solid #193f7c;
			border-radius: 5px;
			text-align: center;
			padding: 15px 5px 15px 0px;
			background-color: #f2f2f2;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			font-family: 'Odibee Sans', cursive;
			font-size: 22px;
		}
		.jason{
			border: 3px solid #193f7c;
			border-radius: 5px;
			text-align: center;
			padding: 15px 5px 15px 0px;
			background-color: #f2f2f2;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			font-family: 'Odibee Sans', cursive;
			font-size: 22px;
		}
		.leo{
			margin-top: 50px;
			border: 3px solid #193f7c;
			border-radius: 5px;
			text-align: center;
			padding: 15px 5px 15px 0px;
			background-color: #f2f2f2;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			font-family: 'Odibee Sans', cursive;
			font-size: 22px;
			margin-bottom: 50px;
		}
	</style>
</head>
<body>
    <ul>
        <li class="left"><a href="../index.php"><img src="../assets/Nginep.png" class="logo">
        <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
        <li class="right"><a href="booking_list.php?id=0"><img src="../assets/tickets.png" id="tickets">Booking List</a></li>
        <li class="right"><a href="profile.php"><img src="../assets/settings.png" id="settings">Profile</a></li>
      </ul>
      <h1>About Us</h1>
      <h2>This page is about us who make this website to reach our dream as an IT</h2>
      <div class="kanan">
        <div class="juan">
            <a>Juan Alvito</a><br>
            <img class="foto" src="../assets/juan.jpg">
            <a>Back End Developer</a>
        </div>
        <div class="thea">
            <a>Hillary Dorothea K</a><br>
            <img class="foto" src="../assets/thea.png">
            <a>Back End Developer</a>
        </div>
      </div>
      <div class="tengah">
        <img class="pesawat" src="../assets/pesawat.png">
      </div>
      <div class="kiri">
        <div class="jason">
            <a>Jason Haryanto R</a><br>
            <img class="foto" src="../assets/jason2.jpg">
            <a>Front End Developer</a>
        </div>
        <div class="leo">
            <a>Leonardo Steven</a><br>
            <img class="foto" src="../assets/leo2.jpg">
            <a>Front End Developer</a>
        </div>
      </div>
</body>
</html>