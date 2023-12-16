<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title> user | user</title>
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

<?php include('includes/topheader.php');?>

<?php include('includes/leftsidebar.php');?>
            <div class="content-page">
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Danh Sách Cộng Tác Viên</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">user </a>
                                        </li>
                                        <li class="active">
                                           Cộng tác viên
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>


<div class="row">
<div class="col-sm-6">  
</div>

                                    <div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">
<div class="m-b-30">
<a href="add-user.php">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
 </div>

												<div class="table-responsive">
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>iduser</th>
                                                                <th>Họ và Tên</th>
                                                                <th>Căn cước Công dân</th>
                                                                <th>password</th>
                                                                <th>email</th>
                                                                <th>Ngày sinh</th>
                                                                <th>Số điện thoại</th>
                                                                <th>Quê quán</th>
                                                                <th>Ngày Đăng ký</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
        <?php
           
$query=mysqli_query($con,"Select idctv,name,cccd,ctvpassword,email,phone,Birthday,city,CreationDate from  tblctv");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

        <tr>
            <td><?php echo $row['idctv']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['cccd']?></td>
            <td><?php echo $row['ctvpassword']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['Birthday']?></td>
            <td><?php echo $row['city']?></td>
            <td><?php echo $row['CreationDate']?></td>
            <td><a href="edit-user.php?edit=<?php echo $row['id'];?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
            &nbsp;<a href="user-delete.php?del=<?php echo $row['id'];?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
        </tr>


     
        <?php } ?>
    </table>
            <ul class="pagination">
                <li class="page-item disabled" >
                    <a href="#" class="page-link">Parvious</a>
                </li>
            <?php
            $sql=mysqli_query($conn,"select * from tblctv");
                $count=mysqli_num_rows($sql);
                $a=$count/3;
                ceil($a);
        
                for($i= 1;$i<=$a;$i++){
            ?>

                <li class="page-item"><a class="page-link" href="user?page=<?php echo $i;?>"><?php echo $i;?></a></li>
            <?php 
        } 
        ?>
                <li class="page-item disabled">
                <a href="#" class="page-link">Next</a>
                </li>
        </ul>   
</tbody>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
?>