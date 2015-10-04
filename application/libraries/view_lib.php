<?php

class View_lib {

    function load_view($view, $data = null, $title = "") {
        $CI = & get_instance();
        if ($title != "") {
            $header_data['title'] = $title;
        } else {
            $header_data['title'] = "CI";
        }

        $CI->load->view('templates/header', $header_data);
        if ($data == null) {
            $CI->load->view($view);
        } else {
            $CI->load->view($view, $main_data);
        }
        $CI->load->view('templates/footer');
    }

}

?>
