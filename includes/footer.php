
<footer class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               
            <?php 
            $pagetype='aboutus';
            $query=mysqli_query($con,"select PageTitle,Description from tblaboutus where PageName='$pagetype'");
            while($row=mysqli_fetch_array($query))
            {

            ?>
                <h3 class="mt-2 mb-1"><?php echo htmlentities($row['PageTitle'])?>
            
                </h3>

                <div class="row">

                    <div class="col-lg-12">
                    <p><?php echo $row['Description'];?></p>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="col-md-4">
            <?php 
            $pagetype='contactus';
            $query=mysqli_query($con,"select PageTitle,Description from tblaboutus where PageName='$pagetype'");
            while($row=mysqli_fetch_array($query))
            {

            ?>
                <h3 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
                </h3>
                <div class="row">

                    <div class="col-lg-12">

                    <p><?php echo $row['Description'];?></p>
                    </div>
                </div>
            
            <?php } ?>
                
                
            </div>
            <div class="col-md-4">
                <h4>Follow Us</h4>
                <!-- Add your social media icons and links here -->
                <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<?php ?>