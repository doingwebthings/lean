<?php
add_theme_support('post-formats');
add_theme_support('post-thumbnails');
add_theme_support('menus');



/**
 * dequeue wp´s jquery and load minified scripts
 */
function enqueue_minified_scripts()
{
    //goodbye jquery
    wp_deregister_script('jquery');

    //hello all minified scripts (jquery included)
    wp_register_script('jquery', asset_url() . 'javascript/scripts.min.js', array(), null, true);
    wp_enqueue_script('jquery');

    //modernizr goes into the head
    wp_register_script('modernizr', asset_url() . 'javascript/modernizr.min.js', array(), null, false);
    wp_enqueue_script('modernizr');
}

add_action('wp_enqueue_scripts', 'enqueue_minified_scripts');





/**
 * enqueue all styles into a single file
 */
function enqueue_minified_styles()
{
    wp_register_style('styles', asset_url() . 'css/styles.min.css', array(), null, false);
    wp_enqueue_style('styles');
}

add_action('wp_enqueue_scripts', 'enqueue_minified_styles');
