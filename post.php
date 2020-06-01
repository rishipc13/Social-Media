<link rel="stylesheet" type="text/css" href="style.css">
<?php 
include_once 'header.php';
?>

<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<div class="container" style="margin-top:20px;margin-left:24%;">
  <form action="includes/addpost.inc.php" method="POST">
    <label for="fname">Title</label>
    <input type="text" id="fname" name="title" placeholder="Enter a title">
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <button type="submit" name="post_submit" id="a">Submit</button>
  </form>
</div>
<script>
CKEDITOR.replace('subject');
</script>