<?php
/**
 * add code to modify the admin-section or to change wp-default-behaviour
 *
 */

if (is_admin()) {



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
        if ( ! isset($wp_roles)) {
            $wp_roles = new WP_Roles();
        }

        $role = $wp_roles->get_role('editor');
        $wp_roles->add_role('editor_in_chief', __('Editor-in-Chief'), $role->capabilities);

        $eic = get_role('editor_in_chief');
        $eic->add_cap('edit_theme_options');
    });





    /**
     * add lines in left admin bar
     */
    add_action('admin_head', function () {
        echo ' <style type="text/css">#adminmenu a {font-size: 12px !important;}#adminmenu li.wp-menu-separator {background: #666;}#adminmenu li.wp-menu-separator {height: 1px !important;border-width: 0px 0;border-style: solid;cursor: inherit;}</style>';
    });





    /**
     * add categories to media
     */
    function enableMediaCategories() {
        register_taxonomy('kategorien', 'attachment', array(
            'labels'            => array(
                'name'              => 'Kategorien',
                'singular_name'     => 'Kategorien',
                'search_items'      => 'Kategorien suchen',
                'all_items'         => 'Alle Kategorien',
                'parent_item'       => 'Eltern-Kategorie',
                'parent_item_colon' => 'Eltern-Kategorie:',
                'edit_item'         => 'Kategorie bearbeiten',
                'update_item'       => 'Kategorie ändern',
                'add_new_item'      => 'Kategorie erstellen',
                'new_item_name'     => 'Neue Kategorie',
                'menu_name'         => 'Kategorien',
            ),
            'hierarchical'      => TRUE,
            'query_var'         => TRUE,
            'rewrite'           => TRUE,
            'show_admin_column' => TRUE,
        ));
    }

    add_action('init', 'enableMediaCategories');




    /**
     * add post-types to "right-now" box on dashboard
     */
    function addPostTypesToRightNow() {
        $showTaxonomies = 1;
        // Custom taxonomies counts
        if ($showTaxonomies) {
            $taxonomies = get_taxonomies(array('_builtin' => FALSE), 'objects');
            foreach ($taxonomies as $taxonomy) {
                $num_terms            = wp_count_terms($taxonomy->name);
                $num                  = number_format_i18n($num_terms);
                $text                 = _n($taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms);
                $associated_post_type = $taxonomy->object_type;
                if (current_user_can('manage_categories')) {
                    $output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text . '</a>';
                }
                echo '<li class="taxonomy-count">' . $output . ' </li>';
            }
        }
        // Custom post types counts
        $post_types = get_post_types(array('_builtin' => FALSE), 'objects');
        foreach ($post_types as $post_type) {
            if ($post_type->show_in_menu == FALSE) {
                continue;
            }
            $num_posts = wp_count_posts($post_type->name);
            $num       = number_format_i18n($num_posts->publish);
            $text      = _n($post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish);
            if (current_user_can('edit_posts')) {
                $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            }
            // pending items count
            if ($num_posts->pending > 0) {
                $num  = number_format_i18n($num_posts->pending);
                $text = _n($post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending);
                if (current_user_can('edit_posts')) {
                    $output .= '<a class="waiting" href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . ' pending</a>';
                }
            }
            echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
        }
    }

    add_action('dashboard_glance_items', 'addPostTypesToRightNow');





    function removeDashboardWidgets() {
        // remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
        // remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
        // remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
        // remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
        // remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
        // remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
        // remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
        // remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
    }

    add_action('wp_dashboard_setup', 'removeDashboardWidgets');
}





/**
 * remove WordPress logo from admin bar
 */
function removeWpLogo() {

    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'removeWpLogo');



/**
 * remove update info for all user but admins
 */
function hide_update_notice_to_all_but_admin_users() {
    if ( ! current_user_can('update_core')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}

add_action('admin_head', 'hide_update_notice_to_all_but_admin_users', 1);

//
//
///**
// * setup custom logo for login
// */
//function custom_login_logo() {
//    echo '<style type="text/css">#login h1 a { background-image:url(' . get_template_directory() . '/assets/img/wp-login-logo.png) !important; }</style>';
//}
//
//add_action('login_head', 'custom_login_logo');
//
//
//
//
//
///**
// * change url of the login logo
// * @return string|void
// */
//function my_login_logo_url() {
//    return get_bloginfo('url');
//}
//
//add_filter('login_headerurl', 'my_login_logo_url');
//
//
//
//
//
///**
// * @return string
// */
//function my_login_logo_url_title() {
//    return 'Your Site Name and Info';
//}
//
//add_filter('login_headertitle', 'my_login_logo_url_title');


