<?php include "includes/db.php"; ?>
<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navigation -->
<?php include "includes/navigation.php"; ?>

<body>
<!-- Page Content -->
    <div class="container">
        <div class="row ">
       
            <!-- Blog Entries Column -->
            <div  class="col-md-8"> 
        
             <?php 
          $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts");
          $row = mysqli_fetch_assoc($result);
          $total_records = $row['total'];

          $records_per_page = 5;
          // Calculate total number of pages
          $total_pages = ceil($total_records / $records_per_page);

          if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
          } else {
            $current_page = 1;
          }
          // Calculate offset
          $offset = ($current_page - 1) * $records_per_page;

                $sellect_all_posts = mysqli_query($conn,"SELECT  *  FROM posts WHERE  post_status = 'published' LIMIT $offset, $records_per_page");
                while($row = mysqli_fetch_assoc($sellect_all_posts)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr(nl2br($row['post_content']),0, 200 );
                
                       ?>
                  
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id_=<?php echo $post_id?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                   <a href="author.php?author=<?php echo $post_author?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id_=<?php echo $post_id?>">
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt=""></a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-success" href="post.php?p_id_=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               <?php }
                      
            
      
               ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

              
        </div>
        <!-- /.row -->
        </div>
        <hr h-25 >
                       
    

                    </div>
        <!-- /.row -->
        </div>
        <hr h-25 >
        </div>
        <ul class="pager">
        <?php 
        for($i = 1; $i <= $total_pages; $i++){

        if ($i ==  $current_page){
          echo "<li><a class= 'active_link' href='index.php?page={$i}'>{$i}</a></li>"; 
        } else{

           echo "<li><a href='index.php?page={$i}'>{$i}</a></li>"; 
        }
       
      }
           ?> 
        </ul>
        <?php include "includes/footer.php"; ?>