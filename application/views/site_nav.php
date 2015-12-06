<body>

</div>
<div>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url(); ?>blog">Blog</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>user/login">SingIn</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>user/register">Register</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>blog/add_post">Create Post</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>site/contact">Contact</a></li>
            <?php
            if (isset($_SESSION["logged_in"]) == true){ ?>
                        <li class="active"><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
            <?php } ?>
        </ul>
</div>
</div>
</nav>	 
</ul>
</div>