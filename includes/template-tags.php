<?php
/**
 * template tags for usage inside of template/view files
 */

/**
 * template-tag: returns asset url
 */
if(!function_exists('asset_url'))
{
    function asset_url()
    {
        return get_template_directory_uri() . '/assets/';
    }
}
