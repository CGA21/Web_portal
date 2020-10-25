<?php
session_start();
$ss=$_SESSION['disname'];
if((isset($_GET["logout"])) or (!isset($_SESSION['un'])))
{
	session_destroy();
	header('Location:index.php');
	exit();
}
?>
<html>
<title>Game Portal</title>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" ></head>
<h2><b align="right"><a href="home.php" ><img src="_images/home.jpg" alt="home" class="home"></img></a></b>
<marquee width="85%" style="color:green;"><b><?php echo $ss ?>,You are in Game Portal.Enjoy Playing Games!!</b></marquee>
<sup align="right"><a href="?logout=1"  > Logout</a></sup></h2>
<h1 align="center" style="color:#FFF;">Game Portal</h1>
<body background="_images/revr.gif"style="background-repeat:no-repeat;background-size:cover;background-attachment:local;">
<table align="center">
<tr><td><div>
<a href="_games/SpaceShooter/space.html" >
<img id="spaceshooter"  alt="Space Shooter" align="center" src="../_images/images.jpg" >
</img>
</td>
<td>
<h1 class="h1" align ="center">
<a href="SpaceShooter/space.html" style="color:orange;">Space Shooter</a>
</h1>
</a>
<div>
<p><b style="font-size:15px;width:400px;margin-left:20px;color:#FFF;" >
Alien ships are coming to kill you and 
you have to fight your way through the asteroid belt!! Can you survive?</b></p>
</div>
</div>
</td>
</tr>
</table>
</body>
<footer><?php include_once('comments.php');?></footer>
<html>
<?php

?>