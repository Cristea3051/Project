<<?php
// all category function
//insert querry categories

function insert_categories (){
    global $conn;
    if (isset($_POST['submit'])){
        $cat_title =  $_POST['cat_title'];
 
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
   $cat_id = $row['cat_id'];
   $cat_title = $row['cat_title'];
   echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td><a href='#'>{$cat_title}</a></td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
}
echo "</tr>";

}

//delete categories query

function deleteCategories(){
    global $conn;
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];
        $query =  "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
        $delete_query = mysqli_query($conn, $query);
        confirm($delete_query);
        header("Location: categories.php");
    }

   }

   // all post function
//insert post query

   function insert_post (){
    global $conn;

    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date ('d-m-y');
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
    
        $query = "INSERT INTO posts( `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`)
         VALUES('{$post_tags}','{$post_comment_count}','{$post_status}',{$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}')";
    
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

   $sellect_posts = mysqli_query($conn,"SELECT * FROM posts");
   while($row = mysqli_fetch_assoc($sellect_posts)){
   $post_id = $row['post_id'];
   $post_author = $row['post_author'];
   $post_title = $row['post_title'];
   $post_category_id = $row['post_category_id'];
   $post_status = $row['post_status'];
   $post_image = $row['post_image'];
   $post_tags = $row['post_tags'];
   $post_comments = $row['post_comment_count'];
   $post_content = $row['post_content'];
   $post_date = $row['post_date'];              
  echo "<tr>";
  echo "<td>{$post_id}</td>";
  echo "<td>{$post_author}</td>";
  echo "<td>{$post_title}</td>";
  $result =  mysqli_query($conn,"SELECT * FROM categories WHERE cat_id = $post_category_id");
  while($row = mysqli_fetch_assoc($result)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  
  echo "<td>{$cat_title}</td>";
  }
  
  echo "<td>{$post_status}</td>";
  echo "<td><img width = '100' src = '../images/{$post_image}'></td>";
  echo "<td>{$post_tags}</td>";
  echo "<td>{$post_comments}</td>";
  echo "<td>{$post_content}</td>";
  echo "<td>{$post_date}</td>";
  echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
  echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
}
echo "</tr>"; 

}

//edit post function query





//delete posts query

function deletePosts(){
    global $conn;
    if(isset($_GET['delete'])){
        $get_post_id = $_GET['delete'];
        $query =  "DELETE FROM posts WHERE post_id = {$get_post_id}";
        $delete_query = mysqli_query($conn, $query);
        confirm($delete_query);
        header("Location:posts.php");
    }

   }
//function dump(){

//}
   
//all comments query function
// find all comments

function findAllComments(){

    global $conn;
 
    $sellect_comment = mysqli_query($conn,"SELECT * FROM comments");
    while($row = mysqli_fetch_assoc($sellect_comment)){
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];              
   echo "<tr>";
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
   echo "<td><a href='comments.php?de={$comment_id}'>Approve</a></td>";
   echo "<td><a href='comments.php?delete={$comment_id}'>Unapprove</a></td>";
   echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
}
 }
 echo "</tr>"; 
 


 //delete comments query function

function deleteComment(){
    global $conn;
    if(isset($_GET['delete'])){
        $get_comment_id = $_GET['delete'];
        $query =  "DELETE FROM comments WHERE comment_id = {$get_comment_id}";
        $delete_query = mysqli_query($conn, $query);
        header("Location:comments.php");
    }

   }

?>




