<?php include "db.php"; ?>
<?php  session_start(); ?>

<?php
if (isset($_POST['login'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

   $user_name = mysqli_escape_string($conn, $user_name);
   $user_password= mysqli_escape_string($conn, $user_password);

   $query  = "SELECT * FROM users WHERE user_name = '{$user_name}'";

   $select_user_query= mysqli_query($conn ,$query);

if(!$select_user_query){
    die('QUERY FAILED'. mysqli_error($conn));
}

while($row = mysqli_fetch_array($select_user_query)){
    $db_user_id = $row['user_id'];
    $db_user_name = $row['user_name'];
    $db_user_password = $row['user_password'];
    $db_user_first_name = $row['user_first_name'];
    $db_user_last_name = $row['user_last_name'];
    $db_user_role = $row['user_role'];
    
}
//$user_password = crypt($user_password, $db_user_password);



if (password_verify($user_password, $db_user_password)){

    $_SESSION['user_name'] = $db_user_name;
    $_SESSION['first_name'] = $db_user_first_name;
    $_SESSION['last_name'] = $db_user_last_name;
    $_SESSION['user_role'] = $db_user_role; 
    header ("Location: ../admin");
}else {
    header ("Location: ../index.php");
}

}

?>