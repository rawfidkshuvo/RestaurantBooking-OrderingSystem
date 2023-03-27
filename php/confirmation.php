<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");
$id=$_GET["id"];
mysqli_query($link,"update order_placement set confirmation='Delivered' where placement_id=$id");
?>
<script type="text/javascript">
window.location="display_order.php";
</script>