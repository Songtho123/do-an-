<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <link rel="stylesheet" href="css/banner.css">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="50"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <?php
                $query = mysqli_query($con, "select id,CategoryName from tblcategory");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <?php
    $pagetype='banner';
    $query = mysqli_query($con, "SELECT banner1, banner2, banner3 FROM tblbanner where bannername='$pagetype'");

    if ($query) {
        while ($row = mysqli_fetch_array($query)) {
    ?>
            <div class="slideshow-container">
                <div class="mySlides fade">
                 <center><p><?php echo $row['banner1'];?></p></center>  
                    
                </div>

                <div class="mySlides fade">
                <center><p><?php echo $row['banner2'];?></p></center>
                   
                </div>

                <div class="mySlides fade">
                <center><p><?php echo $row['banner3'];?></p></center>
                    
                </div>

                <div style="text-align:center">
                    <?php
                    // Dynamically generate dots based on the number of images
                    for ($i = 0; $i < 3; $i++) {
                        echo '<span class="dot"></span>';
                    }
                    ?>
                </div>
            </div>

            <br>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1;
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            </script>
    <?php
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
    ?>
</div>