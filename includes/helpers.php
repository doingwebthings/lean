<?php
/**
 * various helper functions
 */




/**
 * truncate phrase by words and add … if cut off
 * @param $phrase
 * @param $max_words
 * @return string
 */
function trunc($phrase, $max_words) {
    $phrase_array = explode(' ', $phrase);
    if (count($phrase_array) > $max_words && $max_words > 0) {
        $phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . '…';
    }

    return $phrase;
}





/**
 * Check if page is direct child of another page
 * @param $page_id
 * @return bool
 */
function is_child($page_id) {
    global $post;
    if (is_page() && ($post->post_parent == $page_id)) {
        return true;
    }
    else {
        return false;
    }
}





/**
 * Check if page is an ancestor
 * @param $post_id
 * @return bool
 */
function is_ancestor($post_id) {
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;
    if (in_array($post_id, $ancestors)) {
        return true;
    }
    else {
        return false;
    }
}





/**
 * sort array by value
 * @param $key
 * @return callable
 */
function sort_by_value($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}


