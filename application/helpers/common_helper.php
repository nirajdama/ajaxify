<?php

function print_errors($error_id) {
    $CI = & get_instance();
    echo isset($CI->res) && array_key_exists('display_errors', $CI->res) && array_key_exists($error_id, $CI->res['display_errors']) ? $CI->res['display_errors'][$error_id] : "";
}