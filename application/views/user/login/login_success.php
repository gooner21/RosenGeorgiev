<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Login success!</h1>
            </div>
            <p>You are now logged in.</p>
            <?php
            if (isset($_SESSION['logged_in'])== true) {
                redirect('http://localhost/ci/blog');
            }
            ?>
        </div>
    </div><!-- .row -->
</div><!-- .container -->