<?php
 
 if(isset($_GET['p_id'])){
    $the_get_post_id =  $_GET['p_id'];
 }
 $sellect_posts_by_id = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $the_get_post_id");
 while($row = mysqli_fetch_assoc($sellect_posts_by_id)){
    $posts_id = $row['post_id'];
    $posts_author = $row['post_author'];
    $posts_title = $row['post_title'];
    $posts_category_id = $row['post_category_id'];
    $posts_status = $row['post_status'];
    $posts_image = $row['post_image'];
    $posts_tags = $row['post_tags'];
    $posts_comments = $row['post_comment_count'];
    $posts_date = $row['post_date'];
    $posts_content = $row['post_content'];
 }
if (isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){

   $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
$select_img = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_array($select_img));{
$post_img = $row['post_image'];
   }
    }


    $query = "UPDATE posts SET post_tags ='{$post_tags}', post_comment_count='{$post_comment_count}',post_status='{$post_status}', post_category_id='{$post_category_id}', post_title='{$post_title}',
    post_author='{$post_author}', post_date= now(), post_image='{$post_image}' ,post_content='{$post_content}' WHERE post_id = {$the_get_post_id}";

$update_post = mysqli_query($conn, $query);

confirm($update_post);
header("Location: posts.php");
}

?>
 

<style>
      /* Stilizare formă */
      form {
        max-width: 500px;
       /* margin: 0 auto; */
      }
      label {
        display: block;
        margin-top: 10px;
      }
      option,
      input[type="text"],
      textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 5px;
        font-size: 16px;
      }
     
      button[type="submit"] {
        background-color:#45a049;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        transition: all 0.7s ease 0s;
      }
      button[type="submit"]:hover {
        background-color: #52c539;
      }
    </style>


    <h1>Edit Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="post_title">Post title</label>
      <input value="<?php echo $posts_title; ?>" type="text"  name="post_title" required>

      <label for="post_category_id">Edit Category</label>
      <select class = "form-select form-select-lg mb-3" name="post_category_id" id="post_category_id">
<?php
  $query = "SELECT * FROM categories";
  $select_cat = mysqli_query($conn, $query);
  confirm($select_cat);
  while($row = mysqli_fetch_assoc($select_cat)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  var_dump( $cat_title);

  echo "<option value='{$cat_id}'>{$cat_title}</option>";

  }

?>

    </select>

      <label for="author">Post Author</label>
      <input value="<?php echo $posts_author; ?>" type="text"  name="post_author" required>

      <label for="post_status">Post Status</label>
      <input value="<?php echo $posts_status; ?>" type="text"  name="post_status" required>

      <label for="post_image">Post Image</label>
      <img width="100" src="../images/<?php echo $posts_image; ?>" type="file"  name="image" required>

      <label for="post_image"></label>
      <input value ="<?php echo $posts_image; ?>" type="file"  name="image" required>

      <label for="post_tags">Post Coments</label>
      <input value="<?php echo $posts_comments; ?>" type="text"  name="post_comment" required>

      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $posts_tags; ?>" type="text"  name="post_tags" required>

      <label for="post_content">Contnet</label>
      <textarea name = "post_content"   rows="20"><?php echo $posts_content;?></textarea>
    
      <button type="submit" name = "update_post">Save Post</button>
    </form>
    
    
    
    
   