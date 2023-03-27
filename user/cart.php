

<?php
include "header.php";
session_start();

if (is_array($_COOKIE['item']))  //this is for chec cookies are available or nor
{
    foreach ($_COOKIE['item'] as $name1 => $value)
    {

        if (isset($_POST["delete$name1"]))
        {

            setcookie("item[$name1]", "", time()-1800);
            ?>
            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
            <?php
        }
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
    <title>Cart | E-Shopper</title>
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
<!--/header-->
<section id="cart_items"> 
<div class="container"> 
  <div class="breadcrumbs"> 
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Shopping Cart</li>
    </ol>
  </div>
  <div class="table-responsive cart_info"> 
    <table class="table table-condensed">
      <form name="form1" action="" method="post">
        <?php
                    $d = 0;
                    if (is_array($_COOKIE['item']))  //this is for check cookies are available or nor
                    {
                        $d = $d + 1;

                    }
                    if ($d == 0)
                    {
                        echo "no record available in cart";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                    else
                    {
                    ?>
        <thead>
          <tr class="cart_menu"> 
            <td class="image">Item</td>
            <td class="description">Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          <?php
                    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                    {
                        $values11 = explode("__", $value);

                        ?>
          <tr> 
            <td class="cart_product"> <a href=""><img src="../admin/<?php echo $values11[0]; ?>" alt="" height="100"
                                                width="100"></a> </td>
            <td class="cart_description"> <h4><a href=""><?php echo $values11[1]; ?></a></h4></td>
            <td class="cart_price"> <p>BDT <?php echo $values11[2]; ?></p></td>
            <td class="cart_quantity"> <div class="cart_quantity_button"> 
                <input class="cart_quantity_input" type="text" name="quantity"
                                           value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>
              </div></td>
            <td class="cart_total"> <p class="cart_total_price">BDT <?php echo $values11[4]; ?></p></td>
            <td><input type="submit" name="delete<?php echo $name1;
                                ?>" value="del" id="s3"></td>
          </tr>
          <?php

                    }

                    ?>
        </tbody>
      </form>
    </table>
    <?php

            }
            $tot = 0;

            if (is_array($_COOKIE['item']))  //this is for chec cookies are available or nor
            {
                foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                {
                    $values11 = explode("__", $value);
                    $tot = $tot + $values11[4];
                }

                echo "Total = BDT " . $tot;
                $_SESSION["pay"] = $tot;
            }
            ?>
  </div>
</div>
</section> 
<!--/#cart_items-->
<center>
  <a href="checkout.php"> 
  <input type="button" value="checkout">
  </a> 
</center>
<?php
include "footer.php";
?>
</body>
</html>