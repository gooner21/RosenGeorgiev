<?php

class comment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function comment_insert($postdata) {

        $this->db->insert('comment', $postdata);
    }
}

