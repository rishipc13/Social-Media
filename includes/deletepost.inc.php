<?php
include 'dbh.inc.php';
session_start();
if(isset($_POST['delete'])){
       $id = $_POST['delete_rec_id'];  
       $sql = "DELETE FROM posts WHERE post_id='$id';";
    mysqli_query($conn, $sql);
    header ("Location: ../home.php?del=success");
    exit();   
    
    }
else{
       header ("Location: ../home.php");
       exit();   
    
}
?>
