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
                $p_id= $_GET['p_id_'];
                
                $query = "UPDATE posts SET post_view = post_view + 1 WHERE post_id = $p_id";
                $create_view_query = mysqli_query($conn, $query);

                $sellect_all_posts = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $p_id");
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
                <a href="includes/download.php" class="btn btn-primary">Download PDF</a>
                

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
                            if(!empty($com_author) && !empty($com_email) && !empty($com_content)){

                                    $query = "INSERT INTO comments( comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) 
                            VALUES ($p_id,'{$com_author}','{$com_email}','{$com_content}','unapproved',now())";

                       $create_com_query = mysqli_query($conn, $query);
                        if (!$create_com_query){
                            die('QUERY FAILED' . mysqli_error($conn));
                        }
                       
                          }else {
                            echo "<script>alert('Fields cannot beempty!')</script>";
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
                 <?php  
                    $query = "SELECT * FROM comments WHERE comment_post_id = $p_id  AND (comment_status = 'approved') ORDER BY comment_id DESC"; 
                    $select_com_query = mysqli_query($conn, $query);
                    if(!$select_com_query){
                        die('Query failed ' . mysqli_error($conn));

                    }while($row= mysqli_fetch_array($select_com_query)){
                        $com_date = $row ['comment_date'];
                        $com_content = $row ['comment_content'];
                        $com_author = $row ['comment_author'];
                     ?>
                    
                   
                    
                   

                 
                <!-- Comment -->
                <div class="media">

                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $com_author;  ?>
                            <small><?php echo $com_date; ?></small>
                        </h4>
                        <?php echo $com_content;  ?>
                    </div>
                </div>
                  <?php } ?>
                <!-- /.row -->
           </div>
        <hr h-25 >
    </div>
   
        <?php include "includes/footer.php"; ?>
   