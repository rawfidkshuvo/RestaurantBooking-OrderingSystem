<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "header.php";

?>

<?php


$link=mysqli_connect("localhost","root","","burger_shop");

?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Order Items</h2>
                <div class="block">
                <?php
                    $id=$_GET["id"];
				$res2=mysqli_query($link,"select * from booking_order where pid=$id");
				$row2=mysqli_fetch_array($res2);
				$d=$row2["order_id"];	
				$res1=mysqli_query($link,"select * from checkout_address where id=$d");
                echo "<table border='1'>";
                echo "<tr>";
            echo "<td style='font-weight:bold'>"; echo "User ID"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Firstname"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Lastname"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Number of Person"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Date"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Time"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Contact No"; echo "</td>";
                echo "</tr>";
                $row1=mysqli_fetch_array($res1);
                
                    echo "<tr>";
                echo "<td>"; echo $row1["id"]; echo "</td>";
                echo "<td>"; echo $row1["firstname"];echo "</td>";
                echo "<td>"; echo $row1["lastname"]; echo "</td>";
                echo "<td>"; echo $row2["nop"]; echo "</td>";
                echo "<td>"; echo $row2["date"];echo "</td>";
                echo "<td>"; echo $row2["time"]; echo "</td>";
                echo "<td>"; echo $row1["contactno"]; echo "</td>";
                    echo "</tr>";

                
                echo "</table>";
				echo "</br>";
				echo "</br>";
					
                $res=mysqli_query($link,"select * from booking_order where pid=$id");
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td >"; echo "product image"; echo "</td>";
                echo "<td >"; echo "product name"; echo "</td>";
                echo "<td >"; echo "product price"; echo "</td>";
                echo "<td >"; echo "product qty"; echo "</td>";
                echo "<td >"; echo "product total"; echo "</td>";
                echo "</tr>";
                while($row=mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    echo "<td valign='top'>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                    echo "<td valign='top'>"; echo $row["product_name"]; echo "</td>";
                    echo "<td valign='top'>"; echo $row["product_price"]; echo "</td>";
                    echo "<td valign='top'>"; echo $row["product_qty"]; echo "</td>";
                    echo "<td valign='top'>"; echo $row["total"]; echo "</td>";
                    echo "</tr>";

                }
                echo "</table>";
				
				
                 ?>
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     