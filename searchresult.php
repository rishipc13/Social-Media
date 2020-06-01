<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
$session_id=$_GET['uid'];
$_SESSION['fuid']=$session_id;
$result = $conn->query("select * from users where user_uid = '$session_id'");
$row = mysqli_fetch_assoc($result);
?>
<p style="text-align:center;font-size:34px; font-style: oblique;"><?php echo $row['user_uid']?>
</p>
<div style=" display: flex;flex-flow: row; margin-left:20px;font-size:24px; ">
  <p>Name:<?php echo $row['user_first']." ".$row['user_last']; ?></p>
  <p style="margin-left:35%;">Followers:<?php echo $row['user_followers']?></p>
<p style="margin-left:35%;">Following:<?php echo $row['user_following']?></p>
</div>
<form action="includes/follow.inc.php" method="POST">

    <button name="follow_submit" type="submit" style=" background-color:  #008CBA;
    border-radius:4px;                                     border: none;
    position:relative;
    left:47%;                                               color: white;
    padding: 10px 10px;
   text-align: center;
   text-decoration: none;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;">Follow</button>


</form>
