<?php
 if(isset($_GET['p_id'])){
    $the_get_user_id =  $_GET['p_id'];
 }
 $sellect_users_by_id = mysqli_query($conn,"SELECT * FROM users WHERE user_id = $the_get_user_id");
 while($row = mysqli_fetch_assoc($sellect_users_by_id)){
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_first_name = $row['user_first_name'];
    $user_last_name = $row['user_last_name'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
 }
if (isset($_POST['edit_user'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];

    $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
     
    if(!empty($user_password)){
      $get_user_pass = mysqli_query($conn, "SELECT user_password FROM users WHERE user_id = $the_get_user_id");
      confirm($get_user_pass);
      $row = mysqli_fetch_array($get_user_pass);
      $db_user_pass = $row['user_password'];
      if($db_user_pass != $user_password){
      $hash_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    }
    

    
   
    move_uploaded_file($user_image_temp, "../images/$user_image");
    if(empty($user_image)){
   $query = "SELECT * FROM users WHERE user_id = $the_get_user_id";
   $select_img = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_array($select_img));{
   $user_img = $row['user_image'];
   }
    }

    $query = "UPDATE users SET user_name ='{$user_name}',user_password='{$hash_password}', user_first_name='{$user_first_name}', user_last_name='{$user_last_name}',
    user_email='{$user_email}', user_image='{$user_image}' ,user_role='{$user_role}' WHERE user_id = {$the_get_user_id}";

$update_user = mysqli_query($conn, $query);

confirm($update_user);
header("Location: users.php");
}
}

?>
 
    <h1>Edit User</h1>
    <form action="" method="post" id="form" enctype="multipart/form-data">
      <label id="label"  for="user_name">User Name</label>
      <input id ="input_form" value="<?php echo $user_name; ?>" type="text"  name="user_name" required>

      <label id="label"  for="user_password">Password</label>
      <input autocomplete="off" id ="input_form"  type="password" name="user_password" required>

      <label id="label" for="user_first_name">First Name</label>
      <input id ="input_form" value="<?php echo $user_first_name; ?>" type="text"  name="user_first_name" required>

      <label id="label" for="user_last_name">last Name</label>
      <input id ="input_form" value="<?php echo $user_last_name; ?>" type="text"  name="user_last_name" required>

      <label id="label" for="user_email">User Email</label>
      <input id ="input_form" value="<?php echo $user_email; ?>" type="email"  name="user_email" required>

      <label id="label" for="user_image">User image</label>
      <img id ="img"   src="../images/<?php echo $user_image; ?>" type="file"  name="user_image" required>
      
      <input id="select-flie" width="100" src="../images/<?php echo $user_image; ?>" type="file"  name="user_image" required>

      <label id="label" for="user_role">User Role</label>
      <select id ="input_form" type="text" name = "user_role" required>
      <option  value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
      <?php
if($user_role == 'admin' ){
   echo "<option value='subscriber'>Subscriber</option>";
}else{
   echo "<option value='admin'>Admin</option>";
}

?>
      
      </select>

      <button class="btn btn-success" type="submit" name = "edit_user">Edit User</button>
    </form>