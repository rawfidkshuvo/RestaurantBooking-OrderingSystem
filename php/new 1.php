<style type="text/css">
#divNewsCont{position:relative; width:300; height:302; overflow:visible; top:15; visibility:hidden}
#divNewsText{position:absolute; top:0; left:0}
    h1
	{margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:14.0pt;
	font-family:"Times New Roman";
	font-weight:normal; margin-left:0in; margin-right:0in; margin-top:0in}
</style>
 
 
<script type="text/javascript" language="JavaScript">
 
function checkBrowser(){
	this.ver=navigator.appVersion
	this.dom=document.getElementById?1:0
	this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom)?1:0;
	this.ie4=(document.all && !this.dom)?1:0;
	this.ns5=(this.dom && parseInt(this.ver) >= 5) ?1:0;
	this.ns4=(document.layers && !this.dom)?1:0;
	this.bw=(this.ie5 || this.ie4 || this.ns4 || this.ns5)
	return this
}
bw=new checkBrowser()
 
//The pixel value of where you want the layer to start (from the top)
lstart=0
 
//Set this to false if you just want it to go one time
loop=true 
 
//Set the speed, lower value gives more speed
speed=150
 
//Set this to how many pixels you want it to go for each step, this also changes the speed.    
pr_step=1
 
//Object constructor
function makeObj(obj,nest){
    nest=(!nest) ? '':'document.'+nest+'.'
	this.el=bw.dom?document.getElementById(obj):bw.ie4?document.all[obj]:bw.ns4?eval(nest+'document.'+obj):0;
  	this.css=bw.dom?document.getElementById(obj).style:bw.ie4?document.all[obj].style:bw.ns4?eval(nest+'document.'+obj):0;
	this.scrollHeight=bw.ns4?this.css.document.height:this.el.offsetHeight
	this.newsScroll=newsScroll;
	this.moveIt=b_moveIt; this.x; this.y;
    this.obj = obj + "Object"
    eval(this.obj + "=this")
    return this
}
function b_moveIt(x,y){
	this.x=x;this.y=y
	this.css.left=this.x
	this.css.top=this.y
}
//Makes the object scroll up
function newsScroll(speed){
	if(this.y>-this.scrollHeight){
		this.moveIt(0,this.y-pr_step)
		setTimeout(this.obj+".newsScroll("+speed+")",speed)
	}else if(loop) {
		this.moveIt(0,lstart)
		eval(this.obj+".newsScroll("+speed+")")
	  }
}
//Makes the object
function newsScrollInit(){
	oNewsCont=new makeObj('divNewsCont')
	oNewsScroll=new makeObj('divNewsText','divNewsCont')
	oNewsScroll.moveIt(0,lstart)
	oNewsCont.css.visibility='visible'
	oNewsScroll.newsScroll(speed)
}
//Call the init on page load
onload=newsScrollInit;
    </script>   
    <base target="_top">
 
 
 
<BODY style="word-spacing: 0; margin: 0">
 
 
 
 
<body text="#FFFFFF" link="#FFFF00" vlink="#FFFF00" alink="#FFFF00" style="word-spacing: 0; margin: 0">
<table cellpadding=0  cellspacing=0 id="table1" style="position:relative;top:0px;width:300px;table-layout:fixed" name="table1">
  <tr>
    <td valign="top" align="left" style="color: #000000; text-decoration: none" >
                  
                  
<div id="divNewsCont" style="float: left">
<div id="divNewsText" style="width: 300; height: 302">
	<table border="0" cellpadding="2" cellspacing="0" id="table2">
		<tr>
			<td>
			
  <font face="Arial" style="font-size: 7pt" color="#000000">
  
 
 
	<p style="margin-top: 0; margin-bottom: 0">
  
 
 
<?php
$db_server = "localhost";
$db_user   = "jez";
$db_pass   = "frank5";
 
 
$con       = mysql_connect("$db_server", "$db_user", "$db_pass") or die("Cannot connect to database.<br>");
mysql_select_db("local_traders");
 
 
$query = "
(
	SELECT * FROM job
)
 
ORDER BY id DESC
LIMIT 25";
 
 
  $result = mysql_query($query) or die("Could not perform the requested query!<BR>".mysql_error());
  while ($row = mysql_fetch_array($result))
  {
  		$array[] = $row['jobtext'];
  }mysql_free_result($result);
 
	$result = array_unique ($array);
 
 
echo "<table>";
	foreach ($result as $i => $value) {
		
		echo "<font color=#57616D>$value</font><br><br>";
	}
echo "</table>";
 
 
 
?>
 
 
			
			
			
			
			</td>
		</tr>
	</table>
	
	</div></div>
</table> 
 
 
</body>