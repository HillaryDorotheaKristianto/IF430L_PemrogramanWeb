<?php
	require '../controller/detail.php';
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
            /*height: 300px;*/
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
            color: black;
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
          <li class="right"><a href="login.php"><img src="../assets/Frame.png" id="profil">Login</a></li>
          <li class="right"><a href="aboutus.php"><img src="../assets/group.png" id="aboutus">About Us</a></li>
        </ul>
        
        <div class="tab">
        <?php
            while($row = $result->fetch_assoc()) :
        ?>
          <a href="detail_hotel.php?id=<?= $row['id_hotel'] ?>" class="nama_hotel_modal"><button class="tablinks"><?= $row['nama_hotel'] ?></button></a>
        <?php
            endwhile;
            mysqli_free_result($result);
        ?>
        </div>
        
        
        <?php
            while($row2 = $result2->fetch_assoc()) :
        ?>
        <div class="tabcontent">
          <h2><?= $row2['nama_hotel'] ?></h2>
          <img src="../assets/hotel/<?= $row2['foto'] ?>" class="foto">
          <p>Bintang: <?= $row2['bintang'] ?></p>
          <p>Kamar: <?= $row2['kamar'] ?></p>
          <p>Harga: Rp. <?= $row2['harga'] ?></p>
          <br>
          <p>Alamat: <?= $row2['alamat'] ?></p>
          <p>No. Telp: <?= $row2['telp'] ?></p>
          <br>
          <div class="book">
            <a href="../user/view/booking_form.php?id_hotel=<?= $row2['id_hotel']; ?>"><button type="submit" name="book" class="book_hotel">Book This Hotel</button></a>
            <input type="hidden" name="id_hotel" value="<?= $row2['id_hotel']; ?>">
        </div>
        </div>
        <?php
            endwhile;
            mysqli_free_result($result2);
            mysqli_close($conn);
        ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $(".book").click(function(){
                $.ajax({
                    url: "../controller/book_hotel.php", 
                    type: "post", 
                    data:{product_id:$("input[name='id_hotel']").val(),
                    nama_hotel:$(".nama_hotel_modal").html(),
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