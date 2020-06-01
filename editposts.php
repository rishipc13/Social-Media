<?php 
include_once 'header.php';
include 'includes/dbh.inc.php';
$username=$_SESSION['u_uid'];
$sql = "SELECT * FROM posts WHERE username='$username' ORDER BY post_id DESC";
$result = mysqli_query($conn, $sql);
echo '<h1 style="text-align:center;">Edit Posts</h1>';
$i=0;
while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
{    $id=$rows['post_id'];
    $heading=$rows['heading'];
    $body=$rows['body']; 
?><form id="delete" method="post" action="includes/deletepost.inc.php">
<input type="hidden" name="delete_rec_id" value="<?php print $id; ?>"/> 
<input type="submit" name="delete" value="Delete" style="margin: 0 auto;
    width:auto;
    position:relative;top:70px;
    left:1400px;
    height: 40px;
    border: none;
    background-color: #222;
    font-family: arial;
    font-size: 20px;
    color: #fff;
    cursor: pointer;"/>    
</form>
<form id="edit" method="POST" action="editingpost.php">
<input type="hidden" name="delete_rec_id" value="<?php print $id; ?>"/>     
<input type="hidden" name="edit_heading" value="<?php print $heading; ?>"/> 
<input type="hidden" name="edit_body" value="<?php print $body; ?>"/> 
<input type="submit" name="edit" value="Edit" style="margin: 0 auto;
    width:auto;
    position:relative;top:15px;
    left:1320px;
    height: 40px;
    border: none;
    background-color: #222;
    font-family: arial;
    font-size: 20px;
    color: #fff;
    cursor: pointer;"/>      
</form>
<?php
    echo '<div style="background-color:beige;border-radius:10px;font-size:20px;padding-bottom:20px;">';
    echo '<h3 style="margin-left:20px;">'.$rows['username']."</h3>";
    echo '<h2 style="margin-left:50%; margin-top:-25px;">'.$rows['heading']."</h2>";
    echo '<div style="margin-left:120px;"'.$rows['body'].'</div>';
    echo "</div>";
?>  

<?php

echo '<br><br>';}
?>