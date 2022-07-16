<?php
    session_start();
	
    if(isset($_SESSION["login"])){
      header("Location: ../index.php");
      exit;
    }
    
    require '../controller/insert_user.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Merienda&display=swap');
        body{
          background-color: #a4cef1;
          height: 647px;
          margin: 3px;
          box-sizing: border-box;
        }
        img{
          width: 300px;
          margin-top: 300px;
          margin-left: 100px;
        }
        ul{
          list-style-type: none;
        }
        li{
          margin-top: 10px;
        }
        input{
          margin-top: 5px;
        }
        .block{
          display: block;
          padding: 10px 15px;
          width: 200px;
        }
        button{
          padding: 10px 15px;
          font-family: "Merienda";
          margin-top: 10px;
          position: center;
        }
        label{
          font-family: "Merienda";
        }
        input{
          font-family: "Akaya Telivigala";
          border-radius: 5px;
        }
        form{
          border: 1px solid black;
          width: 500px;
          padding: 20px 15px;
          padding-right: 80px;
          position: relative;
          margin-top: 7%;
          margin-left: 5%;
          background-color: rgba(218, 218, 218, 0.5);
        }
        #form{
          column-count: 2;
        }
        .center{
          text-align: center;
        }
        a{
          text-decoration: none;
          color: blue;
        }
        #wrapper{
          position: absolute;
          overflow: auto;
          left: 5px;
          right: 5px;
          top: 5px;
          bottom: 5px;
          border: 3px solid #25ccc4;
        }
        #left{
          width: 50%;
          /*left: 0px;*/
          margin-top: -30px;
          height: 100%;
          float: right;
        }
    </style>
  </head>
  <body>
  <div id="wrapper">
    <div id="left">
      <img src="../assets/login.png">
    </div>

    <div id="right">    
      <form action="" method="post" enctype="multipart/form-data">
        <ul>
          <div id="form">
          <li>
            <label>First Name</label>
            <input class="block" type="text" name="firstname" required>
          </li>
          <li>
            <label>Last Name</label>
            <input class="block" type="text" name="lastname">
          </li>
          <li>
            <label>Phone Number</label>
            <input class="block" type="text" name="telp" required>
          </li>
          <li>
            <label>Birth Date</label>
            <input class="block" type="date" name="birthdate" required>
          </li><br><br><br>
          <div style="margin-left:20px;">
            <li>
              <label>E-mail</label>
              <input class="block" type="email" name="email" required>
            </li>
            <li>
              <label>Password</label>
              <input class="block" type="password" name="password" required>
            </li>
            <li>
              <label>Confirm Password</label>
              <input class="block" type="password" name="password2" required>
            </li>
            <li>
              <label>Image</label>
              <input class="block" type="file" name="foto">
            </li>
          </div>
          </div>
          <li class="center">
          <button type="submit" name="signup">Sign Up</button>
          </li>
          <li class="center">
          <label>Already have an account? Log in <a href="login.php">here</a></label>
          </li>
        </ul>
      </form>
    </div>  
  </div>
  </body>
</html>