<?php
/**
 * include all custom-post-types from folder "post-types" here
 */
if ( file_exists( get_template_directory() . '/post-types/contactperson.php' ) )
{
	include( get_template_directory() . '/post-types/contactperson.php' );
}
