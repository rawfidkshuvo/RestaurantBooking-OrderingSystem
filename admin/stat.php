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
                    Total Sale</h2>
                <div class="block">
                <?php
                    
                $res=mysqli_query($link,"select sum(total) as grand from display_order");
                echo "<table border='1'>";
                echo "<tr>";
                
                echo "<td >"; echo "Grand Total"; echo "</td>";
                echo "</tr>";
                while($row=mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    
                    echo "<td valign='top'>"; echo $row["grand"]; echo "</td>";
                    echo "</tr>";

                }
                echo "</table>";
                 ?>
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     