<?php
include("header.php");
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");
$id=$_SESSION["userid"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | BURGER-Shop</title>
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
</head>
<!--/head-->

<body>
<?php

?>


<?php



            $res = mysqli_query($link, "select * from product where id=$id");
            while ($row = mysqli_fetch_array($res))
            {
            ?>

<?php

                }
                ?>
				
				
				

				
				
<section id="cart_items"> 
<div class="container"> 
  <div class="breadcrumbs"> 
    <ol class="breadcrumb">
     
    </ol>
  </div>
  
  <h2 class="title text-center">Write a review</h2>
 <form name="form2" action="" method="post" >
                             
							 <input type="text" name="review" placeholder="Write a review..." style=" background-color: #FFA500; width:760px; height:48px;"/>
							 <input type="Radio" name="radio" value="1"><b>1 star</b> 
							<input type="Radio" name="radio" value="2"><b>2 star</b> 	
							<input type="Radio" name="radio" value="3"><b>3 star</b> 
							<input type="Radio" name="radio" value="4"><b>4 star</b> 
							<input type="Radio" name="radio" value="5"><b>5 star</b> 
                            <input type="submit" name="submit2" value="SUBMIT" style="background-color:#9ACD32; color:white; font-weight:bold; width:105px; height:48px;">
                        </form> 
						<br>
						<br>
						<h2 class="title text-center">Reviews</h2>
<div class="table-responsive cart_info"> 
    <table class="table table-condensed">
      <thead>
          <tr class="cart_menu"> 
            
            <th>Name</th>
            <th>Review</th>
			<th>Stars</th>
            <th>Date</th>
            
          </tr>
		  
		  <?php
  $res4 = mysqli_query($link, "select * from review where uid=$id");
    while ($row4 = mysqli_fetch_array($res4)) {
		?>
		  <tr>
		  <td style="background-color: #ccc; border: 1px solid white;"><b><?php echo $row4["name"]; ?></b></td>
		  <td style="background-color: #ccc; border: 1px solid white;"><b><?php echo $row4["review"]; ?></b></td>
		  <td style="background-color: #ccc; border: 1px solid white;"><b><?php echo $row4["star"]; ?></b></td>
		  <td style="background-color: #ccc; border: 1px solid white;"><b><?php echo $row4["date"]; ?></b></td>
		  </tr>
		  <?php
	}
	?>
        </thead>
    </table>
	</div>
	
</body>
</html>
<?php
include "footer.php";
?>