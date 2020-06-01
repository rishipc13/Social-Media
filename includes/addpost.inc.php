<?php
if(isset($_POST['post_submit']))
{   session_start(); 
    include_once 'dbh.inc.php';

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$body = $_POST['subject'];
    $status=0;
    $username=$_SESSION['u_uid'];
    if (empty($title) || empty($body)){
		header ("Location: ../post.php?field=empty");
		exit();
	}
    
    else{
        $sql="INSERT INTO posts(username,heading,body,status) VALUES('$username','$title','$body','$status')";
        mysqli_query($conn, $sql);
        header ("Location: ../home.php?post=success");
        exit();
    }
}
