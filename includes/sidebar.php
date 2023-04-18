 <div class="col-md-4">

         <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
       <form action="search.php" method= "post">
       <div class="input-group">
        <input name ="search" type="text" class="form-control">
        <span class="input-group-btn">
        <button name = "submit" class="btn btn-primary" type="submit">
                <span class="glyphicon glyphicon-search"></span>
         </button>
        </span>
       </div>
      </form> <!--search form -->
       <!-- /.input-group -->
    </div>
<?php
if(isset($_SESSION['user_role'])){
    if (isset($_POST['login'])){

echo "<ul><li><a href='admin'>Admin</a></li></ul>";
  }
}
?>
 <!-- Blog Login Well -->
    <div class="well">
        <h4>Login</h4>
       <form action="includes/login.php" method= "post">
       <div class="form-group">
        <input name ="user_name" type="text" class="form-control" placeholder="Username">
       </div>
       <div class="form-group">
        <input name ="user_password" type="password" class="form-control" placeholder="Password">
       </div>

       <span class="form-group-btn">
       <button class="btn btn-primary" type="submit" name ="login">Login</button>


       </span>
      </form> <!--search form -->
       <!-- /.input-group -->
    </div>



           <!-- Blog Categories Well -->
              <div class="well">
                   <?php

              $sellect_cat_sidebar = mysqli_query($conn,"SELECT * FROM categories", MYSQLI_USE_RESULT);
               ?>
             <h4>Blog Categories</h4>
         <div class="row">
        <div class="col-lg-6">
           <ul class="list-unstyled">
            <?php
             while($row = mysqli_fetch_assoc($sellect_cat_sidebar)){
                $cat_id = $row ['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

             }
            ?>
            </ul>
          </div>
      </div>
          <!-- /.row -->
         </div>
               <!-- Side Widget Well --> 
                   <?php include 'widget.php'; ?>

 </div>
