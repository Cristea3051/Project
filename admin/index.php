<?php ob_start();?>
<?php session_start();
if (!isset($_SESSION['user_role']) && $_SESSION['user_role'] !=='admin'){
header ("Location: ../index.php");
} else { ?>
<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>
<div id="page-wrapper">
 <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to admin page <?php echo $_SESSION['user_name']; ?>!</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

 <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
                         $query = "SELECT * FROM posts";
                         $select_all_posts = mysqli_query($conn, $query);
                         $count_posts = mysqli_num_rows($select_all_posts);

                       ?>

                  <div class='huge'><?php echo $count_posts; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                         $query = "SELECT * FROM comments";
                         $select_all_comments = mysqli_query($conn, $query);
                         $count_comments = mysqli_num_rows($select_all_comments);

                       ?>
                     <div class='huge'><?php echo $count_comments; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                         $query = "SELECT * FROM users";
                         $select_all_users = mysqli_query($conn, $query);
                         $count_users = mysqli_num_rows($select_all_users);

                       ?>
                    <div class='huge'><?php echo $count_users; ?></div>
                        <div> Users </div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                         $query = "SELECT * FROM categories";
                         $select_all_categories = mysqli_query($conn, $query);
                         $count_categories = mysqli_num_rows($select_all_categories);

                       ?>
                        <div class='huge'><?php echo $count_categories; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

       <?php
        $query = "SELECT * FROM posts WHERE post_status = 'published'";
        $select_post_draft = mysqli_query($conn, $query);
        $count_post_public = mysqli_num_rows($select_post_draft);

        $query = "SELECT * FROM posts WHERE post_status = 'draft'";
        $select_post_draft = mysqli_query($conn, $query);
        $count_post_draft = mysqli_num_rows($select_post_draft);

        $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
        $select_approve = mysqli_query($conn, $query);
        $count_comments_approve = mysqli_num_rows($select_approve);

        $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
        $select_unapprove = mysqli_query($conn, $query);
        $count_comments_unapprove = mysqli_num_rows($select_unapprove);

        $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
        $select_user_subscriber = mysqli_query($conn, $query);
        $count_user_subscriber = mysqli_num_rows($select_user_subscriber);

        $query = "SELECT * FROM users WHERE user_role = 'admin'";
        $select_user_admin = mysqli_query($conn, $query);
        $count_user_admin = mysqli_num_rows($select_user_admin);

       ?>

     <div class="row">
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php 
            $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'All Commets', 'Comments approved', 'Pending Comments', 'All Users', 'Users subscribers', 'Users Admins', 'Categories'];
            $element_count = [$count_posts, $count_post_public, $count_post_draft, $count_comments,  $count_comments_approve, $count_comments_unapprove, $count_users, $count_user_subscriber, $count_user_admin, $count_categories];

            for($i=0; $i<10; $i++){
              echo "['{$element_text[$i]}'" .  "," . "{$element_count[$i]}],";
            }

           ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
          </script>

      
     </div>
  
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
</div>


<?php include "includes/admin_footer.php"; }?>

