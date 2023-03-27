<?php
include "header.php";



?>
<?php
if (is_array($_COOKIE['item']))  //this is for chec cookies are available or nor
{
                    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                    {
                        $values11 = explode("__", $value);

 $link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"youtube_project");                       

mysqli_query($link,"insert into display_order VALUES('','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]')");

}
}
include "footer.php";

?>

