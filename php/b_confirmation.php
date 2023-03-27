<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");
$id=$_GET["id"];
mysqli_query($link,"update booking_placement set confirmation='Visited' where placement_id=$id");
?>
<script type="text/javascript">
window.location="booking_order.php";
</script>