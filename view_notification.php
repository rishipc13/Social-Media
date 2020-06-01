<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start(); 
$nm=$_SESSION['u_uid'];
include_once 'includes/dbh.inc.php';
$sql="UPDATE posts SET status=1 WHERE status=0";	
$result=mysqli_query($conn, $sql);
include 'includes/dbh.inc.php';
$sql2="SELECT * FROM posts WHERE username IN(SELECT followee FROM follow_list WHERE follower='$nm') ORDER BY post_id DESC ";
$result2=mysqli_query($conn, $sql2);

$response='';
while($row=mysqli_fetch_array($result2)) {
	$response = $response . '<div class="notification-item">' .
	'<div class="notification-subject" style="font-weight:bold;font-size:20px;">'. $row["username"] . '</div>' . 
	'<div class="notification-comment" style="font-size:18px;">' . $row["heading"]  . '</div>' .
	'</div>';
}
if(!empty($response)) {
	print $response;
}


?>