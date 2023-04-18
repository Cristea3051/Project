<div class="col-xs-6">
    <form action="" method = "post">
        <div class="form-group">
                    <label for="cat-title">Update Category</label>
                    <?php
                         if(isset($_GET['edit'])){
                         $cat_id = mysqli_real_escape_string($conn,$_GET['edit']);
                         $update_cat = mysqli_query($conn,"SELECT * FROM categories WHERE cat_id = $cat_id");
                         while($row = mysqli_fetch_assoc($update_cat)){
                         $cat_id =mysqli_real_escape_string($conn, $row['cat_id']);
                         $cat_title =mysqli_real_escape_string($conn, $row['cat_title']);
                         ?>
                         <input value="<?php if(isset($cat_title)){echo $cat_title; } ?>" type="text"  class = "form-control" name="cat_title">
         </div>
                         <?php  } }  ?>

                         <?php //update category query
                         if(isset($_POST['update_category'])){
                         $post_cat_title =mysqli_real_escape_string($conn, $_POST['cat_title']);
                         $query =  "UPDATE categories SET  cat_title = '{$post_cat_title}' WHERE cat_id = {$cat_id}";
                         $update_query = mysqli_query($conn, $query);
                         if(!$update_query){
                          die('QUERY FAILED'. mysqli_error($conn));
                         }
                         }
                         ?>   
                  
                
                         <div class="form-group">
                         <input class="btn btn-danger" type="submit" name="update_category" value="Update Category">
                         </div>
    </form>
</div>