<?php
session_start(); 
if (isset($_POST['signup_submit'])) {
	
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $f=0;
	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        $_SESSION['arts']=" Empty Field";
		header ("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            $_SESSION['arts']=" Invalid Username";
			header ("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['arts']=" Invalid Username";
                header ("Location: ../signup.php?signup=emailerror");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
                    $_SESSION['arts']=" Username Taken";
					header ("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd,user_followers,user_following) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd','$f','$f');";
					mysqli_query($conn, $sql);
                    $_SESSION['as']=" Signup Successful";
					header ("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}


} else {
	header ("Location: ../index.php");
	exit();
}