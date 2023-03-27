<?php
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"burger_shop");
?>
            <?php
            //include "left_menu.php";
            ?>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Available Food Items</h2>

                   <?php

 include("pagination/function.php");
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 9; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "product"; //you have to pass your query over here

$res=mysqli_query($link,"select * from {$statement} LIMIT {$startpoint} , {$limit}");
while($row=mysqli_fetch_array($res))
{
?>
 <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../admin/<?php echo $row["product_image"]; ?>" alt="" width="180" height="381" />
                                    <h2>BDT <?php echo $row["product_price"]; ?></h2>
                                    <p><?php echo $row["product_name"]; ?></p>
                                    <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>BDT <?php echo $row["product_price"]; ?></h2>
                                        <p><?php echo $row["product_name"]; ?></p>
                                        <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

<?php


}

                    ?>




                  </div>

                    <ul class="pagination">
					<?php
                        echo pagination($statement,$limit,$page);
                    ?>
					</ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>