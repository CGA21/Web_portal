<html>
<title>SignUp</title>
<head><link href="styles.css" rel="stylesheet" type="text/css"></head>
<div id="container">
<body align="center" background="_images/NP7iDOL.gif" style="background-repeat:no-repeat;background-size:cover;">
<h1 align="center" style="color:#FFF;">CG's Portal</h1>
<div class="ade">
<h1>SignUp</h1>
<?php
$fn=$_GET['firstname'];
$ln=$_GET['lastname'];
$un=$_GET['username'];
$p=$_GET['password'];
$cp=$_GET['conpassword'];
if(empty($fn)||empty($ln)||empty($un)||empty($p)||empty($cp))
{
	$t=time(H-i-s);
	setcookie('cok','fill all details',$t+5);
	echo $_COOKIE['cok'];
}
else if($p!==$cp)
{
	echo 'password does not match';
}
else
{
	$pass=md5($p);
	mysql_connect("localhost","root",'');
	mysql_select_db("network");
	$q="SELECT username FROM uer_info WHERE username='".$un."'";
	$isq=mysql_query($q);
	if($isq==true)
	{echo 'username already exists';}
	else{
	$query="INSERT INTO user_info(firstname,lastname,username,password) values('".$fn."','".$ln."','".$un."','".$pass."')";
	$is_query=mysql_query($query);
	if($is_query==true){
		echo'account created';
	}}
}

?>
<table align="center" cellspacing="3" cellpadding="5" border="0">
<form action="signup.php" method="get">
<tr><td><b>First Name</b></td>
<td><input type="text" name="firstname" placeholder="First Name"></input></td></tr>
<tr><td><b>Last Name</b></td>
<td><input type="text" name="lastname" placeholder="Last Name"></input></td></tr>
<tr><td><b>Username</b></td>
<td><input type="text" name="username" placeholder="username"></input></td></tr>
<tr><td><b>Password</b></td>
<td><input type="password" name="password" placeholder="password"></input></td></tr>
<tr><td><b style="margin_right:20px;">Confirm Password</b></td>
<td><input type="password" name="conpassword"placeholder="Confirm Password"></input></td></tr>
<tr><td><input type="submit" name="signup" class="log" value="SignUp"></input></td></tr>
</form>
<tr><td><form action="index.php">
<input type="submit" name="signin" class="log" value="Go to LogIn Page"></input>
</form></td></tr>
</table>
</div>
</body>
</div>
</html>