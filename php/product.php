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
            $res = mysqli_query($link, "select * from product");
            echo "<table border='4'>";
            echo "<tr>";
            echo "<td style='font-weight:bold'>"; echo "ID"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Image"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Name"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Price"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Category"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Delete"; echo "</td>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["id"]; echo "</td>";
                echo "<td>";?><img src="<?php echo $row["product_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                echo "<td>"; echo $row["product_name"]; echo "</td>";
                echo "<td>"; echo $row["product_price"]; echo "</td>";
                echo "<td>"; echo $row["product_category"]; echo "</td>";
                echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            ?>

        </div>
    </div>
    <?php
    include "footer.php";

    ?>
     