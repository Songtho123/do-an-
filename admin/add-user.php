<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
} else{
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $cccd=$_POST['cccd'];
        $email=$_POST['email'];
        $ctvpassword=$_POST['ctvpassword'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $Birthday=$_POST['Birthday'];
        $role=$_POST['role'];
        $query=mysqli_query($con,"insert into tblctv(name,cccd,email,ctvpassword,phone,city,Birthday,role)values('$name','$cccd',$email,'$ctvpassword','$phone','$city','$Birthday','$role')");
        if($query){

            echo "<script> alert('thêm cộng tác viên thành công') </script>";
        }else{
            echo "<script> alert('vui long thu lai') </script>";
        }
    }



}

?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Cổng tin tức | Add user</title>

        <!-- App css -->
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
                                    <h4 class="page-title">Thêm Cộng Tác Viên</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                    
                                        <li class="active">
                                        Tạo tài khoản
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Tạo tài khoản </b></h4>
                                    <hr />
                        		



<form action="add-user.php" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform() ">
    
  <div class="form-group">
    <label for="email">Họ Và Tên</label>
    <input type="text" placeholder="Họ và Tên" name="name" class="form-control" id="email">
  </div>

   
  <div class="form-group">
    <label for="email">Căn cước</label>
    <input type="text" placeholder="cccd" name="cccd" class="form-control" id="email">
  </div>
   
   
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" placeholder="Email" name="email" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="email">password</label>
    <input type="password" placeholder="Password" name="ctvpassword" class="form-control" id="email">
  </div>
   
  <div class="form-group">
    <label for="email">Số điện thoại</label>
    <input type="text" placeholder="Số điện thoại" name="phone" class="form-control" id="email">
  </div>
   
  <div class="form-group">
    <label for="email">Địa chỉ</label>
    <input type="text" placeholder="Địa chỉ" name="city" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="inputZip">birthday</label>
    <input  type="date" name="Birthday" class="form-control">
  </div>
  <input type="checkbox" name="role" value="CTV">Cộng tác viên
  <br><br>
  <input type="submit" name="submit" class="btn btn-primary" value="Thêm cộng tác viên">
</form>
</div>

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