<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "burger_shop");
$del=$_GET["id"];
mysqli_query($link,"delete from product where id=$del");
?>
<script type="text/javascript">
window.location="product.php";
</script>