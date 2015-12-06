<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        $this->contact();
    }

    public function contact() {
        $data["message"] = "";
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->model("site_model");
        $this->load->library('mathcaptcha');
        $this->mathcaptcha->init();

        $data['math_captcha_question'] = $this->mathcaptcha->get_question();

        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_contact", $data);
        $this->load->view("site_footer");
    }

    public function send_email() {
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->model("site_model");
        $this->load->library('mathcaptcha');

        $this->mathcaptcha->init();

        $this->form_validation->set_rules("fullName", "Full Name", "required|alpha");
        $this->form_validation->set_rules("email", "Email Address", "required|valid_email");
        $this->form_validation->set_rules("message", "Message", "required");
        $this->form_validation->set_rules('math_captcha', 'Math CAPTCHA', 'required|callback__check_math_captcha');
        
        $bValid = $this->form_validation->run();        
        $data['math_captcha_question'] = $this->mathcaptcha->get_question();

        if ($bValid == FALSE) {
            $data["message"] = "";
            
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_contact", $data);
            $this->load->view("site_footer");
        } else {
            $postdata = array(
                'fullName' => $this->input->post('fullName'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message')
            );
            $this->site_model->form_insert($postdata);
            $data['message'] = 'Data Inserted Successfully<br/>';
            $data["message"] .= "Email SEND!";
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'codeprci@gmail.com', // change it to yours
                'smtp_pass' => 'codeigniter6', // change it to yours
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n",
                'wordwrap' => TRUE,
            );
            $this->load->library("email", $config);
            $this->email->from("codeprci@gmail.com");
            $this->email->to("codeprci@gmail.com");
            $this->email->subject("Message from form");
            $this->email->message(set_value("message"));
            $this->email->send();
            echo $this->email->print_debugger();

            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_contact", $data);
            $this->load->view("site_footer");
        }
    }

    function _check_math_captcha($str) {
        $this->load->library("form_validation");
        $this->load->library("session");
        if ($this->mathcaptcha->check_answer($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('_check_math_captcha', 'Enter a valid math captcha response.');
            return FALSE;
        }
    }

}
