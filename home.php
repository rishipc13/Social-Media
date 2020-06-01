<?php 
include_once 'header.php';
include 'includes/dbh.inc.php';
$username=$_SESSION['u_uid'];
$sql = "SELECT * FROM posts WHERE username IN(SELECT followee FROM follow_list WHERE follower='$username') ORDER BY post_id DESC";
$result = mysqli_query($conn, $sql);
echo '<h1 style="text-align:center;">FEED</h1>';
while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
{   echo '<br><br>';
    echo '<div style="background-color:beige;border-radius:10px;font-size:20px;padding-bottom:20px;">';
    echo '<h3 style="margin-left:20px;">'.$rows['username']."</h3>";
    echo '<h2 style="margin-left:50%; margin-top:-25px;">'.$rows['heading']."</h2>";
    echo '<div style="margin-left:120px;"'.$rows['body'].'</div>';
    echo "</div>";
}
?>      

<?php 
	include_once 'footer.php';
?>
