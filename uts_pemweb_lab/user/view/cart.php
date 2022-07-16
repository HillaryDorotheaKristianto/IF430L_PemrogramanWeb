<?php
    session_start();
    
    require '../include/db_connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Merienda&family=Patrick+Hand+SC&family=Pacifico&family=Righteous&family=Dancing+Script&display=swap');
            
            body{
              background-color: #f1d7a4;
              height: 647px;
              margin: 3px;
              box-sizing: border-box;
              background-image: url('BakcgroundCart.png');
              background-repeat: no-repeat;
              background-size: 983px;
              background-position: 525px 0px;
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
      
            .navbar{
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
            .cart2{
              width: 100%;
            }      
            .frame { 
              margin-left : 50px;
              margin-top : 10px;
            }
            .isicart{ 
              border: 3px solid; 
              width : auto;
              height: auto;
              margin-top: 10px;
              margin-bottom: 3px;
              font-family: "Righteous";
              padding: 25px 80px;
              display: block;
            }
            #menu_img{
                width: 200px;
                margin-right: 50px;
                float: left;
            }
            .add_min_btn{
                width: 20px;
                cursor: pointer;
                margin-top: 17px;
            }
            .footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
            }
            #checkout{
                border: 1px solid #856d3e;
                background-color: #856d3e;
                cursor: pointer;
            }
            #total{
                border: 1px solid #c9a55e;
                background-color: #c9a55e;
            }
            .total_co{
                padding: 14px 16px;
                font-family: "Patrick Hand SC";
                font-size: 20px;
            }
            .card{
                display: block;
            }
        </style>
        
        <script>
            function co(){
                alert("Berhasil!");
                window.location.href = "../index.php";
            }
        </script>
    </head>
    <body>
       <ul>
            <li>Restoran UTS IF430</li>
            <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil" class="navbar">Logout</a></li>
            <li class="right"><a href="../index.php"><img src="../assets/home.png" id="cart" class="navbar"></a></li>
        </ul>

        <div class="cartlogo">
          <img src="../assets/Cart@2x.png" class="cart2">
        </div>

        <div class="isicart">
            <?php
                $id = $_SESSION['id_user'];
                $query = "SELECT c.id_cart, c.id_menu, c.nama_menu, c.qty, c.total_harga, m.gambar FROM cart AS c INNER JOIN menu AS m ON c.id_menu = m.id WHERE id_user = '$id'";
                $result = $conn->query($query);
                $total = 0;
                while($row = $result->fetch_assoc()):
            ?>
            <div class="card" style="margin-top:50px;">
                <img src="../../assets/menu/<?= $row['gambar'] ?>" id="menu_img">
                <div id="menu_info">
                    <p id="nama_menu" class="menu"><?= $row['nama_menu'] ?></p>
                    <p class="menu">Rp. <?= $row['total_harga'] ?></p>
                    <p class="menu">Quantity: <?= $row['qty'] ?></p>
                    <a href="../controller/delete_cart_menu.php?id=<?= $row['id_cart']; ?>"><img src="../assets/trash.png" style="width:20px;"></a>
                </div>
                <br><br><br><br>
                <?php
                            $total = $total + ($row['qty'] * $row['total_harga']);
                    endwhile;
                ?>
            </div>
            
        </div>
        <div>
                <div class="footer">
                    <p class="right total_co" id="checkout" onclick="co();">Checkout</p>
                    <p class="right total_co" id="total">Total: Rp. <?= $total; ?></p>
                </div>
            </div>
        
        
    </body>
</html>