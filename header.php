<?php session_start(); 
$nm=$_SESSION['u_uid'];
include_once 'includes/dbh.inc.php';
$sql2="SELECT * FROM posts WHERE status = 0 AND username IN(SELECT followee FROM follow_list WHERE follower='$nm' )";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);
?>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-container input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backendsearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-container").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});    
</script>
<div class="topnav">
  <a href="home.php">Home</a>
  <a href="post.php">Post</a>
  <a href="includes/logout.inc.php" style="float:right;">Logout</a>
  <a href="profile.php" style="float:right;">My Profile</a>
  <div class="search-container">
    <form action="includes/search.inc.php" method="POST">
      <input type="text" placeholder="Enter Username" autocomplete="off" name="uname-search">
      <button type="submit" name="search_submit"><i class="fa fa-search"></i></button>
      <div class="result"></div>  
    </form>
  </div>
</div>
<div style="position:relative; left:150px;top:-45px;">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn" style="border:0; cursor:pointer;"><span id="notification-count" style="position:relative;left:9px;top:-10px;font-size: 20px;	color: #de5050;
	           font-weight:bold;"><?php if($count>0) { echo $count; } ?></span><img src="notification-icon.png" /></button>
				 <div id="notification-latest" style="box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);	max-width: 250px;position:relative; top:30px;
	text-align: left;"></div>
				</div>	
<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
