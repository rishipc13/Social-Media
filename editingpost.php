<link rel="stylesheet" type="text/css" href="style.css">
<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
$heading=$_POST['edit_heading'];
$body=$_POST['edit_body'];
$id=$_POST['delete_rec_id'];
$sql = "DELETE FROM posts WHERE post_id='$id';";
mysqli_query($conn, $sql);
?>
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<div class="container" style="margin-top:20px;margin-left:24%;">
  <form action="includes/addpost.inc.php" method="POST">
    <label for="fname">Title</label>
    <br><br>
    <input type="text" id="fname" name="title" value="<?php print $heading; ?>">
    <label for="subject">Subject</label>
    <br><br>  
      <textarea id="subject" style="width:500px;" name="subject"><?php print $body; ?></textarea>
    <br><br>
    <button type="submit" name="post_submit" id="a">Submit</button>
  </form>
</div>
<script>
CKEDITOR.replace('subject');
</script>