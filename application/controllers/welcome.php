<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('view_lib');
    }

    public function index() {
        $this->load->view('index_view');
    }

    function c1() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/content1');
        } else {
            $this->view_lib->load_view('content/content1');
        }
    }

    function c2() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/content2');
        } else {
            $this->view_lib->load_view('content/content2');
        }
    }

    function c3() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/content3');
        } else {
            $this->view_lib->load_view('content/content3');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */