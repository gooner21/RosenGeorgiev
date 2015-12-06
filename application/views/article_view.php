<div id=content>
    <img src="<?php echo base_url("/images/". $row->image); ?>" />
    <br/>
    <?php     echo 'Title: '; echo $row->title . '<br/>'; ?>
    <?php
    echo 'Author: ';
    echo $row->author . '<br/>';
    echo 'Content: ';
    echo $row->postMessage . '<br/>';
    echo 'Date: ';
    echo $row->date . '<br/>';
    echo 'Views: ';
    echo $row->views . '<br>';
    ?>
</div>