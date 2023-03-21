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
             if (isset($_GET['category'])){
                $get_cat_id = $_GET['category'];
                $sellect_all_posts = mysqli_query($conn,"SELECT * FROM posts WHERE post_category_id = $get_cat_id");
                while($row = mysqli_fetch_assoc($sellect_all_posts)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr(nl2br($row['post_content']),0, 200 );
                
                       ?>

                

                 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id_=<?php echo $post_id?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-success" href="post.php?p_id_=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               <?php }
             } else {
                echo "Something wrong";
             }
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
        <?php include "includes/footer.php"; ?>
   