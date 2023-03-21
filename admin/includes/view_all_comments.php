<table class="table table-bordered table-hover">
        <thead >
            <tr>
                <th>Id</th>
                <th>In response to</th>
                <th>Author</th>
                <th>Email</th>
                <th>Content</th>
                <th>Status</th>
                <th>Date</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
      
       <tbody>
        <?php findAllComments() ?>
        <?php deleteComment() ?>
      </tbody>
       </table>