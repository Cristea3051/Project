<?php
if(isset($_POST['checkboxArray'])){
foreach($_POST['checkboxArray'] as $userValueId){

 $bulk_options =mysqli_real_escape_string($conn, $_POST['bulk_options']);

 switch($bulk_options){
case 'admin':
  $query =  "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;

case 'subscriber':
  $query =  "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;

case 'delete':
  $query1 =  "DELETE FROM users WHERE user_id = {$userValueId}";
  $delete_query = mysqli_query($conn, $query1);
  confirm($delete_query);
break;
 }


}
}

?>
<form action="" method="post">
<div id ="bulkOptionsContainer" class="col-xs-2">
  <select class="form-control" name="bulk_options" id="">
<option value="">Select Option</option>
<option value="admin">Admin</option>
<option value="Subscribber">Subscribber</option>
<option value="delete">Delete</option>
  </select>

</div>
<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="users.php?source=add_user">Add New User</a>
</div>
<table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th><input id="selectAllCheckBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>
      
       <tbody>

<?php FindAllUsers();?>

      </tbody>
       </table>
       </form>