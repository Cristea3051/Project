<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>
<?php
if(isset($_SESSION['user_name'])){
    $profile_user_name =  $_SESSION['user_name'];
}
$sellect_users_by_name = mysqli_query($conn,"SELECT * FROM users WHERE user_name = '{$profile_user_name}'");
while($row = mysqli_fetch_array($sellect_users_by_name)){
   $user_id = $row['user_id'];
   $user_name = $row['user_name'];
   $user_first_name = $row['user_first_name'];
   $user_last_name = $row['user_last_name'];
   $user_email = $row['user_email'];
   $user_image = $row['user_image'];
}
if (isset($_POST['edit_user'])){
   $user_name = $_POST['user_name'];
   $user_first_name = $_POST['user_first_name'];
   $user_last_name = $_POST['user_last_name'];
   $user_email = $_POST['user_email'];
   $user_image = $_FILES['user_image']['name'];
   $user_image_temp = $_FILES['user_image']['tmp_name'];

   move_uploaded_file($user_image_temp, "../images/$user_image");
   if(empty($user_image)){
  $query = "SELECT * FROM users WHERE user_name = '{$profile_user_name}'";
  $select_img = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($select_img));{
  $user_img = $row['user_image'];
  }
   }
   $query = "UPDATE users SET user_image='{$user_image}', user_first_name='{$user_first_name}', user_last_name='{$user_last_name}',
   user_email='{$user_email}' WHERE user_name = '{$profile_user_name}'";
$update_user = mysqli_query($conn, $query);
confirm($update_user);
header("Location: profile.php");
}

?>
   <div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div id = "profile-info" class="row">
         <div class="col-lg-12">
         <h1 class="page-header">
          Welcome to profile page <?php echo $_SESSION['user_name']?>!</h1>
          <h1>Edit User</h1>
     <form id ="form" action=""  method="post" enctype="multipart/form-data">

      <img class= "profile-img" src="../images/<?php echo $user_image; ?>" type="file"  name="user_image"required>
     
      <label id ="label"  for="user_image">User Image</label>
      <input id="input_form" width="100" src="../images/<?php echo $user_image; ?>" type="file"  name="user_image"required>

      <label id ="label"  for="user_first_name">First Name</label>
      <input id="input_form" value="<?php echo $user_first_name; ?>" type="text"  name="user_first_name" required>

      <label id ="label"  for="user_last_name">last Name</label>
      <input id="input_form" value="<?php echo $user_last_name; ?>" type="text"  name="user_last_name" required>

      <label id ="label"  for="user_email">User Email</label>
      <input id="input_form" value="<?php echo $user_email; ?>" type="email"  name="user_email" required>

      <button class="btn btn-success" type="submit" name = "edit_user">Update Profile</button>
    </form>
       </div>
       </div> 
    </div>
</div>

   
 <?php include "includes/admin_footer.php"; ?>
