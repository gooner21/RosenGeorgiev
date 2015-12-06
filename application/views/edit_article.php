<div id="content">
<h2>Edit Article</h2> 
<form method="post"   enctype="multipart/form-data" role="form" action="<?php echo $action;?>">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo $data->title;?>"></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author" value="<?php echo $data->author;?>"></td>
        </tr>
        <tr>
            <td>Post Message</td>
            <td><textarea name="postMessage" cols="50" rows="10"><?php echo $data->postMessage;?></textarea></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>
</div>

