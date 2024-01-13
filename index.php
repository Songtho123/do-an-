<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Portal | Trang chủ</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <style>
    .post-details {
        background-color: white;
    }
    .owl-carousel .item img {
        width: 100%;
        height: 100%; /* Set a fixed height for the carousel items */
        object-fit: cover; /* Maintain aspect ratio and cover the entire container */
    }   

</style>
</head>

<body>
    <?php include('includes/header.php'); ?>
<div class="container">
<h2>Bài báo tiêu điểm</h2>
    <div class="owl-carousel">
        <?php
        $featuredQuery = mysqli_query($con, "SELECT id as pid, PostTitle, PostImage, PostUrl FROM tblposts WHERE Is_Active = 1 ORDER BY PostingDate DESC LIMIT 10");

        while ($featuredPost = mysqli_fetch_assoc($featuredQuery)) {
            $limitedTitle = strlen($featuredPost['PostTitle']) > 50 ? substr($featuredPost['PostTitle'], 0, 50) . '...' : $featuredPost['PostTitle'];
        ?>
            <div class="item">
                <div class="item-content">
                    <img src="admin/postimages/<?php echo htmlentities($featuredPost['PostImage']); ?>" alt="<?php echo htmlentities($limitedTitle); ?>">
                    <div class="post-details">
                        <h3><?php echo htmlentities($limitedTitle); ?></h3>
                        <a href="news-details.php?nid=<?php echo htmlentities($featuredPost['pid']); ?>" class="btn btn-primary">Đọc thêm</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
    <div class="container">
      <div class="row" style="margin-top: 0.5%">
        <div class="col-md-8">
        
            <?php 
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 8;
            $offset = ($pageno-1) * $no_of_records_per_page;


            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
            $result = mysqli_query($con,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);


            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
            while ($row=mysqli_fetch_array($query)) {
            ?>


                      <div class="card mb-4">
                        <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" style="height: 375px;">
                        <div class="card-body">
                          <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                            <p ><b>Danh mục : </b> <a style="color: black;" href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
                  
                          <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Đọc ngay &rarr;</a>
                        </div>
                      </div>
            <?php } ?>

                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                </ul>

        </div>
        

        <?php include('includes/sidebar.php');?>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php include ('includes/scroll_to_top.php'); ?>
    <?php include('includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                items: 3,
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 2000,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false,
                        loop: false
                    }
                },
                onInitialized: setSameHeight,
                onResized: setSameHeight
            });

            // Function to set the same height for all items
            function setSameHeight(event) {
                var maxHeight = 0;
                owl.find('.item').each(function() {
                    var currentHeight = $(this).height();
                    maxHeight = (currentHeight > maxHeight) ? currentHeight : maxHeight;
                });
                owl.find('.item').height(maxHeight);
            }
        });
          
        // Display today's date in Vietnamese
        var today = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = today.toLocaleDateString('vi-VN', options);
        $("#today-date").text("Ngày hôm nay: " + formattedDate);
    </script>
<style>
    .owl-carousel .item {
        height: 400px; /* Set a fixed height for the entire item */
        display: flex;
    }

    .owl-carousel .item-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .owl-carousel .item img {
        width: 100%;
        height: 100%; /* Ensure the image takes up the full height of its container */
        object-fit: cover; /* Maintain image aspect ratio */
    }

    .owl-carousel .post-details {
        padding: 10px;
        background: #fff;
    }
</style>
  </body>

</html>
