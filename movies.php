<?php
session_start();
$ss=$_SESSION['disname'];
?>

<html>
<title>Movie Portal</title>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" ></head>
<h2><b align="right"><a href="home.php" ><img src="_images/home.jpg" alt="home" class="home"></img></a></b>
<marquee width="85%" style="color:green;"><b><?php echo $ss ?>,You are in Movie Portal.Enjoy Watching Movies!!</b></marquee>
<sup align="right"><a href="?logout=1"  > Logout</a></sup></h2>
<h1 align="center" style="color:#FFF;">Movie Portal</h1>
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


												//to show contents of directory
/*$movies="F:\\Movies";
if(is_dir($movies)){
	if($dh=opendir($movies)){
		while($file=readdir($dh)!==false){
			$filepath="{$movies}\\{$file}";
			if(is_file($filepath)){
				$name=$file;
				$type=filetype($filepath);
				$size=filesize($filepath);
				echo "$name";
			}
			else{echo $filepath."error <br>";}
		}
		closedir($dh);
	}
	else{echo "could not open";}
}
else{echo"no directory";}*/

												//to show only files in directory
$path="_movies";
$d=dir($path);
while(($entry=$d->read())!==false){
	$fpath="{$path}/{$entry}";
	if(is_file($fpath)){
		
		$name=$entry;
		$size=filesize($fpath);
		echo '<tr align="center" ><td><h4><a href="'.$fpath.'" style="color:orange;">'.$name.'</a></h4></td><td>'.$size.'</td></tr>';
		}
	}
	
												//for only files with same extension
	/*$p="_movies/";
	$s=glob($p."*.mp4") ; $q= glob($p."*.mkv");
	foreach($s as $n){
		$size=filesize($n);
		$size=$size/(1024*1024*1024);
	echo '<tr><td><h3><a href="file:///'.$n.'" >'.substr($n,10).'</a></h3></td><td><h3>'.round($size,3).' GB</td><h3>
	<td></td></tr>';
	}
	foreach($q as $t){
		$size=filesize($t);
		$size=$size/(1024*1024*1024);
	echo '<tr><td><h3><a href="file:///'.$t.'">'.substr($t,10).'</a></h3></td><td><h3>'.round($size,3).' GB</td><h3>
	<td></td></tr>';
	}*/
	
	/*if($_GET["vid"]){
		echo substr($_GET["vid"],0);
		video($_GET["vid"]);
	}
	function video($x){
		echo  '<br><video name="media" controls autoplay>
		<source src="'.$x.'" type="video/mp4"></video>';
	}*/
	?>
</table>
</div>
</div>
</body>
<footer><?php include('comments.php');?></footer>
</html>
<?php


?>
