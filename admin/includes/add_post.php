<?php insert_post ();?>

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
    <h1>Add Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="post_title">Post title</label>
      <input type="text"  name="post_title" required>

      <label for="post_category_id">Edit Category</label>
      <select name="post_category_id" id="">
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
      <input type="text"  name="post_author" required>

      <label for="post_status">Post Status</label>
      <input type="text"  name="post_status" required>

      <label for="post_image">Post Image</label>
      <input type="file"  name="image" required>

      <label for="post_tags">Post Tags</label>
      <input type="text"  name="post_tags" required>

      <label for="post_content">Contnet</label>
      <textarea name = "post_content"  rows="20" autofocus></textarea>

      <button type="submit" name = "create_post">Publish Post</button>
    </form>