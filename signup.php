<?php
  include_once 'index.php';
  session_start();
  $_SESSION['art']=$_SESSION['arts'];
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<div id="intro">
   <h2>Signup</h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<input type="text" name="first" placeholder="Firstname">
				<input type="text" name="last" placeholder="Lastname">
				<input type="text" name="email" placeholder="E-mail">
				<input type="text" name="uid" placeholder="Username">
				<input type="password" name="pwd" placeholder="Password">
				         <?php 
         if(null!==$_SESSION['art'])
         { $ab=$_SESSION['arts'];
            echo '<div class="alert alert-danger alert-dismissible fade show" style="margin:10px;" >'.
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'.
    '<strong>Warning!</strong>'.$ab.
  '</div>';
    $_SESSION['arts']=null;        
         }
     ?>  
                
    <button type="submit" name="signup_submit" style="    margin: 0 auto;
    width: 30%;
    height: 30px;
    border: none;
    background-color: #222;
    font-family: arial;
    font-size: 16px;
    color: #fff;
    cursor: pointer;">Sign up</button>
			</form>
    <br>
    <a href="index.php">Login</a>
</div>

<?php 
	include_once 'footer.php';
?>
