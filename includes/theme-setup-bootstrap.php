<?php






/**
 * which fields go into the comment-form?
 *
 * @param $fields
 * @return array
 */
function bootstrap3_comment_form_fields($fields)
{
    $commenter = wp_get_current_commenter();

    $req      = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $html5    = current_theme_supports('html5', 'comment-form') ? 1 : 0;

    $fields = array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label><input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label> <input class="form-control" id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __('Website') . '</label> <input class="form-control" id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
    );

    return $fields;
}

add_filter('comment_form_default_fields', 'bootstrap3_comment_form_fields');





/**
 * build comment form with bootstrap classes
 *
 * @param $args
 * @return mixed
 */
function bootstrap3_comment_form($args)
{
    $args['comment_field']       = '<div class="form-group comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea class="form-control" id="comment" name="comment" aria-required="true"></textarea></div>';
    $args['comment_notes_after'] = '';

    return $args;
}

add_filter('comment_form_defaults', 'bootstrap3_comment_form');




/**
 * show a really beautiful button
 */
function bootstrap3_comment_button()
{
    echo '<button class="btn btn-default" type="submit">' . __('Submit') . '</button>';
}

add_action('comment_form', 'bootstrap3_comment_button');





/**
 * Roots_Walker_Comment
 * Use Bootstrap's media object for listing comments
 *
 * @link http://roots.io this is where the code comes from
 * @link http://getbootstrap.com/components/#media
 */
class Roots_Walker_Comment extends Walker_Comment
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
        <ul <?php comment_class('comment-' . get_comment_ID()); ?>>
    <?php
    }


    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;
        echo '</ul>';
    }


    function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment']       = $comment;

        if (!empty($args['callback']))
        {
            call_user_func($args['callback'], $comment, $args, $depth);

            return;
        }

        extract($args, EXTR_SKIP); ?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-' . get_comment_ID()); ?>>
        <?php echo get_avatar($comment, $size = '64'); ?>
        <div class="comment-body">
        <time class="comment-datetime" datetime="<?php echo comment_date('c'); ?>">
            <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s', 'lean'), get_comment_date(), get_comment_time()); ?></a>
        </time>
        <h4 class="comment-heading"><?php echo ucfirst(get_comment_author_link()); ?> says: </h4>
        <?php edit_comment_link(__('(Edit)', 'lean'), '', ''); ?>

        <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
            <?php _e('Your comment is awaiting moderation.', 'lean'); ?>
        </div>
    <?php endif; ?>

        <div class="comment-text"> <?php comment_text(); ?></div>
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    <?php
    }


    function end_el(&$output, $comment, $depth = 0, $args = array())
    {
        if (!empty($args['end-callback']))
        {
            call_user_func($args['end-callback'], $comment, $args, $depth);

            return;
        }
        echo "</div></li>";
    }
}





/**
 * @param $avatar
 * @param $type
 * @return mixed
 *
 * @link http://roots.io this is where the code comes from
 */
function roots_get_avatar($avatar, $type)
{
    if (!is_object($type))
    {
        return $avatar;
    }

    $avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);

    return $avatar;
}

add_filter('get_avatar', 'roots_get_avatar', 10, 2);