<?php
/**
 * template tags for usage inside of template/view files
 */





/**
 * base_url
 */
if ( ! function_exists('base_url')) {
    function base_url() {
        return get_bloginfo('wpurl') . '/';
    }
}





/**
 * truncate phrase by words and add … if cut off
 *
 * @param $phrase
 * @param $max_words
 *
 * @return string
 */
if ( ! function_exists('trunc')) {
    function trunc($phrase, $max_words) {
        $phrase_array = explode(' ', $phrase);
        if (count($phrase_array) > $max_words && $max_words > 0) {
            $phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . '…';
        }

        return $phrase;
    }
}





/**
 * Check if page is direct child of another page
 *
 * @param $page_id
 *
 * @return bool
 */
if ( ! function_exists('is_child')) {
    function is_child($page_id) {
        global $post;
        if (is_page() && ($post->post_parent == $page_id)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}





/**
 * Check if page is an ancestor
 *
 * @param $post_id
 *
 * @return bool
 */
if ( ! function_exists('is_ancestor')) {
    function is_ancestor($post_id) {
        global $wp_query;
        $ancestors = $wp_query->post->ancestors;
        if (in_array($post_id, $ancestors)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}





/**
 * sort array by value
 *
 * @param $key
 *
 * @return callable
 */
if ( ! function_exists('sort_by_value')) {
    function sort_by_value($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
}


