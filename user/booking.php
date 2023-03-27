<?php
include "header.php";
?>

<section id="cart_items"> 
<div class="container"> 
  <div class="breadcrumbs"> 
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Check out</li>
    </ol>
  </div>
  <!--/breadcrums-->
  <div class="step-one"> 
    <h2 class="heading">Step 1</h2>
  </div>
  
    <div class="review-payment"> 
    <h4>Review Payment</h4>
	

        <tr> 
          <td colspan="4">&nbsp;</td>
          <td colspan="2"> <table class="table table-condensed total-result">
              <tr> 
	
			  <?php
			  $tot = 0;
			  settype($tot, "integer");
			  $tax = 0;
			  if (is_array($_COOKIE['item'])) 
{
                    foreach ($_COOKIE['item'] as $name1 => $value)   
                    {
                        $values11 = explode("__", $value);
						$tot = $tot + $values11[4];
					}
}
						
						
						?>
			  
                <td>Cart Sub Total</td>
                <td><?php echo $tot; ?></td>
              </tr>
              <tr>

<?php
$tax = $tot * 2 / 100;
?>
			  
                <td>VAT (2%)</td>
                <td><?php echo $tax; ?></td>
              </tr>
              
              <tr>
<?php
$tot = $tot + $tax;
?>			  
                <td>Total</td>
                <td><span><?php echo $tot; ?></span></td>
              </tr>
			<td>Total (Rounded)</td>
                <td><span><?php echo round($tot); ?></span></td>
              </tr>  
            </table></td>
        </tr>
      </tbody>
    </table>
  </div>

    <div class="step-one"> 
    <h2 class="heading">Step 2</h2>
  </div>
  
  <!--/checkout-options-->
  <div class="register-req"> 
    <p>Please give proper booking details to get convenient service.</p>
  </div>
  <!--/register-req-->
  <div class="shopper-informations"> 
    <div class="row"> 
      <div class="col-sm-4"> </div>
      <div class="col-sm-5 clearfix"> 
        <div class="bill-to"> 
          <h3>Booking Information</h3>
          <div class="form-one"> 
            <form name="form1" action="" method="post" >
              <input type="text" placeholder="Number of person" name="nop"  style="width:350px; background-color: #FFA500">
			  <input type="date" placeholder="date" name="date" style="width:350px; background-color: #FFA500">
              <input type="time" placeholder="time" name="time" style="width:350px; background-color: #FFA500">
              <input type="submit" name="submit1" value="SUBMIT" style="background-color:#9ACD32; color:white; font-weight:bold">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
			if(isset($_POST["submit1"]))
			{
				if($_SESSION["userid"]=="")
					{ ?>
				<script>
				alert("You are not logged in!");
				</script>
					<?php
					}
			else
			{
				
$linker=mysqli_connect("localhost","root","");
mysqli_select_db($linker,"burger_shop");

			$pen = $_SESSION["userid"];
			mysqli_query($linker,"insert into booking_placement VALUES('','$pen','Not Visited')");
			$pep=mysqli_query($linker,"select * from booking_placement order by placement_id desc limit 1");
			$row8 = mysqli_fetch_array($pep);
	
     

if (is_array($_COOKIE['item']))  
{
                    foreach ($_COOKIE['item'] as $name1 => $value)   
                    {
                        $values11 = explode("__", $value);
						
						
						
						
						

 $link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"burger_shop");


            
                                   

mysqli_query($link,"insert into booking_order VALUES('','$pen','$row8[placement_id]','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]','$_POST[nop]','$_POST[date]','$_POST[time]')");

}
}





?>

  <?php
echo '<script>location.replace("booking_slip.php") </script>';

			}
			}


			?>
			
			    <div class="step-one"> 
    <h2 class="heading">Step 3</h2>
  </div>
  
  <!--/checkout-options-->
  <div class="register-req"> 
    <p>Please check in around 15-20 minutes from the specified time to secure your table.</p>
  </div>

  
<?php
include "footer.php";
?>
 

</body>
</html>
	

