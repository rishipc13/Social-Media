<?php 
include_once 'header.php';
include 'includes/dbh.inc.php';
$session_id = $_SESSION['u_id'];
$result = $conn->query("select * from users where user_id = '$session_id'");
$row = mysqli_fetch_assoc($result);
$id = $row['user_id'];
?>
<h1 style="text-align:center;">MY PROFILE</h1>
<form style="text-align:right; margin-right:20px;" action="editprofile.php" method="POST">
<button type="submit" name="editsubmit" style="margin: 0 auto;
    width:auto;
    height: 40px;
    border: none;
    background-color: #222;
    font-family: arial;
    font-size: 20px;
    color: #fff;
    cursor: pointer;">
Edit Profile</button>
</form>
<p style="text-align:center;font-size:34px; font-style: oblique;"><?php echo $row['user_uid']?>
</p>
<div style=" display: flex;flex-flow: row; margin-left:20px;font-size:24px; ">
  <p>Name:<?php echo $row['user_first']." ".$row['user_last']; ?></p>
  <p style="margin-left:35%;">Followers:<?php echo $row['user_followers']?></p>
<p style="margin-left:35%;">Following:<?php echo $row['user_following']?></p>
     
</div>
<form style="text-align:right; margin-right:20px;" action="editposts.php" method="POST">
<button type="submit" name="editp" style="margin: 0 auto;
    width:auto;
    position:relative;                           top:60px;                
    height: 40px;
    border: none;
    background-color: #222;
    font-family: arial;
    font-size: 20px;
    color: #fff;
    cursor: pointer;">
Edit Posts</button>
</form>
<?php
$username=$_SESSION['u_uid'];
$sql = "SELECT * FROM posts WHERE username='$username' ORDER BY post_id DESC";
$result = mysqli_query($conn, $sql);
echo '<h1 style="text-align:center;">My Posts</h1>';
while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
{ echo '<div style="background-color:beige;border-radius:10px;font-size:20px;padding-bottom:20px;">';
    echo '<h3 style="margin-left:20px;">'.$rows['username']."</h3>";
    echo '<h2 style="margin-left:50%; margin-top:-25px;">'.$rows['heading']."</h2>";
    echo '<div style="margin-left:120px;"'.$rows['body'].'</div>';
    echo "</div>";
echo '<br><br>';}
?>        