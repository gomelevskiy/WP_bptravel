<?php
define("THEME_DIR", get_template_directory_uri());

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

add_action( 'pre_get_posts', 'mayak_category_announcement' );

/* function pagination */
//function wp_corenavi() {
//    global $wp_query;
//    $pages = '';
//    $max = $wp_query->max_num_pages;
//    if (!$current = get_query_var('paged')) $current = 1;
//    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
//    $a['total'] = $max;
//    $a['current'] = $current;
//
//    $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
//    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
//    $a['end_size'] = 3; //сколько ссылок показывать в начале и в конце
//    $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
//    $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"
//
//    if ($max > 1) echo '<ul class="pagination-1">';
//    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
//    echo '<li>' .$pages . paginate_links($a). '</li>';
//    if ($max > 1) echo '</ul>';
//}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<div class="b-items__pagination" role="navigation">
	    <div class="b-items__pagination-main wow zoomInUp" data-wow-delay="0.5s">%3$s</div>
	</div> 
	';
}

function trim_content_chars($count, $after) {
    $content = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
    else $after = '';
    echo $title . $after;
}

function breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home'] = 'Главная'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статьи автора %s'; // текст для страницы автора
    $text['404'] = 'Ошибка 404'; // текст для страницы 404
    $text['page'] = 'Страница %s'; // текст 'Страница N'
    $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before = ' <div class="travel-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
    $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
//    $sep = '›'; // разделитель между "крошками"
//    $sep_before = '<li class="sep">'; // тег перед разделителем
//    $sep_after = '</li>'; // тег после разделителя
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $before = '<div class="b-breadCumbs__page active">'; // тег перед текущей "крошкой"
    $after = '</div>'; // тег после текущей "крошки"
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_url = home_url('/');
    $link_before = '<div class="b-breadCumbs__page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link_after = '</div>';
    $link_attr = ' itemprop="item"';
    $link_in_before = '<span itemprop="name">';
    $link_in_after = '</span>';
    $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = $post->post_parent;
    $sep = ' ' . $sep_before . "<span class='fa fa-angle-right'></span>" . $sep_after . ' ';
    $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

    } else {

        echo $wrap_before;
        if ($show_home_link) echo $home_link;

        if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }

        } elseif ( is_search() ) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }

        } elseif ( is_day() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ($show_home_link) echo $sep;
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_url . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
                if ( get_query_var('cpage') ) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }

            // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( get_query_var('paged') ) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }

        } elseif ( is_attachment() ) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            if ( get_query_var('paged') ) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }

        } elseif ( is_author() ) {
            global $author;
            $author = get_userdata($author);
            if ( get_query_var('paged') ) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }

        } elseif ( is_404() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
}

// Comments
function mytheme_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
<div class="col-xs-12" id="li-comment-<?php comment_ID() ?>">


    <div class="b-article__main-comments-one wow zoomInUp" data-wow-delay="0.5s">

        <div class="b-article__main-comments-one-person">
            <div class="b-blog__posts-one-author-img" style="background-image: url(<?php $author_email = get_avatar_url(); echo get_avatar_url($author_email, '70');?>);"></div>
        </div>
        <div class="b-article__main-comments-one-text">
            <header class="b-article__main-comments-one-text-head">
                <?php printf(__('<h6>%s</h6> '), get_comment_author_link()) ?>
                <div class="b-article__main-comments-one-text-head-date">
                    <span><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></span>
                </div>
            </header>
            <?php if ($comment->comment_approved == '0') : ?>

                <div><?php _e('Ваш комментарий проверяется модератором.') ?></div>
                <br/>
            <?php endif; ?>
            <?php comment_text() ?>
        </div>

    </div>

<?php }


register_nav_menus(array(
    'main'    => 'Главное меню в шапке',
    'submenu' => 'Всплывающее меню',
    'footer-menu' => 'Нижнее меню'
));

// add a favicon to your
function my_favicon() {
    echo '<link rel="shortcut Icon" type="image/x-icon"
 href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'my_favicon');

### дополнительные данные на странице профиля
add_action('show_user_profile', 'my_profile_new_fields_add');
add_action('edit_user_profile', 'my_profile_new_fields_add');

add_action('personal_options_update', 'my_profile_new_fields_update');
add_action('edit_user_profile_update', 'my_profile_new_fields_update');

function my_profile_new_fields_add(){
	global $user_ID;

	$user_vk = get_user_meta( $user_ID, "user_vk", 1 );
	$user_tw = get_user_meta( $user_ID, "user_tw", 1 );
	$user_gp = get_user_meta( $user_ID, "user_gp", 1 );

	?>
	<h3>Социальальные сети пользователя</h3>
	<table class="form-table">
		<tr>
			<th><label for="user_vk_txt">Vk</label></th>
			<td>
				<input type="text" name="user_vk" value="<?php echo $user_vk ?>"><br>
			</td>
		</tr>
        <tr>
			<th><label for="user_tw_txt">Twitter</label></th>
			<td>
				<input type="text" name="user_tw" value="<?php echo $user_tw ?>"><br>
			</td>
		</tr>
        <tr>
			<th><label for="user_google_txt">Google Plus</label></th>
			<td>
				<input type="text" name="user_gp" value="<?php echo $user_gp ?>"><br>
			</td>
		</tr>
	</table>
	<?php
}

// обновление
function my_profile_new_fields_update(){
	global $user_ID;

	update_user_meta( $user_ID, "user_vk", $_POST['user_vk'] );
	update_user_meta( $user_ID, "user_tw", $_POST['user_tw'] );
	update_user_meta( $user_ID, "user_gp", $_POST['user_gp'] );
}

// Filter
function go_filter() { // наша функция
    $args['tax_query'] = array('relation' => 'AND');


	if ($_GET['hotel-stars'] != '') { // если передана фильтрация по разделу
        $args['tax_query'][] = array(
            'taxonomy'  => 'stars', // слаг таксономии, например category
            'field'     => 'id', // по какому полю таксономии фильтровать можно slug или id
            'terms' => $_POST['hotel-stars']
        );
	}

	if ($_GET['price_ot'] != '' || $_GET['price_do'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_GET['price_ot'] == '') $_GET['price_ot'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_GET['price_do'] == '') $_GET['price_do'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'hotel-cost', // название произвольного поля
			'value' => array( (int)$_GET['price_ot'], (int)$_GET['price_do'] ), // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => 'BETWEEN' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}

}