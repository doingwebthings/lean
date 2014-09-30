<?php
/**
 * changes to the WordPress admin screen
 */
include('includes/admin-setup.php');


/**
 * theme-setup
 */
include('includes/theme-setup.php');
include('includes/theme-setup-bootstrap.php');


/**
 * change mail settings
 */
include('includes/mail-setup.php');


/**
 * add custom template tags / conditionals
 */
include('includes/template-tags.php');


/**
 * generic shortcodes go here
 */
include('includes/shortcodes.php');


/**
 * load post-types
 */
include('includes/post-types.php');


/**
 * set up ajax calls here
 */
include('includes/ajax.php');


