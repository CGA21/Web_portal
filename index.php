<html>
<title>LogIn</title>
<body background="_images/NP7iDOL.gif" style="background-repeat:no-repeat;background-size:cover;">
<head><link href="styles.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div id="container">
<h1 align="center" style="color:#FFF;">CG's Portal</h1>
<div class="ade" >
<h1 align="center">LogIn</h1>
<table align="center" cellspacing="1" cellpadding="5" border="0" >
<form action="index.php" method="get">
<tr><td><b>Username :</b></td></tr>
<tr><td><input type="text" name="user" placeholder="username" ></input></td></tr>
<tr><td><b>Password :</b></td></tr>
<tr><td><input type="password" name="pass" placeholder="password"></input></td></tr>
<tr><td>
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('network');
$user=$_GET['user'];
$pw=$_GET['pass'];
if(isset($user) and isset($pw))
{
$query="SELECT * FROM user_info WHERE username='".$user."' and password='".md5($pw)."'";
$is_query=mysql_query($query);
$c=mysql_num_rows($is_query);
if($c==1)
{
	header("Location:home.php");
	$_SESSION['un']=$user;
	$_SESSION['p']=md5($pw);
	end();
}
else
{
	echo "Invalid username and password";
}}
?>
</td></tr>
<tr>
<td><input type="submit" name="login" class="log"value="LogIn" ></input></td></tr>
</form>
<tr><td><form action="signup.php"><input type="submit" class="log"value="SignUp"></input></form><td></tr>
</table>
</div>
</div>
</body>
</html>