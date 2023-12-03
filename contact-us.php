<?php
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cổng tin tức | Liên hệ</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  </head>

  <body>

    <?php include('includes/header.php');?>

    <div class="container">
<?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
  
      </h1>

      <div class="row">

        <div class="col-lg-12">

          <p><?php echo $row['Description'];?></p>
        </div>
      </div>
<?php } ?>

<?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
      </h1>
      <div class="row">

        <div class="col-lg-12">

          <p><?php echo $row['Description'];?></p>
        </div>
      </div>
 
<?php } ?>
    
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php include ('includes/footer.php'); ?>

  </body>

</html>
