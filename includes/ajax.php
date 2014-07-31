<?php
function myAjaxCall()
{
}

add_action('wp_ajax_myAjaxCall', 'myAjaxCall');
add_action('wp_ajax_nopriv_myAjaxCall', 'myAjaxCall');