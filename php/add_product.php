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
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"burger_shop");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice"></td>
					</tr>
					
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Categoty</td>
					<td>
					<select name="pcategory">
					<option value="Appetizer">Appetizer</option>
					<option value="Fast Food" selected>Fast Food</option>
					<option value="Soup and Noodles">Soup and Noodles</option>
					<option value="Chicken and Beef">Chicken and Beef</option>
					<option value="Rice and Vegetable">Rice and Vegetable</option>
					<option value="Mocktail and Shake">Mocktail and Shake</option>
					<option value="Drink">Drink</option>
					<option value="Sweet Food" >Sweet Food</option>
					
					</select>
					</td>
					</tr>
					
					<tr>
					<td>Calorie</td>
					<td><input type="text" name="pcal"></td>
					</tr>
					<tr>
					<td>Carbohydrate</td>
					<td><input type="text" name="pcarb"></td>
					</tr>
					<tr>
					<td>Protein</td>
					<td><input type="text" name="ppro"></td>
					</tr>
					<tr>
					<td>Fat</td>
					<td><input type="text" name="pfat"></td>
					</tr>
				
					
					<tr>
					<td colspan="2" align="left"><input type="submit" name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],'$dst1','$_POST[pcategory]','$_POST[pcal]','$_POST[pcarb]','$_POST[ppro]','$_POST[pfat]')");


}

?>					
					
					
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     