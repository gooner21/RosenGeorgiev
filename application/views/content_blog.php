<div id="content">
    <center> <h2>My Blog</h2>  <a name="fb_share" type="box_count" href="http://www.facebook.com/sharer.php"></a>
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th><h3>Image</h3></th>
                    <th><h3>Title</h3></th>
                    <th><h3>Author</h3></th>
                    <th><h3>Date</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><img src="<?php echo base_url("/images/thumb_" . $row['image']); ?>" />
                        <td> <?php echo $row['title']; ?>
                        </td>
                        <td> <?php echo $row['author']; ?>
                        </td>
                        <td> <?php echo $row['date']; ?>
                        </td>
                        <td> <a href="<?php echo site_url('blog/article/' . $row['id']) ?>"><button type="button" class="btn btn-default">Read More</button></a></td>
                        <td> <a href="<?php echo site_url('blog/add_comment/' . $row['id']) ?>"><button type="button" class="btn btn-default">comment</button></a></td>
                        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']== 1) { ?>
                            <td> <a href="<?php echo site_url('blog/delete/' . $row['id']) ?>"><button type="button" class="btn btn-primary">Delete</button></a></td>
                            <td> <a href="<?php echo site_url('blog/edit_article/' . $row['id']) ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
                        <?php } ?>
                        <td></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php echo $paginglinks; ?>
</div>