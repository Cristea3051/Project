<?php
if(isset($_POST['checkboxArray'])){
foreach($_POST['checkboxArray'] as $postValueId){

 $bulk_options =mysqli_real_escape_string($conn, $_POST['bulk_options']);

 switch($bulk_options){
case 'published':
  $query =  "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;

case 'draft':
  $query =  "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;



case 'delete':
  $query1 =  "DELETE FROM posts WHERE post_id = {$postValueId}";
  $delete_query = mysqli_query($conn, $query1);
  confirm($delete_query);
break;


case 'clone':
$query = "SELECT* FROM posts WHERE post_id = '{$postValueId}'";
$select_post_query = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($select_post_query)){
$post_title = mysqli_real_escape_string($conn, $row['post_title']);
$post_category_id =mysqli_real_escape_string($conn, $row['post_category_id']);
$post_date =mysqli_real_escape_string($conn, $row['post_date']);
$post_author =mysqli_real_escape_string($conn, $row['post_author']);
$post_status =mysqli_real_escape_string($conn, $row['post_status']);
$post_image =mysqli_real_escape_string($conn, $row['post_image']);
$post_tags =mysqli_real_escape_string($conn, $row['post_tags']);
$post_content =mysqli_real_escape_string($conn, $row['post_content']);
}
$query = "INSERT INTO posts( `post_tags`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`)
         VALUES('$post_tags','$post_status',$post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content')";
         $copy_query = mysqli_query($conn, $query);
         confirm($copy_query);
  break;
case 'reset':
$query =  "UPDATE posts SET post_view = 0 WHERE post_id = {$postValueId}";
  $reset_query = mysqli_query($conn, $query);
  confirm($reset_query);
break;
 }

}
}

?>
<form action="" method="post">
<table class="table table-bordered table-hover">
<div id ="bulkOptionsContainer" class="col-xs-2">
  <select class="form-control" name="bulk_options" id="">
<option value="">Select Option</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="clone">Clone</option>
<option value="reset">Reset</option>
<option value="">Reset</option>
<option value="delete">Delete</option>
  </select>

</div>
<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="posts.php?source=add_post">Add New Post</a>
</div>

 <thead class="thead-dark">
   <tr>
                <th><input id="selectAllCheckBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category ID</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Com</th>
                <th>Content</th>
                <th>Date</th>
                <th>Edit</th>
                <th>View</th>
            </tr>
        </thead>
       <tbody>  
<?php findAllPosts();?>
<?php resetPosts();?>
      </tbody>
       </table>
</form>


