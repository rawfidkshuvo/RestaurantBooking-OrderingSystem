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


$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display Order</h2>

        <div class="block">

            <?php
            $res = mysqli_query($link, "select * from booking_placement");
            echo "<table border='4'>";
            echo "<tr>";
            echo "<td style='font-weight:bold'>"; echo "Order ID"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "User ID"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Status"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "view order"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Confirmation"; echo "</td>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["placement_id"]; echo "</td>";
                echo "<td>"; echo $row["user_id"]; echo "</td>";
				echo "<td>"; echo $row["confirmation"]; echo "</td>";
                echo "<td>"; ?> <a href="booking_order_1.php?id=<?php echo $row["placement_id"]; ?>">View Order</a> <?php echo "</td>";
				echo "<td>"; ?> <a href="b_confirmation.php?id=<?php echo $row["placement_id"]; ?>">Confirm</a> <?php echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            ?>

        </div>
    </div>
    <?php
    include "footer.php";

    ?>
     