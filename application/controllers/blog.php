<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function index() {
        $this->posts();
    }

    public function posts($offset = 0) {
        $this->load->model('blog_model');
        $this->load->library('pagination');
        $per_page = 4;
        $data['result'] = $this->blog_model->get_items($per_page, $offset);
        $config = array();
        $config['total_rows'] = $this->blog_model->count_items();
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url() . '/blog/posts/';
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $this->pagination->initialize($config);
        $data['paginglinks'] = $this->pagination->create_links();
        $data["message"] = "";
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_blog", $data);
        $this->load->view("site_footer");
    }

    public function add_post() {
        $data["message"] = "";
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_post", $data);
        $this->load->view("site_footer");
    }

    public function send_post() {
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->model("blog_model");
        $this->form_validation->set_rules("title", "Title", "required|alpha");
        $this->form_validation->set_rules("author", "Author", "required|alpha");
        $this->form_validation->set_rules("postMessage", "PostMessage", "required|trim");
        //$this->form_validation->set_rules("image", "Image", "required|callback__validate_image");
        if ($this->form_validation->run() && $this->_validate_image()) {
            $postdata = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'postMessage' => $this->input->post('postMessage'),
                'image' => $this->upload->data('file_name'),
                'date' => date("Y-m-d H:i:s")
            );
            $this->blog_model->form_insert($postdata);
            $data['message'] = 'Data Inserted Successfully<br/>';
        } else {
            $data["message"] = "Please type a valid data!";
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_post", $data);
            $this->load->view("site_footer");
        }
    }

    function _validate_image() {
        $image_config = array(
            'allowed_types' => 'jpg|png|jpeg|bmp',
            'upload_path' => './images/'
        );
        $this->load->library('upload', $image_config);
        if ($this->upload->do_upload('image')) {
            $data = $this->upload->data();
            $this->load->library('image_lib');
            $resize = array(
                'image_library' => 'gd2',
                'source_image' => $data['full_path'],
                'maintain_ratio' => true,
                'max_size' => '2048',
                'remove_spaces' => TRUE,
                'width' => 100,
                'height' => 100,
                'new_image' => './images/' . 'thumb_' . $data['file_name']
            );
            $this->image_lib->initialize($resize);
            if ($this->image_lib->resize()) {
                $data["message"] = "Upload is done!";
                $this->load->view("site_header");
                $this->load->view("site_nav");
                $this->load->view("content_post", $data);
                $this->load->view("site_footer");
            } else {
                echo $this->image_lib->display_errors();
            }
            return true;
        } else {
            $this->form_validation->set_message('_validate_image', $this->upload->display_errors());
            return false;
        }
    }

    function article($id) {
        $this->load->model('blog_model');
        $article['row'] = $this->blog_model->show($id);
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view('article_view', $article);
        $this->load->view("site_footer");
    }

    function delete($id) {
        if (isset($_SESSION["is_admin"]) == 1) {
            $this->load->model('blog_model');
            $this->blog_model->delete($id);
            $this->posts();
        }
    }

    function edit_article($id = "") {
        if (isset($_SESSION["is_admin"]) && $_SESSION['is_admin']== 1) {
            $this->load->model('blog_model');
            
            $data = array(
                "action" => base_url('blog/update_article/' . $id),
                "data" => $this->blog_model->show($id),
            );
            
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view('edit_article', $data);
            $this->load->view('site_footer');
        }
    }

    function update_article($id) {
        $data = array(
            "title" => $this->input->post('title'),
            "author" => $this->input->post('author'),
            "postMessage" => $this->input->post('postMessage')
        );
        $this->load->model('blog_model');
        $this->blog_model->form_update($data, $id);
        redirect('/');
    }
public function add_comment() {
        $data["message"] = "";
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("comment_view", $data);
        $this->load->view("site_footer");
    }

    public function send_comment() {
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->model("comment_model");
        $this->form_validation->set_rules("name", "name", "required|alpha");
        $this->form_validation->set_rules("comments", "comments", "required|trim");
        //$this->form_validation->set_rules("image", "Image", "required|callback__validate_image");
        if ($this->form_validation->run() ) {
            $postdata = array(
                'name' => $this->input->post('name'),
                
                'comments' => $this->input->post('comments'),
               
                
            );
            
            $this->comment_model->comment_insert($postdata);
            $data['message'] = 'Data Inserted Successfully<br/>';
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("comment_view", $data);
            $this->load->view("site_footer");
        } else {
            $data["message"] = "Please type a valid data!";
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("comment_view", $data);
            $this->load->view("site_footer");
        }
    }
}
