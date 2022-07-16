<?php
	session_start();
	require '../controller/form_booking.php';
	
	if(!isset($_SESSION['login'])){
		header("Location: ../../view/login.php");
	}
?>

<!DOCTYPE html>
<html lang="en" >
	<head>
	  <meta charset="UTF-8">
	  <title>Basic hotel booking form</title>
	  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="form.js">
		<style>
			html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font: inherit;
			font-size: 100%;
			vertical-align: baseline;
		  }
		  
		  html {
			line-height: 1;
		  }
		  
		  ol, ul {
			list-style: none;
		  }
		  
		  table {
			border-collapse: collapse;
			border-spacing: 0;
		  }
		  
		  caption, th, td {
			text-align: left;
			font-weight: normal;
			vertical-align: middle;
		  }
		  
		  /*q, blockquote {
			quotes:;
		  }*/
		  
		  q:before, q:after, blockquote:before, blockquote:after {
			content: "";
			content: none;
		  }
		  
		  a img {
			border: none;
		  }
		  
		  article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
			display: none ;
		  }
		  
		  /* Colors */
		  /* ---------------------------------------- */
		  * {
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		  }
		  
		  body {
			text-align: center;
			font-family: 'Lato', 'sans-serif';
			font-weight: 400;
		  }
		  
		  /*a {
			text-decoration: ;
		  }*/
		  
		  .info-text {
			text-align: left;
			width: 100%;
		  }
		  
		  header, form {
			padding: 4em 10%;
		  }
		  
		  .form-group {
			margin-bottom: 20px;
		  }
		  
		  h2.heading {
			font-size: 18px;
			text-transform: uppercase;
			font-weight: 300;
			text-align: left;
			color: #506982;
			border-bottom: 1px solid #506982;
			padding-bottom: 3px;
			margin-bottom: 20px;
		  }
		  
		  .controls {
			text-align: left;
			position: relative;
		  }
		  .controls input[type="text"],
		  .controls input[type="email"],
		  .controls input[type="number"],
		  .controls input[type="date"],
		  .controls input[type="tel"],
		  .controls textarea,
		  .controls button,
		  .controls select {
			padding: 12px;
			font-size: 14px;
			border: 1px solid #c6c6c6;
			width: 100%;
			margin-bottom: 18px;
			color: #888;
			font-family: 'Lato', 'sans-serif';
			font-size: 16px;
			font-weight: 300;
			-moz-border-radius: 2px;
			-webkit-border-radius: 2px;
			border-radius: 2px;
			-moz-transition: all 0.3s;
			-o-transition: all 0.3s;
			-webkit-transition: all 0.3s;
			transition: all 0.3s;
		  }
		  .controls input[type="text"]:focus, .controls input[type="text"]:hover,
		  .controls input[type="email"]:focus,
		  .controls input[type="email"]:hover,
		  .controls input[type="number"]:focus,
		  .controls input[type="number"]:hover,
		  .controls input[type="date"]:focus,
		  .controls input[type="date"]:hover,
		  .controls input[type="tel"]:focus,
		  .controls input[type="tel"]:hover,
		  .controls textarea:focus,
		  .controls textarea:hover,
		  .controls button:focus,
		  .controls button:hover,
		  .controls select:focus,
		  .controls select:hover {
			outline: none;
			border-color: #9FB1C1;
		  }
		  .controls input[type="text"]:focus + label, .controls input[type="text"]:hover + label,
		  .controls input[type="email"]:focus + label,
		  .controls input[type="email"]:hover + label,
		  .controls input[type="number"]:focus + label,
		  .controls input[type="number"]:hover + label,
		  .controls input[type="date"]:focus + label,
		  .controls input[type="date"]:hover + label,
		  .controls input[type="tel"]:focus + label,
		  .controls input[type="tel"]:hover + label,
		  .controls textarea:focus + label,
		  .controls textarea:hover + label,
		  .controls button:focus + label,
		  .controls button:hover + label,
		  .controls select:focus + label,
		  .controls select:hover + label {
			color: #bdcc00;
			cursor: text;
		  }
		  .controls .fa-sort {
			position: absolute;
			right: 10px;
			top: 17px;
			color: #999;
		  }
		  .controls select {
			-moz-appearance: none;
			-webkit-appearance: none;
			cursor: pointer;
		  }
		  .controls label {
			position: absolute;
			left: 8px;
			top: 12px;
			width: 60%;
			color: #999;
			font-size: 16px;
			display: inline-block;
			padding: 4px 10px;
			font-weight: 400;
			background-color: rgba(255, 255, 255, 0);
			-moz-transition: color 0.3s, top 0.3s, background-color 0.8s;
			-o-transition: color 0.3s, top 0.3s, background-color 0.8s;
			-webkit-transition: color 0.3s, top 0.3s, background-color 0.8s;
			transition: color 0.3s, top 0.3s, background-color 0.8s;
			background-color: white;
		  }
		  .controls label.active {
			top: -11px;
			color: #555;
			background-color: white;
			width: auto;
		  }
		  .controls textarea {
			resize: none;
			height: 200px;
		  }
		  
		  button {
			cursor: pointer;
			background-color: #1b3d4d;
			border: none;
			color: #fff;
			padding: 12px 0;
			float: right;
		  }
		  button:hover {
			background-color: #224c60;
		  }
		  
		  .clear:after {
			content: "";
			display: table;
			clear: both;
		  }
		  
		  .grid {
			background: white;
		  }
		  .grid:after {
			/* Or @extend clearfix */
			content: "";
			display: table;
			clear: both;
		  }
		  
		  [class*='col-'] {
			float: left;
			padding-right: 10px;
		  }
		  .grid [class*='col-']:last-of-type {
			padding-right: 0;
		  }
		  
		  .col-2-3 {
			width: 66.66%;
		  }
		  
		  .col-1-3 {
			width: 33.33%;
		  }
		  
		  .col-1-2 {
			width: 50%;
		  }
		  
		  .col-1-4 {
			width: 25%;
		  }
		  
		  @media (max-width: 760px) {
			.col-1-4-sm, .col-1-3, .col-2-3 {
			  width: 100%;
			}
		  
			[class*='col-'] {
			  padding-right: 0px;
			}
		  }
		  .col-1-8 {
			width: 12.5%;
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
		  #settings{
			margin-right: 0px;
			padding-top: 15px;
			padding-right: -5px;
			width: 25px;
		  }
		  #tickets{
			margin-right: 1px;
			padding-top: 15px;
			padding-right: -5px;
			width: 25px;
		  }
		</style>  
	</head>
	<body>
		<ul>
			<li class="left"><a href="../index.php"><img src="../assets/Nginep.png" class="logo">
			<li class="right"><a href="../controller/logout.php"><img src="../assets/Frame.png" id="profil">Logout</a></li>
			<li class="right"><a href="aboutus.php"><img src="../assets/group.png" id="aboutus">About Us</a></li>
			<li class="right"><a href="booking_list.php?id=0"><img src="../assets/tickets.png" id="tickets">Booking List</a></li>
			<li class="right"><a href="profile.php"><img src="../assets/settings.png" id="settings">Profile</a></li>
		</ul>
	
		<form action="" method="post">
		  <!--  General -->
		  <div class="form-group">
			<h2 class="heading">Booking & contact</h2>
			<div class="grid">
				<div class="col-1-2">
				  <div class="controls">First Name
					<input type="text" id="first_name" class="floatLabel" name="first_name" value="<?= $row2['first_name'] ?>">
				  </div>         
				</div>
				<div class="col-1-2">
				  <div class="controls">Last Name
					<input type="text" id="last_name" class="floatLabel" name="last_name" value="<?= $row2['last_name'] ?>">
				  </div>         
				</div>
			  </div>
			<div class="controls">Email
			  <input type="text" id="email" class="Email" name="email" value="<?= $row2['email'] ?>">
			</div>       
			<div class="controls">Phone
			  <input type="tel" id="phone" class="Nomor" name="telp" value="<?= $row2['telp'] ?>">
			</div>
		  </div>
		  
		  <?php
			while($row = $result->fetch_assoc()) :
		  ?>
		  <!--  Details -->
		  <div class="form-group">
			<h2 class="heading">Details</h2>
			<div class="grid">
			<div class="controls">Hotel Name
				<input type="text" id="hotel" class="floatLabel" name="nama_hotel" value="<?= $row['nama_hotel'] ?>">
				<input type="hidden" id="harga" name="harga" value="<?= $row['harga'] ?>">
			</div>
			
			<div class="grid">
			<div class="col-1-4 col-1-4-sm">
			  <div class="controls">Check In
				<input type="date" id="check_in" class="floatLabel" name="check_in" value="<?php echo date('Y-m-d'); ?>">
			  </div>      
			</div>
			<div class="col-1-4 col-1-4-sm">
			  <div class="controls">Check Out
				<input type="date" id="check_out" class="floatLabel" name="check_out" value="<?php echo date('Y-m-d'); ?>" />
			  </div>      
			</div>
			  </div>
		  
			  <div class="grid">
			<div class="col-1-3 col-1-3-sm">
			  <div class="controls">People
				<select class="floatLabel" name="jumlah_orang">
				  <option value="" disabled selected>People</option>
				  <?php
					for($j=1; $j<=10; $j++):
				  ?>
				  <option value="<?= $j; ?>"><?= $j; ?></option>
				  <?php endfor; ?>
				</select>
			  </div>      
			</div>
			<div class="col-1-3 col-1-3-sm">
			<div class="controls">Room(s)
			  <select class="floatLabel" name="jumlah_kamar">
				  <option value="" disabled selected>Room(s)</option>
				  <?php
					for($i=1; $i<=$row['kamar']; $i++):
				  ?>
				  <option value="<?= $i; ?>"><?= $i; ?></option>
				  <?php endfor; ?>
			  </select>
			 </div>     
			</div>
		  </div>
			<?php
				endwhile;
				mysqli_free_result($result);
				mysqli_close($conn);
			?>
			
			  <div class="grid">
				<!--<p class="info-text">Please describe your needs e.g. Extra beds, children's cots</p>
				<br>
				<div class="controls">Comments
				  <textarea name="comments" class="floatLabel" id="comments"></textarea>
				  <label for="comments">Comments</label>
					</div>-->
					<button type="submit" class="col-1-4" name="book">Book Hotel</button>
					<button class="col-1-4" name="cancel" style="margin-left:30px;">Cancel</button>
			  </div>  
		  </div> <!-- /.form-group -->
		</form>
		
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
		<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
		<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
        //    $(document).ready(function() {
        //    $(".book").click(function(){
        //        $.ajax({
        //            url: "../controller/book_hotel.php", 
        //            type: "post", 
        //            data:{product_id:$("input[name='id_hotel']").val(),
        //            nama_hotel:$(".nama_hotel_modal").html(),
        //            harga:$("input[name='harga']").val()}, 
        //            success: function(result){
        //                window.location.replace("../index.php");
        //            }
        //        });
        //    });
        //});
        </script>
	</body>
</html>