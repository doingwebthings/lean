<?php
// Register Custom Post Type
function custom_post_type_sample()
{

    $labels = array(
        'name' => _x('sample', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('sample', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('sample', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Alle sample', 'text_domain'),
        'view_item' => __('sample anzeigen', 'text_domain'),
        'add_new_item' => __('sample erstellen', 'text_domain'),
        'add_new' => __('sample erstellen', 'text_domain'),
        'edit_item' => __('sample bearbeiten', 'text_domain'),
        'update_item' => __('sample speichern', 'text_domain'),
        'search_items' => __('sample suchen', 'text_domain'),
        'not_found' => __('Nicht gefunden', 'text_domain'),
        'not_found_in_trash' => __('Nicht gefunden', 'text_domain'),
    );
    $args = array(
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions',),
        'taxonomies' => array('category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => false,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('sample', $args);

}

// Hook into the 'init' action
add_action('init', 'custom_post_type_sample', 0);