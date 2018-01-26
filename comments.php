<?php if ( post_password_required() )
{ return; }
?>


<?php if ( have_comments() ) : ?>

    <div class="s-lineDownLeft  s-titleLeft">
        <div class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
            <h2 class="s-titleDet">Комментарии</h2>
        </div>
    </div>
    <div class="b-article__main-comments">
        <div class="container">
            <div class="row">
                <?php
                wp_list_comments( array(
                    'style'       => 'div',
                    'short_ping'  => true,
                    'callback' => 'mytheme_comment'
                ) );
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>

<div class="b-article__main-add wow zoomInUp" data-wow-delay="0.5s">
    <div class="s-lineDownLeft  s-titleLeft">
        <div>
            <h2 class="s-titleDet">Добавить комментарий</h2>
        </div>
    </div>
    <div class="clearfix"></div>
<?php
$fields = array(
    'author' => '<div class="col-xs-4"><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></div>',
    'email' => '<div class="col-xs-4"><input type="text" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></div>',
    'url' => '<div class="col-xs-4"><input type="text" id="url" name="url" class="website" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="www.example.com" maxlength="30" tabindex="3" autocomplete="on"></div>'
);

$args = array(
    'comment_notes_after' => '',
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" class="comment-form" cols="45" rows="8" aria-required="true" placeholder="Текст сообщения..."></textarea></div>',
    'label_submit' => 'Отправить комментарий',
    'class_submit' => 'btn m-btn btn-blog'
);
comment_form($args);
?>
</div>
