<<?php
ob_start();
// all category function
//insert querry categories

function insert_categories (){
    global $conn;
    if (isset($_POST['submit'])){
        $cat_title = mysqli_real_escape_string($conn, $_POST['cat_title']);
 
     if (empty($cat_title)){
         echo "this field should not be empty";
     } else {
         $query  = "INSERT INTO categories(`cat_title`) VALUE ('{$cat_title}')";
         $create_category_query = mysqli_query($conn, $query);
         
         confirm($create_category_query);
     }
       }
}

//find all categories

function findAllCategories(){
global $conn;

$sellect_cat = mysqli_query($conn,"SELECT * FROM categories", MYSQLI_USE_RESULT);
while($row = mysqli_fetch_assoc($sellect_cat)){
   $cat_id = mysqli_real_escape_string($conn, $row['cat_id']);
   $cat_title = mysqli_real_escape_string($conn, $row['cat_title']);
   echo "<tr>";
   ?>
  <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $cat_id ?>'></td>

  <?php
echo "<td>{$cat_id}</td>";
echo "<td><a href='../category.php?category=$cat_id'>{$cat_title}</a></td>";
//"<td><a class='btn btn-warning' href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a  class='btn btn-danger' href='categories.php?edit={$cat_id}'>Edit</a></td>";
}
echo "</tr>";

}

//delete categories query

// function deleteCategories(){
//     global $conn;
//     if(isset($_GET['delete'])){
//         $get_cat_id = $_GET['delete'];
//         $query =  "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
//         $delete_query = mysqli_query($conn, $query);
//         confirm($delete_query);
//         header("Location: categories.php");
//     }

//    }

   // all post function
//insert post query

   function insert_post (){
    global $conn;

    if(isset($_POST['create_post'])){
        $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
        $post_author = mysqli_real_escape_string($conn, $_POST['post_author']);
        $post_category_id = mysqli_real_escape_string($conn, $_POST['post_category_id']);
        $post_status = mysqli_real_escape_string($conn, $_POST['post_status']);
        $post_image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $post_image_temp = mysqli_real_escape_string($conn, $_FILES['image']['tmp_name']);
        $post_tags =  mysqli_real_escape_string($conn,$_POST['post_tags']);
        $post_content =  mysqli_real_escape_string($conn,$_POST['post_content']);
         date ('d-m-y');
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
    
        $query = "INSERT INTO posts( `post_tags`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`)
         VALUES('$post_tags','$post_status',$post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content')";
    
    $create_post_query = mysqli_query($conn, $query);
    

    confirm($create_post_query);
    header("Location:posts.php");
}
    }


//check conection function

function confirm($result){
global $conn;
if(!$result){
    die('QUERY FAILED'. mysqli_error($conn));
}
return $result;
}

//find all posts query

function findAllPosts(){

   global $conn;

   $sellect_posts = mysqli_query($conn,"SELECT * FROM posts ORDER BY post_id DESC ");
   while($row = mysqli_fetch_assoc($sellect_posts)){
   $post_id = mysqli_real_escape_string($conn, $row['post_id']);
   $post_author = mysqli_real_escape_string($conn, $row['post_author']);
   $post_title = mysqli_real_escape_string($conn, $row['post_title']);
   $post_category_id = mysqli_real_escape_string($conn, $row['post_category_id']);
   $post_status = mysqli_real_escape_string($conn, $row['post_status']);
   $post_image = mysqli_real_escape_string($conn, $row['post_image']);
   $post_tags = mysqli_real_escape_string($conn, $row['post_tags']);
   $post_comments = mysqli_real_escape_string($conn, $row['post_comment_count']);
   $post_content = mysqli_real_escape_string($conn, $row['post_content']);
   $post_date = mysqli_real_escape_string($conn, $row['post_date']);  
   $post_view = mysqli_real_escape_string($conn, $row['post_view']);           
  echo "<tr>";
  ?>
  <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $post_id ?>'></td>

  <?php
  echo "<td>{$post_id}</td>";
  echo "<td>{$post_author}</td>";
  echo "<td><a href ='../post.php?p_id_=$post_id'>{$post_title}</a></td>";
  $result =  mysqli_query($conn,"SELECT * FROM categories WHERE cat_id = $post_category_id");
  while($row = mysqli_fetch_assoc($result)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  }echo "<td>{$cat_title}</td>";
  echo "<td>{$post_status}</td>";
  echo "<td><img width = '70' src = '../images/{$post_image}'></td>";
  echo "<td>{$post_tags}</td>";
   $count_comment = mysqli_query($conn, "SELECT * FROM comments WHERE comment_post_id = $post_id");
   $row = mysqli_fetch_array($count_comment);
   $com_id = $row['comment_id'];
   $nr_com = mysqli_num_rows($count_comment);
  echo "<td><a href = 'post_comments.php?id=$post_id'>{$nr_com}</a></td>";
  echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>View content</a></td>";
  echo "<td>{$post_date}</td>";
  echo "<td><a class='btn btn-warning' href='posts.php?source=edit_post&p_id={$post_id}'> Edit </a></td>";
 // echo "<td><a onClick =\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger' href='posts.php?delete={$post_id}'>Delete</a></td>";
  echo "<td><a href='posts.php?reset={$post_id}'>{$post_view}</a></td>"; 
}
echo "</tr>"; 

}



//delete posts query

// function deletePosts(){
//     global $conn;
//     if(isset($_GET['delete'])){
//         $get_post_id = mysqli_real_escape_string($conn, $_GET['delete']);
//         $query1 =  "DELETE FROM posts WHERE post_id = $get_post_id";
//         $delete_query = mysqli_query($conn, $query1);
//         confirm($delete_query);
//         header("Location:posts.php");
//     }

//    }
//function reset post view

function resetPosts(){
    global $conn;
    if(isset($_GET['reset'])){
        $get_post_id = mysqli_real_escape_string($conn, $_GET['reset']);
        $query1 =  "UPDATE posts SET post_view = 0 WHERE post_id = $get_post_id";
        $delete_query = mysqli_query($conn, $query1);
        confirm($delete_query);
        header("Location:posts.php");
    }

   }
   
//all comments query function
// find all comments

function findAllComments(){

    global $conn;
 
    $sellect_comment = mysqli_query($conn,"SELECT * FROM comments");
    while($row = mysqli_fetch_assoc($sellect_comment)){
    $comment_id = mysqli_real_escape_string($conn, $row['comment_id']);
    $comment_post_id = mysqli_real_escape_string($conn, $row['comment_post_id']);
    $comment_author = mysqli_real_escape_string($conn, $row['comment_author']);
    $comment_email = mysqli_real_escape_string($conn, $row['comment_email']);
    $comment_content = mysqli_real_escape_string($conn, $row['comment_content']);
    $comment_status = mysqli_real_escape_string($conn, $row['comment_status']);
    $comment_date = mysqli_real_escape_string($conn, $row['comment_date']);              
   echo "<tr>";
   ?>
   <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $comment_id ?>'></td>
 
   <?php
   echo "<td>{$comment_id}</td>";

$query = "Select * FROM posts where post_id =  $comment_post_id ";
$post_id_query = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($post_id_query)){
$post_id = $row['post_id'];
$post_title = $row['post_title'];
echo "<td><a href ='../post.php?p_id_=$post_id'>{$post_title}</a></td>";
}
   echo "<td>{$comment_author}</td>";
   echo "<td>{$comment_email}</td>";
   echo "<td>{$comment_content}</td>";
   echo "<td>{$comment_status}</td>";
   echo "<td>{$comment_date}</td>";
  // echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>Delete</a></td>";
   echo "</tr>"; 
}
 }
 
 


 //delete comments query function

