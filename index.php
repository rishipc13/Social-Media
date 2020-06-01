<?php 
	session_start();
    include_once 'includes/dbh.inc.php';
    $sql="CREATE TABLE IF NOT EXISTS users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    user_first varchar(256) not null,
    user_last varchar(256) not null,
    user_email varchar(256) not null,
    user_uid varchar(256) not null,
    user_pwd varchar(256) not null,
    user_followers int(11) not null,
    user_following int(11) not null
);";
$result=mysqli_query($conn, $sql);
include_once 'includes/dbh.inc.php';
$sql1="CREATE TABLE follow_list(
  follower varchar(256) not null,
  followee varchar(256) not null    
);";
$result=mysqli_query($conn, $sql1);
include_once 'includes/dbh.inc.php';
$sql2="CREATE TABLE posts(
username varchar(256) not null,
heading varchar(256) not null,
body text not null,
post_id int(11) AUTO_INCREMENT not null PRIMARY KEY,
status int(11)
);";
error_reporting(0);
$result=mysqli_query($conn, $sql2);
$_SESSION['alert']=$_SESSION['alerts'];
$_SESSION['a']=$_SESSION['as'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social Media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" >
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>    
<body>
 <div id="intro">
     <h2>LOGIN</h2>
     <br>
              <?php 
         if(null!==$_SESSION['a'])
         { $ab=$_SESSION['as'];
            echo '<div class="alert alert-success alert-dismissible fade show" style="margin:10px;" >'.
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'.$ab.
  '</div>';
    $_SESSION['as']=null;        
         }
     ?>
     <form action="includes/login.inc.php" method="POST">
       <input type="text" name="uid" placeholder="Username/E-mail">
         <br><br>
        <input type="password" name="pwd" placeholder="Password">
         <?php 
         if(null!==$_SESSION['alert'])
         { $ab=$_SESSION['alerts'];
            echo '<div class="alert alert-danger alert-dismissible fade show" style="margin:10px;" >'.
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'.
    '<strong>Warning!</strong>'.$ab.
  '</div>';
    $_SESSION['alerts']=null;        
         }
     ?>    
       <br><br>
         <button type="submit" name="login_submit" id="ready">Login</button>
       </form>
     <br>
     <div style="font-size:20px;">
     <a href="signup.php">Sign Up</a>
    </div>
</div>
    
<?php 
 include_once 'footer.php';
 ?>
  