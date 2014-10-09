<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');





//on the fly image resizing
include('libs/BFI_Thumb.php'); //https://github.com/bfintal/bfi_thumb
@define(BFITHUMB_UPLOAD_DIR, 'imagecache');





include('libs/wp_bootstrap_navwalker.php');





add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup()
{
    load_theme_textdomain('lean', get_template_directory() . '/languages');
}





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
    //hello all minified scripts (jquery included)
    wp_register_script('frontend-scripts', asset_url() . 'js/scripts.min.js', array(), null, true);

    //load at the end of <body>
    wp_enqueue_script('frontend-scripts');

    //add some url-vars to end of <body> (loaded before frontend-scripts)
    wp_localize_script('frontend-scripts', 'url', array(
            'base' => get_home_url(),
            'ajax' => admin_url('admin-ajax.php'),
        )
    );

    //load modernizr in <head>
    wp_register_script('modernizr', asset_url() . 'js/modernizr.js', array(), null, false);
    wp_enqueue_script('modernizr');
}


//only do this for frontend
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

//only do this for frontend
if (!is_admin())
{
    add_action('wp_enqueue_scripts', 'enqueue_minified_styles');
}




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
function removeLinkFromAttachment($content)
{
    return $content = preg_replace(array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img', '" />'), $content);
}

add_filter('the_content', 'removeLinkFromAttachment');





/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses    get_bloginfo()
 * @uses    is_home()
 * @uses    is_front_page()
 */
function filterTitle($title)
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

add_filter('wp_title', 'filterTitle');





/**
 * change excerpt length to $length words
 *
 * @param $length
 * @return int
 */
function customExcerptLength($length)
{
    return 15;
}

add_filter('excerpt_length', 'customExcerptLength', 999);





/**
 * change excerpt "more" to whatever you like
 *
 * @param $more
 * @return string
 */
function customExcerptMore($more)
{
    return '…';
}

add_filter('excerpt_more', 'customExcerptMore');




/**
 * move yoast metabox dow
 *
 * @return string
 */
function yoasttobottom()
{
    return 'low';
}

if (is_admin())
{
    add_filter('wpseo_metabox_prio', 'yoasttobottom');
}





/**
 * remove all comments from html (yoast and some other plugins write to <head>)
 * not needed if w3c-caching is in use
 */
function removeHTMLComments()
{
    ob_start(function ($buffer)
    {
        $buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);

        return $buffer;
    });

    add_action('wp_footer', function ()
    {
        ob_end_flush();
    });
}

add_action('get_header', 'removeHTMLComments');





/**
 * add some default widget areas (sidebars)
 * remove as needed
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


//PROJECT-SPECIFIC CODE//////////////////////////////////////////////////////////////////////////////////////////////////////