// function deleteComment(){
//     global $conn;
//     if(isset($_GET['delete'])){
//         $get_comment_id = mysqli_real_escape_string($conn, $_GET['delete']);
//         $query =  "DELETE FROM comments WHERE comment_id = {$get_comment_id}";
//         $delete_query = mysqli_query($conn, $query);
//         header("Location:comments.php");
//     }

//    }

//All users query functions
// Find all users functions
   function findAllUsers(){

    global $conn;
 
    $sellect_users = mysqli_query($conn,"SELECT * FROM users");
    while($row = mysqli_fetch_assoc($sellect_users)){
    $user_id = mysqli_real_escape_string($conn, $row['user_id']);
    $user_name = mysqli_real_escape_string($conn, $row['user_name']);
    $user_password = mysqli_real_escape_string($conn, $row['user_password']);
    $user_first_name = mysqli_real_escape_string($conn, $row['user_first_name']);
    $user_last_name = mysqli_real_escape_string($conn, $row['user_last_name']);
    $user_email = mysqli_real_escape_string($conn, $row['user_email']);
    $user_image = mysqli_real_escape_string($conn, $row['user_image']);
    $user_role = mysqli_real_escape_string($conn, $row['user_role']);
    $randSalt = mysqli_real_escape_string($conn, $row['randSalt']);

              
   echo "<tr>";
   ?>
  <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $user_id ?>'></td>
  <?php
   echo "<td>{$user_id}</td>";
   echo "<td>{$user_name}</td>";
   echo "<td>{$user_first_name}</td>";
   echo "<td>{$user_last_name}</td>";
   echo "<td>{$user_email}</td>";
   echo "<td><img width = '60' src = '../images/{$user_image}'></td>";
   echo "<td>{$user_role}</td>";
   echo "<td><a class='btn btn-warning' href='users.php?source=edit_user&p_id={$user_id}'>Edit User</a></td>";
  // echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete User</a></td>";
 }
 echo "</tr>"; 
 
 }

 function add_user(){
    global $conn;
    if(isset($_POST['add_user'])){
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
        $user_first_name = mysqli_real_escape_string($conn, $_POST['user_first_name']);
        $user_last_name= mysqli_real_escape_string($conn, $_POST['user_last_name']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_image = mysqli_real_escape_string($conn, $_FILES['user_image']['name']);
        $user_image_temp = mysqli_real_escape_string($conn, $_FILES['image']['temp_name']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        move_uploaded_file($user_image_temp, "../images/$user_image");

        $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO `users`( `user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`)
         VALUES ('$user_name','$password','$user_first_name','$user_last_name','$user_email','$user_image','$user_role')";
    
    $create_user_query = mysqli_query($conn, $query);
    

    confirm($create_user_query);
    header("Location:users.php");
}
    }

 

    // function deleteUser(){
    //     global $conn;

    //     if(isset($_GET['delete'])){
    //         if(isset($_SESSION['user_role'])){
    //             if($_SESSION['user_role'] == 'admin')
    //         $get_user_id = mysqli_real_escape_string($conn, $_GET['delete']);
    //         $query =  "DELETE FROM users WHERE user_id = {$get_user_id}";
    //         mysqli_query($conn, $query);
    //        header("Location:index.php");
    //      }
    //     }
    //    }


  function usersOnline(){
    
global $conn;

$session = session_id();
$time= time();
$time_out_in_seconds = 05;
$time_out = $time - $time_out_in_seconds;

$send_query = mysqli_query($conn, "SELECT * FROM users_online WHERE session = '$session'");
$count = mysqli_num_rows($send_query);
if($count == NULL){
    mysqli_query($conn, "INSERT INTO users_online(session, time) VALUES ('$session', '$time')");
}else{
    mysqli_query($conn, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
}

$users_online =  mysqli_query($conn, "SELECT * FROM users_online WHERE time > '$time_out' ");
return $count_users =  mysqli_num_rows($users_online);
    }
    

    function findAllPostComments(){

        global $conn;
     
        $sellect_comment = mysqli_query($conn,"SELECT * FROM comments WHERE comment_post_id =".mysqli_real_escape_string($conn, $_GET['id'])."");
        while($row = mysqli_fetch_assoc($sellect_comment)){
        $comment_id =mysqli_real_escape_string($conn, $row['comment_id']);
        $comment_post_id =mysqli_real_escape_string($conn, $row['comment_post_id']);
        $comment_author = mysqli_real_escape_string($conn,$row['comment_author']);
        $comment_email =mysqli_real_escape_string($conn, $row['comment_email']);
        $comment_content =mysqli_real_escape_string($conn, $row['comment_content']);
        $comment_status =mysqli_real_escape_string($conn, $row['comment_status']);
        $comment_date =mysqli_real_escape_string($conn, $row['comment_date']);              
       echo "<tr>";
       ?>
       <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $comment_id ?>'></td>
       <?php
       echo "<td>{$comment_id}</td>";
    $query = "Select * FROM posts where post_id =  $comment_post_id ";
    $post_id_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($post_id_query)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    echo "<td><a href ='../post.php?p_id_=$post_id'>{$post_title}</a></td>";
    }
       echo "<td>{$comment_author}</td>";
       echo "<td>{$comment_email}</td>";
       echo "<td>{$comment_content}</td>";
       echo "<td>{$comment_status}</td>";
       echo "<td>{$comment_date}</td>";
      // echo "<td><a class='btn btn-danger' href='post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";
       echo "</tr>"; 
    }
     }

     function findAllPostAutors(){ 
        global $conn;
     
        $sellect_comment = mysqli_query($conn,"SELECT * FROM comments WHERE comment_post_id =".mysqli_real_escape_string($conn, $_GET['id'])."");
        while($row = mysqli_fetch_assoc($sellect_comment)){
        $comment_id = mysqli_real_escape_string($conn, $row['comment_id']);
        $comment_post_id = mysqli_real_escape_string($conn, $row['comment_post_id']);
        $comment_author = mysqli_real_escape_string($conn, $row['comment_author']);
        $comment_email = mysqli_real_escape_string($conn, $row['comment_email']);
        $comment_content = mysqli_real_escape_string($conn, $row['comment_content']);
        $comment_status = mysqli_real_escape_string($conn, $row['comment_status']);
        $comment_date = mysqli_real_escape_string($conn, $row['comment_date']);              
       echo "<tr>";
       ?>
       <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value='<?php echo $comment_id ?>'></td>
       <?php
       echo "<td>{$comment_id}</td>";
    $query = "Select * FROM posts where post_id =  $comment_post_id ";
    $post_id_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($post_id_query)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    echo "<td><a href ='../post.php?p_id_=$post_id'>{$post_title}</a></td>";
    }
       echo "<td>{$comment_author}</td>";
       echo "<td>{$comment_email}</td>";
       echo "<td>{$comment_content}</td>";
       echo "<td>{$comment_status}</td>";
       echo "<td>{$comment_date}</td>";
      // echo "<td><a class='btn btn-danger' href='post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";
       echo "</tr>"; 
    }



     }
     ob_end_flush()
  
  ?>




