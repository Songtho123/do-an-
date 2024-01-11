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
    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333; /* Dark color for the title */
    }

    .card-subtitle {
        font-size: 14px;
        color: #555; /* Slightly darker than the base color for subtitles */
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 20px;
        color: #666; /* Slightly darker than the base color for text */
    }

    .card-footer {
        background-color: #f8f9fa; /* Light gray background for the footer */
    }

    .btn-primary {
        background-color: #007bff; /* Primary blue color for the button */
        border-color: #007bff; /* Matching border color */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        border-color: #0056b3;
    }    </style>

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
              <p class="card-subtitle mb-2 text-muted">
                <b>Danh mục : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color: black;"><?php echo htmlentities($row['category']);?></a> |
                <b>Danh mục nhỏ : </b><?php echo htmlentities($row['subcategory']);?> <b> Đăng lúc </b><?php echo htmlentities($row['postingdate']);?></p>
                <hr class="mt-0 mb-3"/>
                <img class="card-img-top img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                            <p class="card-text"><?php 
                $pt=$row['postdetails'];
              echo  (substr($pt,0));?>
              </p>
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
