<?php
/**
 * changes to the WordPress admin screen
 */
include('includes/admin-setup.php');


/**
 * theme-setup
 */
include(get_template_directory() . '/includes/theme-setup.php');
include(get_template_directory() . '/includes/theme-setup-bootstrap.php');


/**
 * change mail settings
 */
include(get_template_directory() . '/includes/mail-setup.php');


/**
 * add custom template tags / conditionals
 */
include(get_template_directory() . '/includes/template-tags.php');


/**
 * generic shortcodes go here
 */
include(get_template_directory() . '/includes/shortcodes.php');


/**
 * load post-types
 */
include(get_template_directory() . '/includes/post-types.php');


/**
 * set up ajax calls here
 */
include(get_template_directory() . '/includes/ajax.php');


