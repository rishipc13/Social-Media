<?php
  session_start();
if (isset($_POST['editprofile_submit'])) {
	
	include 'dbh.inc.php';
    $newpwd = mysqli_real_escape_string($conn, $_POST['newpwd']);
    $oldpwd = mysqli_real_escape_string($conn, $_POST['oldpwd']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $uid=$_SESSION['u_uid'];
    $id=$_SESSION['u_id'];
    if (empty($username) || empty($newpwd) || empty($oldpwd)) {
		header ("Location: ../home.php?field=empty");
		exit();
	}
    
    else{
        $sql = "SELECT * FROM users WHERE user_uid='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
          header ("Location: ../home.php?signup=usertaken");
					exit();
				}
        else{include 'dbh.inc.php';
            $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $hashedPwdCheck = password_verify($oldpwd, $row['user_pwd']);
        if ($hashedPwdCheck == false) {
				header("Location: ../home.php?signup=error");
					exit();
				}
        else if($hashedPwdCheck == true)
          { $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
           include 'dbh.inc.php';
            $s="UPDATE users SET user_uid='$username',user_pwd='$hashedPwd' WHERE user_id='$id';";
    mysqli_query($conn, $s);
    include 'dbh.inc.php';
    $sql="UPDATE follow_list SET follower='$username' WHERE follower='$uid';"; mysqli_query($conn, $sql);   
    include 'dbh.inc.php';
    $sql="UPDATE follow_list SET followee='$username' WHERE followee='$uid';"; mysqli_query($conn, $sql);
    include 'dbh.inc.php';
    $sql="UPDATE posts SET username='$username' WHERE username='$uid';";
    mysqli_query($conn, $sql);       
    header ("Location: ../index.php?edit=success");
    exit();  
            
          }
        }
    }
}

else {
	header ("Location: ../home.php");
	exit();
}