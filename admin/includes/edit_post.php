<?php
 if(isset($_GET['p_id'])){
    $the_get_post_id = mysqli_real_escape_string($conn, $_GET['p_id']);
 } 
 $sellect_posts_by_id = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $the_get_post_id");
 while($row = mysqli_fetch_assoc($sellect_posts_by_id)){
    $posts_id = mysqli_real_escape_string($conn, $row['post_id']);
    $posts_author = mysqli_real_escape_string($conn,$row['post_author']);
    $posts_title =mysqli_real_escape_string($conn, $row['post_title']);
    $posts_category_id =mysqli_real_escape_string($conn, $row['post_category_id']);
    $posts_status =mysqli_real_escape_string($conn, $row['post_status']);
    $posts_image =mysqli_real_escape_string($conn, $row['post_image']);
    $posts_tags =mysqli_real_escape_string($conn, $row['post_tags']);
    $posts_comments =mysqli_real_escape_string($conn, $row['post_comment_count']);
    $posts_date =mysqli_real_escape_string($conn, $row['post_date']);
    $posts_content =mysqli_real_escape_string($conn, $row['post_content']);
 }
if (isset($_POST['update_post'])){
    $post_title = mysqli_escape_string($conn,  $_POST['post_title']);
    $post_author = mysqli_escape_string($conn, $_POST['post_author']);
    $post_category_id = mysqli_escape_string($conn,$_POST['post_category_id']);
    $post_status = mysqli_escape_string($conn,$_POST['post_status']);
    $post_image = mysqli_escape_string($conn,$_FILES['image']['name']);
    $post_image_temp = mysqli_escape_string($conn,$_FILES['image']['tmp_name']);
    $post_tags = mysqli_escape_string($conn,$_POST['post_tags']);
    $post_content = mysqli_escape_string($conn,$_POST['post_content']);
    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){

   $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
$select_img = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_array($select_img));{
$post_img = $row['post_image'];
   }
    }


    $query = "UPDATE posts SET post_tags ='{$post_tags}',post_status='{$post_status}', post_category_id='{$post_category_id}', post_title='{$post_title}',
    post_author='{$post_author}', post_date= now(), post_image='{$post_image}' ,post_content='{$post_content}' WHERE post_id = {$the_get_post_id}";

$update_post = mysqli_query($conn, $query);

confirm($update_post);
header("Location: posts.php");
}

?>
 

    <h1>Edit Post</h1>
    <form action="" method="post"  id="form" enctype="multipart/form-data">
      <label id ="label" for="post_title">Post title</label>
      <input id ="input_form" value="<?php echo $posts_title; ?>" type="text"  name="post_title" required>

      <label id ="label" for="post_category_id">Edit Category</label>
      <select id ="input_form"  name="post_category_id">
<?php
  $query = "SELECT * FROM categories";
  $select_cat = mysqli_query($conn, $query);
  confirm($select_cat);
  while($row = mysqli_fetch_assoc($select_cat)){
  $cat_id =mysqli_real_escape_string($conn, $row['cat_id']);
  $cat_title =mysqli_real_escape_string($conn, $row['cat_title']);
  var_dump( $cat_title);

  echo "<option value='{$cat_id}'>{$cat_title}</option>";

  }

?>

    </select>

      <label id ="label" for="author">Post Author</label>
      </select>
      <label  id = "label" for="author">Post Author</label>
      <select name="post_author" id="input_form" >
<?php
  $user_query = "SELECT * FROM users";
  $select_users = mysqli_query($conn, $user_query);
  confirm($select_users);
  while($row = mysqli_fetch_assoc($select_users)){
  $user_id =mysqli_real_escape_string($conn, $row['user_id']);
  $user_name =mysqli_real_escape_string($conn, $row['user_name']);
  echo "<option value='{$user_name}'>{$user_name}</option>";

  }

?>
</select>

      <label id ="label" for="post_status">Post Status</label>
      <select id ="input_form" value="<?php echo $posts_status; ?>" type="text"  name="post_status" required>
      <option value="draft">Draft</option>
      <option value="published">Published</option>
      </select>

      <label id ="label" for="post_image">Post Image</label>
      <img  width="100" src="../images/<?php echo $posts_image; ?>" type="file"  name="image" required>

      <label id ="label" for="post_image"></label>
      <input class="form-control-file" value ="<?php echo $posts_image; ?>" type="file"  name="image" required>

      <label id ="label" for="post_tags">Post Tags</label>
      <input id ="input_form" value="<?php echo $posts_tags; ?>" type="text"  name="post_tags" required>

      <label id ="label" for="summernote">Contnet</label>
      <textarea  name = "post_content"  autofocus id ="summernote"><?php echo $posts_content; ?></textarea>
    
      <button type="submit" class="btn btn-success" name = "update_post">Save Post</button>
    </form>