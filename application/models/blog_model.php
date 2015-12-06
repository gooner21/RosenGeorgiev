<?php

class blog_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function form_insert($postdata) {

        $this->db->insert('article', $postdata);
    }
    
    function form_update($postdata, $id){
        $this->db->update('article', $postdata, array('id' => $id));
        
    }

    function views($id) {
        $result = $this->db->get_where('article', array('id' => $id))->row();
        $result->views++;
        $this->db->query("UPDATE `article` SET `views`= $result->views WHERE id = $id");
    }

    function delete($id) {
        $this->db->query("DELETE FROM `article` WHERE `id`= $id");
    }

    function show($id) {
        $this->views($id);
        $result = $this->db->get_where('article', array('id' => $id))->row();
        return $result;
    }

    function count_items() {
        return $this->db->count_all('article');
    }

    function get_items($limit, $offset) {
        $data = array();
        $this->db->limit($limit, $offset);
        $Q = $this->db->get('article');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        
        return $data;
    }
}

?>