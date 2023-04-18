<?php ob_start();?>
<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
<?php

$sellect_all_cat_querry = mysqli_query($conn,"SELECT * FROM categories");
while($row = mysqli_fetch_assoc($sellect_all_cat_querry)){
    $cat_id = $row ['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
}

if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == 'admin'){
      echo "<li><a href='admin'>Admin</a></li>";
}
 }
    
?>

<li><a href='registration.php'>register</a></li>


<?php if(isset($_SESSION['user_role'])){
   
if(isset($_GET['p_id_'])){
    $the_post_id = $_GET['p_id_'];
    echo "<li><a href='admin/posts.php?source=edit_post&p_id = {$post_id}'>Edit Post</a></li>";
}
} ?>
 <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?><b class="caret"></b></a>
 <ul class="dropdown-menu">
                <li>
              <?php  if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == 'admin'){
      echo "<li><a href='profile'>profile</a></li>";  
}
 }?>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
</li>

             </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>