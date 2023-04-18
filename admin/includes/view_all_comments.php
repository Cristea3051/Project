<?php
if(isset($_POST['checkboxArray'])){
foreach ($_POST['checkboxArray'] as $commentValueId){

 $bulk_options =mysqli_real_escape_string($conn, $_POST['bulk_options']);

 switch($bulk_options){
case 'approved':
  $query =  "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$commentValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;

case 'unapproved':
  $query =  "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$commentValueId}";
  $public= mysqli_query($conn, $query);
  confirm($public);
break;

case 'delete':
  $query1 =  "DELETE FROM comments WHERE comment_id = {$commentValueId}";
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
<option value="approved">approved</option>
<option value="unapproved">unapproved</option>
<option value="delete">Delete</option>
  </select>

</div>
<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">
</div>
<table class="table table-bordered table-hover">
        <thead >
            <tr>
                <th><input id="selectAllCheckBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>In response to</th>
                <th>Author</th>
                <th>Email</th>
                <th>Content</th>
                <th>Status</th>
                <th>Date</th>
                
            </tr>
        </thead>
      
       <tbody>
        <?php findAllComments() ?>
      </tbody>
       </table>