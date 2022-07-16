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
          background-color: #f1d7a4;
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
          float: right;
          position: relative;
          top: 15%;
          right: 9.5%;
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
          border: 5px solid #CCBB25;
        }
        #right{
          background-image: url('../assets/login.png');
          background-repeat: no-repeat;
          width: 50%;
          position: absolute;
          right: 0px;
          height: 100%;
        }
        #left{
          width: 50%;
          position: absolute;
          left: 0px;
          height: 100%;
        }
    </style>
  </head>
  <body>
  <div id="wrapper">
    <div id="left">
      <img src="../assets/Sweet Space.png">
    </div>

    <div id="right">    
      <form action="" method="post">
        <ul>
          <div id="form">
          <li>
            <label>First Name</label>
            <input class="block" type="text" name="firstname">
          </li>
          <li>
            <label>Last Name</label>
            <input class="block" type="text" name="lastname">
          </li>
          <li>
            <label>Gender</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male" style="font-family: 'Akaya Telivigala';">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female" style="font-family: 'Akaya Telivigala';">Female</label>
          </li>
          <li>
            <label>Birth Date</label>
            <input class="block" type="date" name="birthdate">
          </li><br>
          <div style="margin-left:20px;">
            <li>
              <label>E-mail</label>
              <input class="block" type="email" name="email">
            </li>
            <li>
              <label>Password</label>
              <input class="block" type="password" name="password">
            </li><li>
              <label>Confirm Password</label>
              <input class="block" type="password" name="password2">
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