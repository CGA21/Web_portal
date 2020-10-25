<?php
session_start();
$u=$_SESSION['un'];
$pass=$_SESSION['p'];
mysql_connect('localhost','root','');
mysql_select_db('network');
$query="SELECT * FROM user_info WHERE username='".$u."' and password='".$pass."'";
$is_query=mysql_query($query);
$first=mysql_fetch_assoc($is_query);
$_SESSION['disname']=$first['firstname'];
$a=$_SESSION['disname'];
if((isset($_GET["logout"])) or (!isset($_SESSION['un'])))
{
	session_destroy();
	header('Location:index.php');
	exit();
}
?>
<html>
<title>CG's Portal</title>
<head>
<link href="styles.css" rel="stylesheet" type="text/css">
<h2><b align="right"><a href="home.php" >
<img src="_images/home.jpg" class="home"></img></a></b>
<marquee width="85%" style="color:#FFF;"><b>Hello  <?php echo $a;?> ,Welcome to CG's Portal</b></marquee>
<sup align="right"><a href="?logout=1" > Logout</a></sup></h2>
<h1 align="center" style="color:#FFF">CG's Portal</h1></head>
<body background="_images/milkyway.gif" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;">
<div ><table align="center" cellspacing="5" cellpadding="10">
<tr>
<td><a href="games.php" ><img class="img" src="_images/images.png"><h2 align="center" style="color:#57a016;">Game Portal</h2></img></a></td>
<td><a href="movies.php" ><img src="_images/mov.jpg" class="img" ><h2 align="center" style="color:#57a016;">Movie Portal</h2></img></a></td>
</tr>
<tr>
<td><a href="anime.php" ><img src="_images/straw.jpg" class="img"><h2 align="center" style="color:#57a016;">Anime Portal</h2></img></a></td>
</tr>
</table></div>
<?php include_once('comments.php');?>
</body>
</div>
</html>
<?php

?>