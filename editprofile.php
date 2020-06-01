<link rel="stylesheet" type="text/css" href="style.css">
<?php 
include_once 'header.php';
?>
<div class="container" style="margin-top:20px;margin-left:24%;text-align:center;height:350px;">
<h1>Edit Profile</h1>    
  <form action="includes/edit-profile.inc.php" method="POST" style="margin-top:20px;">
    <input type="text" id="username" name="username" placeholder="Enter new username">
    <br><br>
    <input type="password" id="oldpwd" name="oldpwd" placeholder="Enter old Password"> 
     <br><br>
    <input type="password" id="newpwd" name="newpwd" placeholder="Enter new Password"> 
     <br><br>   
 <button type="submit" name="editprofile_submit" id="a">Submit</button>
  </form>
</div>