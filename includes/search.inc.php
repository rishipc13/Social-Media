<?php 
include_once 'header.php';
$result;

if (isset($_POST['search_submit'])) {
  include 'dbh.inc.php';
  $uname = mysqli_real_escape_string($conn, $_POST['uname-search']);  
  $sql = "SELECT * FROM users WHERE user_uid='$uname'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header ("Location: ../home.php?search=notfound");
			exit();
		}
    else{ $row = mysqli_fetch_assoc($result);
          $a=$row['user_uid'];
          header ("Location: ../searchresult.php?uid=$a");
			exit();
        
    }



}

else{
    header ("Location: ../home.php?search=error");
	exit();
}

?>