<?php add_user();?>

    <h1>Add User</h1>
    <form action="" method="post" id="form" enctype="multipart/form-data">
      <label id ="label" for="user_name">User Name</label>
      <input type="text" id="input_form" name="user_name" required>

      <label id ="label" for="user_password">Password</label>
      <input type="password" id="input_form"name="user_password" required>

      <label id ="label" for="user_first_name">First Name</label>
      <input type="text" id="input_form" name="user_first_name" required>
     
      <label id ="label" for="user_last_name">last Name</label>
      <input type="text" id="input_form" name="user_last_name" required>

      <label id ="label" for="user_email">User Email</label>
      <input type="email" id="input_form" name="user_email" required>

      <label id ="label" for="user_image">User Image</label>
      <input type="file" id="select-file"  name="user_image" required>
      
      <label id ="label" for="user_role">User Role</label>
      <select type="text" id="input_form"name = "user_role" required>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
     
      <button type="submit"  class="btn btn-success"  name = "add_user">Add User</button>
    </form>