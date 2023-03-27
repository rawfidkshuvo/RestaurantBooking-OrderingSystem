<?php
error_reporting(0);
session_start();
$link1 = mysqli_connect("localhost", "root", "");
mysqli_select_db($link1, "burger_shop");
$xid=$_SESSION["userid"];
$rin=mysqli_query($link1,"select * from checkout_address where id=$xid");
$pin=mysqli_fetch_array($rin);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TASTY-FOOD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"> 
<!--header-->
<div class="header_top"> 
  <!--header_top-->
  <div class="container"> 
    <div class="row"> 
      <div class="col-sm-6 "> 
        <div class="contactinfo"> 
          <ul class="nav nav-pills">
            <li><a href=""><i class="fa fa-phone"></i> +880 1677 213 280</a></li>
            <li><a href=""><i class="fa fa-envelope"></i> tastyfood83@gmail.com</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6"> 
        <div class="social-icons pull-right"> 
          <ul class="nav navbar-nav">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/header_top-->
<div class="header-middle"> 
  <!--header-middle-->
  <div class="container"> 
    <div class="row"> 
      <div class="col-sm-4"> 
        <div class="logo pull-left"> <a href="shop.php"><img src="images/home/dine.png" alt="" height=100 width=150 /></a> 
        </div>
        <div class="btn-group pull-right"> 
          <div class="btn-group"> </ul> </div>
          <div class="btn-group"> </ul> </div>
        </div>
      </div>
      <div class="col-sm-8"> 
        <div class="shop-menu pull-right"> 
          <ul class="nav navbar-nav">
            
			<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
			
			<?php

			if($_SESSION["userid"]=="")
			{ ?>
			<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
			<?php
			}
			else
			{
			?>
			<li><a href="cart.php"><i class="fa fa-user"></i> HI, <?php echo $pin["firstname"];?></a></li>
			<li><a href="logout.php">(Logout)</a></li>
			<?php } ?>
			</br>
			</br>
			</br>
			<form name="form1" action="search.php" method="post" style="text-align: right" >
                <input type="text" name="firstname" placeholder="Search food" style=" background-color: #FFA500"/>
                <input type="submit" name="submit1" value="SEARCH" style="background-color:#9ACD32; color:white; font-weight:bold">
            </form>
          </ul>
        </div>
      </div>
	  
    </div>
  </div>
</div>
<!--/header-middle-->
<div class="header-bottom"> 
  <!--header-bottom-->
  <div class="container"> 
    <div class="row"> 
      <div class="col-sm-9"> 
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
          <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
          <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="mainmenu pull-left"> 
          <ul class="nav navbar-nav collapse navbar-collapse">
          </ul>
        </div>
      </div>
      <div class="col-sm-3"> </div>
    </div>
  </div>
</div></div>
</section> <section> <div class="container"> <div class="row">