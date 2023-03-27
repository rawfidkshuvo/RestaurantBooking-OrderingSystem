<?php
include "header.php";
?>

<section id="cart_items"> 
<div class="container"> 
  <div class="breadcrumbs"> 
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Register</li>
    </ol>
  </div>


<div class="step-one"> 
    <h2 class="heading">Step 2</h2>
  </div>
  
  <!--/checkout-options-->
  <div class="register-req"> 
    <p>Please give proper details to easily get items at your desired address.</p>
  </div>
  <!--/register-req-->
  <div class="shopper-informations"> 
    <div class="row"> 
      <div class="col-sm-4"> </div>
      <div class="col-sm-5 clearfix"> 
        <div class="bill-to"> 
          <h3>Customer Information</h3>
          <div class="form-one"> 
            <form name="form1" action="" method="post" >
              <input type="text" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="width:350px; background-color: #FFA500">
              <input type="password" placeholder="Password" name="pass" required style="width:350px; background-color: #FFA500">
			  <input type="submit" name="submit1" value="SUBMIT" style="background-color:#9ACD32; color:white; font-weight:bold">
			  <p>Don't have an account? <a href="register.php"><b>Register</b></a> here...</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
<?php
			if(isset($_POST["submit1"]))
			{
				$link=mysqli_connect("localhost","root","");
				mysqli_select_db($link,"burger_shop");
				$res=mysqli_query($link,"select * from checkout_address where email='$_POST[email]' && password='$_POST[pass]'");
	while($row=mysqli_fetch_array($res))
	{
	$_SESSION["userid"]=$row["id"];
	} ?>
	<script type="text/javascript">
	alert("Successfully logged in!\nYou can now contimue your shopping!");
	window.location="login.php";
	</script>
	<?php
			}
	?>

 
<?php
include "footer.php";
?>
</body>
</html>