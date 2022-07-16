<?php
	require '../controller/update_menu.php';
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Edit Menu</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Pacifico|Dancing+Script|Akaya+Telivigala');
            *{
              margin: 0px;
              padding: 0px;
              box-sizing: border-box;
            }
            body{
              background-color: #d0ad6a;
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
            #addmenu{
              width: 95%;
              margin-left: 30px;
              margin-top: 20px;
            }
            form{
              margin-left: 30px;
              margin-top: -20px;
              padding: 30px 80px;
              border: 3px solid black;
              margin-bottom: 30px;
              width: 95%;
            }
            p{
              margin-top: 20px;
            }
            .input{
              border-radius: 5px;
              border: 1px solid #856D3E;
              padding: 10px 15px;
              background-color: #d0ad6a;
              width: 500px;
              font-family: "Akaya Telivigala";
            }
            textarea{
              height: 200px;
            }
            label{
              font-family: "Dancing Script";
              font-size: 25px;
            }
            .button{
              padding: 10px 15px;
              background-color: #d0ad6a;
              border-radius: 5px;
              border: 1px solid #856D3E;
              font-family: "Akaya Telivigala";
              font-size: 15px;
              margin-top: 20px;
              margin-bottom: 20px;
							transition: .2s;
							cursor: pointer;
            }
						.cancel{
							margin-left: 10px;
						}
						.button:hover{
							color: white;
							background-color: #856D3E;
						}
    </style>
  </head>
  <body>
          <ul>
              <li>Restoran UTS IF430</li>
              <li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
              <li class="right"><a href="../index.php"><img src="../assets/home.png" id="home"></a></li>
          </ul>
          
          <img src="../assets/editmenu.png" id="addmenu">

          <form action="" method="post" enctype="multipart/form-data">
            <div>
              <p>
                <label>Menu Name</label>
                <input type="text" name="nama_menu" class="input" placeholder="Menu Name" style="margin-left:200px;" value="<?= $data['nama']; ?>">
              </p>
              <p>
                <label>Price</label>
                <input type="text" name="harga" class="input" placeholder="Price" style="margin-left:263px;" value="<?= $data['harga']; ?>">
              </p>
              <p>
                <label>Category</label>
                <input type="text" name="categori" class="input" placeholder="Category" style="margin-left:230px;" value="<?= $data['kategori']; ?>">
              </p>
              <p>
                <label>Description</label>
                <textarea name="description" class="input" placeholder="Description" style="margin-left:207px;"><?= $data['deskripsi']; ?></textarea>
              </p>
              <p>
                <label>Import Image</label>
                <input type="file" name="gambar" style="margin-left:183px;">
								<input type="hidden" name="gambarLama" value="<?= $data["gambar"]; ?>">
              </p>
              <p class="center">
                <button type="submit" name="edit" class="button">Edit Menu</button>
								<button class="button cancel" name="cancel">Cancel</button>
              </p>
            </div>
        </form>
  </body>
</html>