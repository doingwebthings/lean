<?php
/**
 * setup default mail
 *
 * consider using this plugin http://wordpress.org/plugins/wp-better-emails/
 */





add_filter("wp_mail_content_type", "set_mail_content_type");
function set_mail_content_type()
{
    return "text/html";
}





add_filter("wp_mail_from", "set_mail_from");
function set_mail_from()
{
    return get_option('admin_email');
}





add_filter("wp_mail_from_name", "set_mail_from_name");
function set_mail_from_name()
{
    return get_option('blogname');
}