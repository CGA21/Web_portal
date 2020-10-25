<html>
<head><link href="styles.css" rel="stylesheet" type="text/css"></head>
<div id="containery" >
<div class="comm" >
<h3> Comments</h3>
</div>
<div class="comment_input" >
<form name="form1" method="post">
<textarea name="comments" class="inp" placeholder="Leave Comments Here..." ></textarea></br></br>
<input type="submit" value="Post" class="button" ></input></br>
</form>
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('network');
$uu=$_SESSION['un'];
if(!empty($_POST['comments']))
{
$qq="INSERT INTO comments(username,comm) values('".$uu."','".$_POST['comments']."')";
//$id="SELECT id FROM comments WHERE username='".$uu."' and comm='".$_POST['comments']."'";
//$qwerty=mysql_query($id) or die('error getting id');
//$latest_id=mysql_fetch_assoc($qwerty);
//echo $latest_id['comments.id'];
$qqq=mysql_query($qq) or die('error');
reload();
}
echo $_POST['comments'];
?>
</div>
<div id="comment_logs">
<?php
$id=100;
//$ll=$id-11;

$ll=0;
function reload(){
		$uri = $_SERVER['REQUEST_URI'];
		echo $uri.'<br>';
		$x=strtok($uri,'?');
		echo $x;
		header("Location:".$x);
	}
while(true){
	$qr="SELECT * FROM comments WHERE comments.id ='".$id."' LIMIT 1" ;
	$qwe=mysql_query($qr);
	if(mysql_query($qr)!=true){
		echo "Error Loading comments";
		break;
		}
		else{
		$return=mysql_fetch_assoc($qwe);
	if(empty($return['username'])&& empty($return['comment'])){
	$id--;
	//$ll--;
	break;
	}
		else{
			$id+=10;
			//$ll+=10;
		}
	}
	}
	
	//to remove empty id's
	while(true){   
		$qr="SELECT * FROM comments WHERE comments.id ='".$id."' LIMIT 1" ;
		$qwe=mysql_query($qr) or die('oo lala');
		$return=mysql_fetch_assoc($qwe);
		if(empty($return['username'])&& empty($return['comment'])){
		$id--;
		$ll--;
		}
		else{break;}
	}
	
	function loadc($id,$ll){
	do{
		$qr="SELECT * FROM comments WHERE comments.id ='".$id."' LIMIT 1" ;
		
		$qwe=mysql_query($qr) or die('oo lala');
		$return=mysql_fetch_assoc($qwe);
	if(!empty($return['username'])){
	echo '<div class="messages" ><table border="0"><tr><td><h4>'.$return['username'].' :</h4></td>
	<td><form method="get"><input type="hidden" name="cid" value="'.$return['id'].'"></input></form></td>
	<td><p>'.$return['comm'].'</p></td></tr></table></div>';
	if($_SESSION['un']==$return['username']){
	echo '<a href="?delete='.$return['id'].'" class="hh" >
	<img src="_images/b_drop.png" ></img></a>';}
	/*$id--;}
	//else{$id--;}
	/*if(isset($_GET['delete'])){
	$d="DELETE * FROM comments WHERE comments.id='".$id."'";
	$delq=mysql_query($delq);}*/
	
	}
if($id==1){
	echo '<center>No more comments</center>';
	break;
}
$id--;
}while($id>$ll)	;
}
loadc($id,$ll);

	/*if($id==$ll and $id!=0){
		ob_start();
		$c++;
	echo '<center><a href="?load='.$ll.'">Load more comments</a></center>';
	}
	}
	loadc($id,$ll);
	
	if($_GET["load"]!=$ll){
	ob_end_clean();
	$id-=11;
	$ll-=10;
	loadc($id,$ll);
	echo $c;
	}*/
	
	function del($cid)
	{
	$d="DELETE FROM comments WHERE comments.id='".$cid."' LIMIT 1";
	$delq=mysql_query($d);
	reload();
	}
	
	if($_GET["delete"]){
	del($_GET["delete"]);
	}
	?>
<div>
</div>
</html>