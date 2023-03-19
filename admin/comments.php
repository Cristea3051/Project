<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
         <div class="col-lg-12">
         <h1 class="page-header">
          Welcome to admin page!
         <small>Author</small>  </h1>

<?php
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else {
    $source = '';

}

switch($source) {
    
    case 'comments';
    include "includes/comments.php";
    break;

    default:
    include "includes/view_all_comments.php";
    break;

}

?>

       </div>
       </div> 
    </div>
</div>
 <?php include "includes/admin_footer.php"; ?>
