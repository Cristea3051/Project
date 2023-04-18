<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>


<?php
if(isset($_POST['checkboxArray'])){
foreach($_POST['checkboxArray'] as $postValueId){

 $bulk_options =mysqli_real_escape_string($conn, $_POST['bulk_options']);

 switch($bulk_options){

case 'delete':
  $query1 =  "DELETE FROM categories WHERE cat_id = {$postValueId}";
  $delete_query = mysqli_query($conn, $query1);
  confirm($delete_query);
break;
 }
}
}
?>

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
                 <form action="" method="post">
                 <table class="table table-bordered table-hover">
                 <div id ="bulkOptionsContainer" class="col-xs-2">
                 <select class="form-control" name="bulk_options" id="">
                 <option value="">Select Option</option>
                 <option value="delete">Delete</option>
                 </select>
                 </div>
                 <div class="col-xs-4">
                 <input type="submit" name="submit" class="btn btn-success" value="Apply">
                 </div>
                 </form>
          <?php   if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            include "includes/update_categories.php"; }
           ?>
        <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input id="selectAllCheckBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Category Title</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php findAllCategories();?>
        </tr>
    </tbody>
      </table>
       </div>
       </div> 
    </div>
</div>
 <?php include "includes/admin_footer.php"; ?>



