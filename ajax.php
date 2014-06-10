<?php

//error_reporting(-1);

//use shortinit to load wp core only
define('SHORTINIT', true);

//finde the wp root directory
$wprootdir = explode('wp-content', dirname(dirname(dirname(__FILE__))));

//load wp-load to start wp
require($wprootdir[0] . '/wp-load.php');

//load some wordpress files to avoid errors ... wp is a really good framework for web development
require($wprootdir[0] . '/wp-includes/l10n.php');
require($wprootdir[0] . '/wp-includes/query.php');
require($wprootdir[0] . '/wp-includes/taxonomy.php');
require($wprootdir[0] . '/wp-includes/user.php');
require($wprootdir[0] . '/wp-includes/formatting.php');
require($wprootdir[0] . '/wp-includes/meta.php');
require($wprootdir[0] . '/wp-includes/post.php');
require($wprootdir[0] . '/wp-includes/general-template.php');
require($wprootdir[0] . '/wp-includes/link-template.php');

//say hello to the global db object
global $wpdb;

//die(bloginfo('wpurl'));





//do what you want...
$posts = get_posts();
die('<pre>' . print_r($posts, true) . '</pre>');
