<?php
session_start();
$ss=$_SESSION['disname'];
?>

<html>
<title>Anime Portal</title>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" ></head>
<h2><b align="right"><a href="home.php" ><img src="_images/home.jpg" alt="home" class="home"></img></a></b>
<marquee width="85%" style="color:green;"><b><?php echo $ss ?>,You are in Anime Portal.Arigato Guzaimas!!</b></marquee>
<sup align="right"><a href="?logout=1"  > Logout</a></sup></h2>
<h1 align="center" style="color:#FFF;">Anime Portal</h1>
<body background="_images/revr.gif"style="background-repeat:no-repeat;background-size:cover;background-attachment:local;">
<div align="center">
<div  id="contain">
<table border="1" style="color:#FFF;width:95%;">
<tr align="center"><td>Name</td><td>Size</td></tr>
<?php
												//logout
if((isset($_GET["logout"])) or (!isset($_SESSION['un'])))
{
	session_destroy();
	header('Location:index.php');
	exit();
}
$path="_anime";
function show($path){
	if(is_dir($path)){
	$d=opendir($path);
	if($d){
		while(($dir=readdir($d))!==false){
			$anim="{$path}\\{$dir}";
			if(is_dir($anim)){
				$name=$dir;
				$size=filesize($anim);
				echo '<tr align="center" ><td><h4><a href="?path='.$anim.'" style="color:orange;">'.$name.'</a></h4></td><td>'.$size.'</td>
				<td><form method="get" ><input type="hidden" name="open" value="'.$anim.'"></input></form></td></tr>';
					if($_GET["path"]){
					echo $dir;
					open($_GET["path"]);
					die();
	}
			}
		}
		else echo 'Nothing to show';
	}
	else echo 'no such directory';
	
	}
}
	function open($anim){
		if(is_dir($anim)){
	if($dh=opendir($anim)){
		while(($file=readdir($dh))!==false){
			$filepath="{$anim}\\{$file}";
			if(is_file($filepath)){
				$name=$file;
				$size=filesize($filepath);
		echo '<tr align="center" ><td><h4><a href="'.$filepath.'" style="color:orange;">'.$name.'</a></h4></td><td>'.$size.'</td></tr>';
			}
			else{echo $filepath."error <br>";}
		}
		closedir($dh);
	}
	else{echo "could not open";}
}
else{echo"no directory";}
	}
show($path);

	?>
</table>
</div>
</div>
</body>
<footer><?php include('comments.php');?></footer>
</html>