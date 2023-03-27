<?php
session_start();
error_reporting(0);
$id = $_GET["id"];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");

?>
 
 <?php
 $res5 = mysqli_query($link, "select count(pid) as reviews from review where pid=$id");
    $row5 = mysqli_fetch_array($res5);
		$res6 = mysqli_query($link, "select sum(star) as stars from review where pid=$id");
    $row6 = mysqli_fetch_array($res6);
	$rating=round($row6["stars"] / $row5["reviews"],1);
 ?>
 
<?php
$sesid=$_SESSION["userid"];
$res9=mysqli_query($link, "select firstname from checkout_address where id=$sesid");
$row9=mysqli_fetch_array($res9);

if (isset($_POST["submit2"])) {
	if($_SESSION["userid"]=="")
					{ ?>
				<script>
				alert("You are not logged in!");
				</script>
				<?php
					}
					else
					{
	if (isset($_POST['radio'])) {
mysqli_query($link,"insert into review values($id,$sesid,'$row9[firstname]','$_POST[review]',NOW(),'$_POST[radio]')");
}
else
{
	?>
				<script>
				alert("Please rate the food from 1 to 5 stars!");
				</script>
	<?php
}
}}

if (isset($_POST["submit1"])) {
    $d = 0;
    if (is_array($_COOKIE['item'])) 
    {

        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    
    $res3 = mysqli_query($link, "select * from product where id=$id");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $prize = $row3["product_price"];
        $qty = $_POST[pqnty];
        $total = $prize * $qty;
    }

    if (is_array($_COOKIE['item']))  
    {
        foreach ($_COOKIE['item'] as $name1 => $value)   
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0])      
            {
                //check here for quantity add in the cart for more than available quantity
                $found = $found + 1;
                $qty = $values11[3] + $_POST[pqnty];

                

                    $total = $values11[2] * $qty;
                    setcookie("item[$name1]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);
                }
            

        }

        if ($found == 0) {
            

                setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);//new

            }
        

    } else {
        
            setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);//new
        }
    


}
include("header.php");
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
<!-- here --><div class="col-sm-12 padding-right">
<div class="product-details"> 
<!--product-details-->
<div class="col-sm-5"> 
  <div class="view-product"> <img src="../admin/<?php echo $row["product_image"]; ?>" alt=""/> 
  </div>
</div>
<form name="form1" action="" method="post" enctype="multipart/form-data" style="background-color: #ccc;">
  <div class="col-sm-7"> 
    <div class="product-information"> 
      <!--/product-information-->
      <h2><?php echo $row["product_name"]; ?></h2>
      <p><b>Product ID: </b><?php echo $row["id"]; ?></p>
	  
	  
	  
	  <p><b>Product Rating: </b><span> <span><?php echo $rating; ?></span><b> stars</b></p>
      <span> <span>BDT <?php echo $row["product_price"]; ?></span> 
      <label>Quantity:</label>
      <td><input type="text" value="1" name="pqnty"></td>
      <button type="submit" name="submit1" class="btn btn-fefault cart"> <i class="fa fa-shopping-cart"></i> 
      Add to cart </button>
      </span> 
	  <p><b>Nutrition Values:</b></p>
	  <table>
	  <tr>
	  <td style="background-color: #3be913; width:200px; border: 1px solid black;">Calorie</td>
	  <td style="text-align:right; background-color: #3be913; width:100px; border: 1px solid black;"><?php echo $row["calorie"]; ?>  kcal</td>
	  </tr>
	  <tr>
	  <td style="background-color: #3be913; width:100px; border: 1px solid black;">Carbohydrate</td>
	  <td style="text-align:right; background-color: #3be913; width:100px; border: 1px solid black;"><?php echo $row["carbohydrate"]; ?>  g</td>
	  </tr>
	  <tr>
	  <td style="background-color: #3be913; width:100px; border: 1px solid black;">Protein</td>
	  <td style="text-align:right; background-color: #3be913; width:100px; border: 1px solid black;"><?php echo $row["protein"]; ?>  g</td>
	  </tr>
	  <tr>
	  <td style="background-color: #3be913; width:100px; border: 1px solid black;">Fat</td>
	  <td style="text-align:right; background-color: #3be913; width:100px; border: 1px solid black;"><?php echo $row["fat"]; ?>  g</td>
	  </tr>
	  </table>
      
    </div>
    <!--/product-information-->
  </div>
  </div>
  <!--/product-details-->
</form>
<!-- end here-->
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
  $res4 = mysqli_query($link, "select * from review where pid=$id");
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