<?php
session_start();
$friend=$_SESSION['fuid'];
$user=$_SESSION['u_uid'];
include 'dbh.inc.php';
if (isset($_POST['follow_submit'])) {
    $sql = "SELECT * FROM follow_list WHERE follower='$user' AND followee='$friend'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck==0)
    {     $sq = "INSERT INTO follow_list (follower, followee) VALUES ('$user', '$friend');";
     mysqli_query($conn, $sq);
     include 'dbh.inc.php';
     $sqli="UPDATE users SET user_following=user_following+1
     WHERE user_uid='$user';";
    mysqli_query($conn, $sqli);
     include 'dbh.inc.php';
     $s="UPDATE users SET user_followers=user_followers+1 WHERE user_uid='$friend';";
    mysqli_query($conn, $s);
    header ("Location: ../home.php?follow=success");
    exit();    
    }
    else{
        header ("Location: ../home.php");
	    exit();
    }
}

else{
    header ("Location: ../home.php?follow=error");
	exit();
}