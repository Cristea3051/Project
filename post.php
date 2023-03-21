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

             if (isset($_GET['p_id_'])){
                $p_id = $_GET['p_id_'];
                
                $sellect_all_posts = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $p_id");
                while($row = mysqli_fetch_assoc($sellect_all_posts)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = nl2br($row['post_content']);
                
                       ?>

                

                 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                

                <hr>
               <?php }
             } 
               ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

              
        </div>
        <!-- /.row -->
        
        <hr h-25 >
                        <!-- Blog Comments -->


                        <?php 
                          if(isset($_POST['creat_com'])) {
                            $p_id = $_GET['p_id_'];
                            $com_author = $_POST['comment_author'];
                            $com_email = $_POST['comment_email'];
                            $com_content = $_POST['comment_content'];
                            
                            $query = "INSERT INTO comments( comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) 
                            VALUES ($p_id,'{$com_author}','{$com_email}','{$com_content}','unapproved',now())";

                       $create_com_query = mysqli_query($conn, $query);
                        if (!$create_com_query){
                            die('QUERY FAILED' . mysqli_error($conn));
                        }
                       
                          }
                        ?>
                          
            <div class = "container">
                <!-- Comments Form -->
                <div class="well">
                
                    <h4>Leave a Comment:</h4>
                    <form role="form" action = "" method ="post">
                       <div class="form-group">
                            <label for="Author">Author</label>
                            <input class="form-control" type="text" name = "comment_author" placeholder = "Some Author"></input>
                       <div class="form-group">
                        <label for="Author">Email</label>
                            <input class="form-control" type="email" name = "comment_email" placeholder = "someemail@mail.com"></input>
                        </div>
                        <div class="form-group">
                        <label for="Comment">Your Comment</label>
                            <textarea class="form-control" rows="4" type="text" name = "comment_content" placeholder = "Some comment text"></textarea>
                        </div>
                        <button type="submit" name = "creat_com" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>

                    </div>
                <!-- /.row -->
           </div>
        <hr h-25 >
    </div>
        <?php include "includes/footer.php"; ?>
   