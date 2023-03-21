<table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category ID</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Content</th>
                <th>Date</th>
                <th><a href="posts.php?source=add_post">Add Post</a></th>
            </tr>
        </thead>
      
       <tbody>
        
<?php findAllPosts();?>
<?php deletePosts();?>

      </tbody>
       </table>