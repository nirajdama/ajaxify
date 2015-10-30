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
            $this->view_lib->load_view('content/content1', null, 'content1');
        }
    }

    function c2() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/content2');
        } else {
            $this->view_lib->load_view('content/content2', null, 'content2');
        }
    }

    function c3() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/content3', 'content3');
        } else {
            $this->view_lib->load_view('content/content3', null, 'content3');
        }
    }

    function form1() {
        $this->load->library('view_lib');
        if ($this->input->is_ajax_request()) {
            $this->load->view('content/form1', 'form1');
        } else {
            $this->view_lib->load_view('content/form1', null, 'form1');
        }
    }

    function submitform1() {
        $this->form_validation->set_rules('input-txtfield', 'Textfield', 'trim|required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('input-textarea', 'Textarea', 'trim|required|xss_clean|max_length[1024]');
        $this->form_validation->set_rules('input-radio', 'Radio', 'trim|required|xss_clean');
        $this->form_validation->set_rules('input-checkbox[]', 'Checkbox', 'trim');

        $successurl = base_url('welcome/form1');
        if ($this->form_validation->run() == false) {
            $res['error'] = true;
            $res['display_errors']['input-txtfield-error'] = form_error('input-txtfield');
            $res['display_errors']['input-textarea-error'] = form_error('input-textarea');
            $res['display_errors']['input-radio-error'] = form_error('input-radio');
            $res['display_errors']['input-checkbox-error'] = form_error('input-checkbox');
        } else {
            $res['error'] = false;
            $res['s_title'] = "STitle";
            $res['s_text'] = "Form submitted successfully";
            $res['eval_script'] = "load_view('#my-content', 'content1', '" . $successurl . "');";
        }

        if ($this->input->is_ajax_request()) {
            echo json_encode($res);
        } else {
            if ($res['error'] == true) {
                $this->res = $res;
                $this->view_maintenance_head($society_id, $head_id);
            } else {
                $this->session->set_flashdata('success_message', $res['s_text']);
                redirect($successurl);
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */