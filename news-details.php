<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Portal</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
    .card-header {
        background-color: #007bff; /* Change to your preferred background color */
        color: #fff; /* Change to your preferred text color */
        font-size: 18px; /* Adjust the font size as needed */
        font-weight: bold; /* Add boldness for emphasis */
    }
    .comment-container {
        margin-top: 20px; /* Add margin to separate comments from the form */
    }

    .comment {
        background-color: #f8f9fa; /* Light gray background color for comments */
        border: 1px solid #ddd; /* Border to separate comments */
        padding: 10px; /* Add padding for better spacing */
        margin-bottom: 10px; /* Margin between individual comments */
    }

    .comment img {
        width: 40px; /* Set a fixed width for user avatars */
        height: 40px; /* Set a fixed height for user avatars */
        border-radius: 50%; /* Make user avatars circular */
        margin-right: 10px; /* Margin between avatar and comment text */
    }
    .comment-form-container {
        margin-top: 20px; /* Add margin to separate the form from comments */
    }

    .comment-form {
        background-color: #f8f9fa; /* Light gray background color for the form */
        border: 1px solid #ddd; /* Border to separate the form */
        padding: 20px; /* Add padding for better spacing */
        border-radius: 5px; /* Optional: Add border radius for a rounded look */
    }

    .comment-form label {
        font-weight: bold; /* Make labels bold for emphasis */
        margin-bottom: 5px; /* Add margin between labels and input fields */
    }

    .comment-form input,
    .comment-form textarea {
        width: 100%; /* Make input fields take up full width */
        margin-bottom: 10px; /* Add margin between input fields */
        padding: 8px; /* Add padding for input fields */
        border: 1px solid #ccc; /* Add a border to input fields */
        border-radius: 4px; /* Optional: Add border radius for a rounded look */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }

    .comment-form button {
        background-color: #007bff; /* Blue background color for the submit button */
        color: #fff; /* White text color for the submit button */
        padding: 10px 20px; /* Add padding for the submit button */
        border: none; /* Remove the default button border */
        border-radius: 4px; /* Optional: Add border radius for a rounded look */
        cursor: pointer; /* Change cursor to a pointer on hover */
    }
</style>

  </head>

  <body>

   <?php include('includes/header.php');?>
    <div class="container">
      <div class="row" style="margin-top: 0.5%">

        <div class="col-md-8">

<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-2">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Danh mục : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color: black;"><?php echo htmlentities($row['category']);?></a> |
                <b>Danh mục nhỏ : </b><?php echo htmlentities($row['subcategory']);?> <b> Đăng lúc </b><?php echo htmlentities($row['postingdate']);?></p>
                <hr />

 <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
  
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
             
            </div>
            <div class="card-footer text-muted">
             
           
            </div>
          </div>
<?php } ?>
        </div>

      <?php include('includes/sidebar.php');?>
      </div>

 <div class="row">
   <div class="col-md-8">
    <div class="card my-4">
          <h5 class="card-header">Để lại bình luận:</h5>
          <div class="card-body">
            <form name="Comment" method="post">
            <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
          <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
    </div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Gửi</button>
              </form>
            </div>
          </div>

 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-2">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>tại</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>

        </div>
      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php include ('includes/scroll_to_top.php'); ?>
    <?php include ('includes/footer.php'); ?>
  </body>

</html>
