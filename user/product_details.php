<?php
error_reporting(0);
$id = $_GET["id"];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");

?>

<?php


if (isset($_POST["submit1"])) {
    $d = 0;
    if (is_array($_COOKIE['item'])) //this is for checking cookies available or not
    {

        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    //to get item description from table
    $res3 = mysqli_query($link, "select * from product where id=$id");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $prize = $row3["product_price"];
        $qty = $_POST[pqnty];
        $total = $prize * $qty;
    }

    if (is_array($_COOKIE['item']))  //this is for check cookies are available or nor
    {
        foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0])      //this is for check same cookies available or not if available then increase qty
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
include "header.php";
?>
<?php



            $res = mysqli_query($link, "select * from product where id=$id");
            while ($row = mysqli_fetch_array($res))
            {
            ?>
<!-- here --><div class="col-sm-9 padding-right">
<div class="product-details"> 
<!--product-details-->
<div class="col-sm-5"> 
  <div class="view-product"> <img src="../admin/<?php echo $row["product_image"]; ?>" alt=""/> 
  </div>
</div>
<form name="form1" action="" method="post" enctype="multipart/form-data">
  <div class="col-sm-7"> 
    <div class="product-information"> 
      <!--/product-information-->
      <h2><?php echo $row["product_name"]; ?></h2>
      <p>Product ID: <?php echo $row["id"]; ?></p>
      <span> <span>BDT <?php echo $row["product_price"]; ?></span> 
      <label>Quantity:</label>
      <td><input type="text" value="1" name="pqnty"></td>
      <button type="submit" name="submit1" class="btn btn-fefault cart"> <i class="fa fa-shopping-cart"></i> 
      Add to cart </button>
      </span> 
      <p><b>Condition:</b> Fresh and hygenic</p>
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
				
				
				
				
<?php
include "footer.php";
?>
</body>
</html>