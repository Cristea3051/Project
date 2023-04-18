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

             if (isset($_GET['author'])){
                $p_author= $_GET['author'];
                $sellect_all_posts = mysqli_query($conn, "SELECT * FROM posts WHERE post_author = '$p_author'");
                if(!$sellect_all_posts){
                     die('QUERY FAILED' . mysqli_error($conn));
                } else{
                while($row = mysqli_fetch_assoc($sellect_all_posts)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = nl2br($row['post_content']);
                
                       ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author.php?author=<?php echo $post_author?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                

                <hr>
               <?php 
                }
            }
             } 
               ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

              
        </div>
        <!-- /.row -->
        
        
                        <!-- Blog Comments -->



                <!-- Posted Comments -->
                 
                <!-- /.row -->
           
        <hr h-25 >
    </div>
        <?php include "includes/footer.php"; ?>
   