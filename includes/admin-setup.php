<?php
/**
 * add code to modify the admin-section or to change wp-default-behaviour
 *
 */



/**
 * remove wordpress logo in admin
 */

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}, 999);





/**
 * remove footer text in admin
 */
add_filter('admin_footer_text', function () {
    echo '';
});





/**
 * setup editor-in-chief: an editor who can edit theme options (edit menus)
 */
add_filter('init', function () {
    global $wp_roles;
    if (!isset($wp_roles)) {
        $wp_roles = new WP_Roles();
    }

    $role = $wp_roles->get_role('editor');
    $wp_roles->add_role('editor_in_chief', 'Chefredakteur', $role->capabilities);

    $eic = get_role('editor_in_chief');
    $eic->add_cap('edit_theme_options');
});





/**
 * add template info to admin-bar
 */
add_filter('admin_bar_menu', function ($wp_admin_bar) {
    if (is_admin()) {
        return false;
    }

    $args = array(
        'id' => 'template',
        'title' => 'Template: ' . get_current_template() . '</span>',
    );
    $wp_admin_bar->add_node($args);
}, 999);


add_filter('template_include', 'var_template_include', 1000);
function var_template_include($t) {
    $GLOBALS['current_theme_template'] = basename($t);

    return $t;
}

function get_current_template() {
    if (!isset($GLOBALS['current_theme_template'])) {
        return '';
    }

    return $GLOBALS['current_theme_template'];
}





/**
 * remove some wp stuff... remove stuff as needed
 */
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version





/**
 * add lines in left admin bar
 */
add_action('admin_head', function () {
    echo ' <style type="text/css">#adminmenu a {font-size: 12px !important;}#adminmenu li.wp-menu-separator {background: #666;}#adminmenu li.wp-menu-separator {height: 1px !important;border-width: 0px 0;border-style: solid;cursor: inherit;}</style>';
});

