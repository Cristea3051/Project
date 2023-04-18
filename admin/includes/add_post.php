<?php insert_post ();?>


    <h1>Add Post</h1>
    <form action="" method="post" id="form" enctype="multipart/form-data">
      <label  id = "label" for="post_title">Post title</label>
      <input type="text" id="input_form"  name="post_title" required>

      <label  id = "label" for="post_category_id">Edit Category</label>
      <select name="post_category_id" id="input_form" >
<?php
  $query = "SELECT * FROM categories";
  $select_cat = mysqli_query($conn, $query);
  confirm($select_cat);
  while($row = mysqli_fetch_assoc($select_cat)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  echo "<option value='{$cat_id}'>{$cat_title}</option>";

  }

?>
</select>
      <label  id = "label" for="author">Post Author</label>
      <select name="post_author" id="input_form" >
<?php
  $user_query = "SELECT * FROM users";
  $select_users = mysqli_query($conn, $user_query);
  confirm($select_users);
  while($row = mysqli_fetch_assoc($select_users)){
  $user_id = $row['user_id'];
  $user_name = $row['user_name'];
  echo "<option value='{$user_name}'>{$user_name}</option>";

  }

?>
</select>

      <label  id = "label" for="post_status">Post Status</label>
      <select type="text"  id="input_form" name="post_status" required>
      <option value="draft">Draft</option>
      <option value="published">Published</option>
      </select>

      <label  id = "label" for="post_image">Post Image</label>
      <input type="file" class="form-control-file" name="image" required>

      <label  id = "label" for="post_tags">Post Tags</label>
      <input type="text" id="input_form" name="post_tags" required>
      </div>
      <label  id = "label" for="summernote">Contnet</label>
      <textarea name = "post_content"  width: 700px rows="8" autofocus id ="summernote"></textarea>

      <button type="submit" class ="btn btn-success" name="create_post">Publish Post</button>
    </form>