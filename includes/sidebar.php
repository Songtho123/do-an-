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
    }    
    </style>

  
  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
            <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Go!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <?php
                    $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory WHERE Is_Active = 1");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <li>
                            <a style="color: black;" href="category.php?catid=<?php echo htmlentities($row['id']) ?>">
                                <?php echo htmlentities($row['CategoryName']); ?>
                            </a>
                        </li>
                    <?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4 sticky-700">
            <h5 class="card-header">Recent News</h5>
            <div class="card-body">
              <ul class="mb-0">
                <?php
                $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId ORDER BY tblposts.id DESC LIMIT 8");
                while ($row=mysqli_fetch_array($query)) {
                ?>
                  <li>
                      <a style="color: black;" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
