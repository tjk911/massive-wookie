<?php
if(isset($_SESSION['admin'])) {
} else {
header("location:index.php");
}

if(isset($_GET['cid'])) {
$cid = $_GET['cid']; 
$cid = stripslashes($cid);
$cid = mysql_real_escape_string($cid);
} else {
header("location:index.php");
}


foreach(array_keys($_POST) as $key)
{
  $clean[$key] = mysql_real_escape_string($_POST[$key]);
}

$sql="DELETE FROM potholes WHERE id='".$cid."'";

$result = mysql_query($sql);

header("location:login.php?view=admin");


?>