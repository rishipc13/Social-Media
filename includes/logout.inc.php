<?php


	session_start();
    $_SESSION['u_id']="";
    $_SESSION['alerts']=null;
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();

