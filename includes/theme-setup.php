<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');





//on the fly image resizing
include('libs/BFI_Thumb.php'); //https://github.com/bfintal/bfi_thumb
@define(BFITHUMB_UPLOAD_DIR, 'imagecache');


include('libs/wp_bootstrap_navwalker.php');


/**
 * adding menus
 */
register_nav_menus(array(
    'primary'   => __('Primary Menu', 'dwt'),
    'secondary' => __('Secondary Menu', 'dwt'),
));





/**
 * dequeue wp´s jquery and load minified scripts
 */
function enqueue_minified_scripts()
{
    //goodbye jquery
    wp_deregister_script('jquery');

    //hello all minified scripts (jquery included)
    wp_register_script('jquery', asset_url() . 'js/scripts.min.js', array(), null, true);
    wp_enqueue_script('jquery');

    //modernizr goes into the head
    wp_register_script('modernizr', asset_url() . 'js/modernizr.js', array(), null, false);
    wp_enqueue_script('modernizr');
}

if (!is_admin())
{
    add_action('wp_enqueue_scripts', 'enqueue_minified_scripts');
}





/**
 * enqueue all styles into a single file
 */
function enqueue_minified_styles()
{
    wp_register_style('styles', asset_url() . 'css/styles.css', array(), null, 'all');
    wp_enqueue_style('styles');
}

add_action('wp_enqueue_scripts', 'enqueue_minified_styles');





/**
 * removes media from style-tag
 * @param $src
 * @return mixed
 */
function cleanUpStyleTag($src)
{
    return str_replace("media=''", '', $src);
}

add_filter('style_loader_tag', 'cleanUpStyleTag');





/**
 * remove hyperlink from images in THE CONTENT
 *
 * @param $content
 * @return string
 */
function attachment_image_link_remove_filter($content)
{
    return $content = preg_replace(array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img', '" />'), $content);
}

add_filter('the_content', 'attachment_image_link_remove_filter');





/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses    get_bloginfo()
 * @uses    is_home()
 * @uses    is_front_page()
 */
function filter_wp_title($title)
{
    global $page, $paged;

    if (is_feed())
    {
        return $title;
    }

    $site_description = get_bloginfo('description');

    $filtered_title = $title . get_bloginfo('name');
    $filtered_title .= (!empty($site_description) && (is_home() || is_front_page())) ? ' – ' . $site_description : '';
    $filtered_title .= (2 <= $paged || 2 <= $page) ? ' – ' . sprintf(__('Page %s'), max($paged, $page)) : '';

    return $filtered_title;
}

add_filter('wp_title', 'filter_wp_title');





function custom_excerpt_length($length)
{
    return 15;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);





function new_excerpt_more($more)
{
    return '…';
}

add_filter('excerpt_more', 'new_excerpt_more');



// Move Yoast to bottom
function yoasttobottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');





/**
 * remove all html comments from wphead() and wpfooter()
 */
add_action('get_header', function ()
{
    ob_start(function ($buffer)
    {
        $buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);

        return $buffer;
    });
});
add_action('wp_footer', function ()
{
    ob_end_flush();
});




/**
 * add widget area
 */
function init_widgets()
{

    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'primarywidgets',
        'before_widget' => '<div class="primary-widgets">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => 'Footer',
        'id'            => 'secondarywidgets',
        'before_widget' => '<div class="secondary-widgets">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ));
}

add_action('widgets_init', 'init_widgets');




/**
 * remove some wp stuff... remove stuff as needed
 */
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
//remove_action('wp_head', 'index_rel_link'); // index link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version





/**
 * add fast ajax handling
 */
add_action('init', function ()
{

    add_rewrite_rule('ajax', 'wp-content/themes/lean/xhr.php', 'top');
    //    flush_rewrite_rules();
});

//PROJECT-SPECIFIC CODE//////////////////////////////////////////////////////////////////////////////////////////////////////






