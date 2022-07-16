<?php
    session_start();
    
    require '../controller/list_booking.php';
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Booking</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        
        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 30%;
            height: 300px;
        }
        
        /* Style the buttons that are used to open the tab content */
        .tab button {
          display: block;
          background-color: inherit;
          color: black;
          padding: 22px 16px;
          width: 100%;
          border: none;
          outline: none;
          text-align: left;
          cursor: pointer;
        }
        
        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }
        
        /* Create an active/current "tab button" class */
        .tab button.active {
          background-color: #ccc;
        }
        
        /* Style the tab content */
        .tabcontent {
          float: left;
          padding: 10px 15px;
          border: 1px solid #ccc;
          width: 70%;
          border-left: none;
          height: auto;
          font-family: "Baloo Bhai 2";
          /*display: none;*/
        }
        .tabcontent {
          animation: fadeEffect 1s; /* Fading effect takes 1 second */
        }
        
        /* Go from zero to full opacity */
        @keyframes fadeEffect {
          from {opacity: 0;}
          to {opacity: 1;}
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
		#aboutus{
		  margin-right: 1px;
		  padding-top: 15px;
		  width: 28px;
		}
		.logo{
		  width: 150px;
		}
        a{
            text-decoration: none;
        }
        h2{
            font-family: "Londrina Solid";
        }
        .foto{
            margin: 10px 0px;
        }
        .book_hotel{
            font-family: "Londrina Solid";
            font-size: 20px;
            border: 1px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            transition: .2s;
        }
        .book_hotel:hover{
            background-color: #ccc;
            cursor: pointer;
        }
        .book{
            /*margin-top: 210px;*/
            /*margin-left: 480px;*/
            float: right;
        }
      </style>
    </head>
    <body>
        <ul>
          <li class="left"><a href="../index.php"><img src="../assets/Nginep.png" class="logo">
          <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Log Out</a></li>
          <li class="right"><a href="aboutus.php"><img src="../assets/group.png" id="aboutus">About Us</a></li>
          <!--<li class="right"><a href="booking.php"><img src="../assets/tickets.png" id="tickets">Booking List</a></li>-->
          <li class="right"><a href="profile.php"><img src="../assets/settings.png" id="settings">Profile</a></li>
        </ul>
        
        <div class="tab">
        <?php
            while($row = $result->fetch_assoc()) :
        ?>
          <a href="booking_list.php?id=<?= $row['id_booking'] ?>" class="nama_hotel_modal"><button class="tablinks"><?= $row['nama_lengkap'] ?> - <?= $row['nama_hotel'] ?></button></a>
        <?php
            endwhile;
            mysqli_free_result($result);
        ?>
        </div>
        
        <?php
            while($row2 = $result2->fetch_assoc()) :
        ?>
        <div class="tabcontent">
          <h2>Data Booking</h2>
          <p>Nama Lengkap: <?= $row2['nama_lengkap']?></p>
          <p>No. Telp: <?= $row2['nomor_telepon'] ?></p>
          <p>Email: <?= $row2['email'] ?></p>
          <br>
          <p>Nama Hotel: <?= $row2['nama_hotel'] ?></p>
          <p>Check In: <?= $row2['check_in'] ?></p>
          <p>Check Out: <?= $row2['check_out'] ?></p>
          <p>Jumlah Kamar: <?= $row2['jumlah_kamar'] ?></p>
          <p>Jumlah Orang: <?= $row2['jumlah_orang'] ?></p>
          <p>Total Harga: Rp. <?= $row2['harga'] ?></p>
          <br>
          <div class="book">
            <a href="../controller/delete_booking.php?id_booking=<?= $row2['id_booking'] ?>"><button type="submit" name="book" class="book_hotel">Delete This Booking</button></a>
            <input type="hidden" name="id_booking" value="<?= $row2['id_booking']; ?>">
        </div>
        </div>
        <?php
            endwhile;
            mysqli_free_result($result2);
            mysqli_close($conn);
        ?>
    </body>
</html>