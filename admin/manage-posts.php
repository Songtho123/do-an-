<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
}

// Handle post deletion
if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $postid = intval($_GET['pid']);
    $query = mysqli_query($con, "UPDATE tblposts SET Is_Active = 0 WHERE id = '$postid'");
    if ($query) {
        $msg = "Post deleted ";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}

$searchTerm = isset($_GET['searchTerm']) ? mysqli_real_escape_string($con, $_GET['searchTerm']) : '';
$queryCondition = $searchTerm ? "AND (tblposts.PostTitle LIKE '%$searchTerm%' OR tblcategory.CategoryName LIKE '%$searchTerm%' OR tblsubcategory.Subcategory LIKE '%$searchTerm%' OR tblposts.Ctvid LIKE '%$searchTerm%')" : '';

$query = mysqli_query($con, "SELECT tblposts.id as postid, tblposts.PostTitle as title,tblposts.Ctvid as Ctvid, tblcategory.CategoryName as category, tblsubcategory.Subcategory as subcategory FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId WHERE tblposts.Is_Active = 1 $queryCondition");
$rowcount = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <title>Cổng tin tức | Quản lý bài báo</title>
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
    <div id="wrapper">
        <?php include('includes/topheader.php'); ?>
        <?php include('includes/leftsidebar.php'); ?>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Quản lý bài báo</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Bài báo</a>
                                    </li>
                                    <li class="active">
                                        Quản lý bài viết
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="form-group m-b-20">
                                    <form method="GET" action="">
                                        <label for="searchTerm">Tìm kiếm bài viết</label>
                                        <input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Nhập từ khóa" value="<?php echo htmlentities($searchTerm); ?>">
                                        <button type="submit" name="search" class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>Tựa đề</th>
                                                <th>Danh mục</th>
                                                <th>Danh mục chi tiết</th>
                                                <th>Tác giả</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($rowcount == 0) {
                                            ?>
                                            <tr>
                                                <td colspan="4" align="center"><h3 style="color:red">Không dữ liệu được tìm thấy</h3></td>
                                            </tr>
                                            <?php
                                            } else {
                                                while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td><b><?php echo htmlentities($row['title']);?></b></td>
                                                <td><?php echo htmlentities($row['category'])?></td>
                                                <td><?php echo htmlentities($row['subcategory'])?></td>
                                                <td><?php echo htmlentities($row['Ctvid'])?></td>
                                                <td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><i
                                                            class="fa fa-pencil"
                                                            style="color: #29b6f6;"></i></a> &nbsp;<a
                                                        href="manage-posts.php?pid=<?php echo htmlentities($row['postid']);?>&&action=del"
                                                        onclick="return confirm('Chắc chắn xóa?')"> <i
                                                            class="fa fa-trash-o"
                                                            style="color: #f05050"></i></a> </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <!-- CounterUp -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>
        <!-- Morris Chart -->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>
        <!-- Load page level scripts -->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>
