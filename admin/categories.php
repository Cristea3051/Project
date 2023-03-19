<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
         <div class="col-lg-12">
         <h1 class="page-header">
          Welcome to admin page!
         <small>Author</small>  </h1>

         <!-- add category form -->   

        <div class="col-xs-6">
             <?php insert_categories ();  ?>
            <form action="" method = "post">
                <div class="form-group">
                    <label for="cat-title">Add Category</label>
                    <input type="text"  class = "form-control" name="cat_title">
                </div>
                <div class="form-group">
               <input class="btn btn-danger" type="submit" name="submit" value="Add Category">
                </div>
            </form>
        </div>
          <?php   if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            include "includes/update_categories.php"; }
           ?>
        <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Title</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php findAllCategories();  ?>
        <?php  deleteCategories();   ?>
        </tr>
    </tbody>
      </table>
       </div>
       </div> 
    </div>
</div>
 <?php include "includes/admin_footer.php"; ?>



