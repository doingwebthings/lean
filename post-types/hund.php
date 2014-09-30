<?php

function hund_init() {
	register_post_type( 'hund', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Hunds', 'lean' ),
			'singular_name'       => __( 'Hund', 'lean' ),
			'all_items'           => __( 'Hunds', 'lean' ),
			'new_item'            => __( 'New hund', 'lean' ),
			'add_new'             => __( 'Add New', 'lean' ),
			'add_new_item'        => __( 'Add New hund', 'lean' ),
			'edit_item'           => __( 'Edit hund', 'lean' ),
			'view_item'           => __( 'View hund', 'lean' ),
			'search_items'        => __( 'Search hunds', 'lean' ),
			'not_found'           => __( 'No hunds found', 'lean' ),
			'not_found_in_trash'  => __( 'No hunds found in trash', 'lean' ),
			'parent_item_colon'   => __( 'Parent hund', 'lean' ),
			'menu_name'           => __( 'Hunds', 'lean' ),
		),
	) );

}
add_action( 'init', 'hund_init' );

function hund_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['hund'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Hund updated. <a target="_blank" href="%s">View hund</a>', 'lean'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'lean'),
		3 => __('Custom field deleted.', 'lean'),
		4 => __('Hund updated.', 'lean'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Hund restored to revision from %s', 'lean'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Hund published. <a href="%s">View hund</a>', 'lean'), esc_url( $permalink ) ),
		7 => __('Hund saved.', 'lean'),
		8 => sprintf( __('Hund submitted. <a target="_blank" href="%s">Preview hund</a>', 'lean'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Hund scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview hund</a>', 'lean'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Hund draft updated. <a target="_blank" href="%s">Preview hund</a>', 'lean'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'hund_updated_messages' );
