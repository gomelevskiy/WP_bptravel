<?php get_header(); ?>

<section class="b-pageHeader">
    <div class="row">
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php the_title();?></h1>
        <?php if( get_field('flag_feedback') ): ?>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
            <h3><?php the_field('text_feedback'); ?></h3>
        </div>
        <?php endif; ?>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container">
        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
</div><!--b-breadCumbs-->

<section class="b-article">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="b-article__main">
                    <div class="b-blog__posts-one">
                        <div class="row m-noBlockPadding">
                            <div class="col-sm-1 col-xs-2">
                                <div class="b-blog__posts-one-author wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-blog__posts-one-author-img" style="background-image: url(<?php $author_email = get_avatar_url(); echo get_avatar_url($author_email, '70');?>);"></div>
                                    <div class="b-blog__posts-one-share s-lineDownCenter">Поделиться</div>
                                    <div class="b-blog__posts-one-social">
                                        <?php echo do_shortcode("[ishare_buttons]"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-11 col-xs-10">
                                <div class="b-blog__posts-one-body">
                                    <header class="b-blog__posts-one-body-head wow zoomInUp" data-wow-delay="0.5s">
                                        <h2 class="s-titleDet"><?php the_title();?></h2>
                                        <div class="b-blog__posts-one-body-head-notes">
                                            <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php the_author() ?></span>
                                            <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php the_date() ?></span>
                                            <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-comment"></span><?php comments_number("нет комментариев", "<i>2</i> комментарий", "<i>%</i> комментариев"); ?></span>
                                        </div>
                                    </header>
                                    <div class="b-blog__posts-one-body-main wow zoomInUp" data-wow-delay="0.5s">
                                        <div class="b-blog__posts-one-body-main-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    </div>
                                    <div class="b-blog__posts-one-body-why wow zoomInUp" data-wow-delay="0.5s">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="b-blog__posts-one-body-tags wow zoomInUp" data-wow-delay="0.5s">
                                        <span class="fa fa-tags"></span>
                                        ТЕГИ: <?php if(has_tag()){the_tags('','','');}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-article__main-related s-shadow">
                        <div class="s-lineDownLeft  s-titleLeft">
                            <div>
                                <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">Другие новости</h2>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">

                            <?php $categories = get_the_category($post->ID);
                            if ($categories) {
                                $category_ids = array();
                                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                                $args=array(
                                    'category__in' => $category_ids, // Сортировка производится по категориям
                                    'orderby'=>rand, // Условие сортировки рандом
                                    'post__not_in' => array($post->ID),
                                    'showposts'=>2, //Количество выводимых записей
                                    'caller_get_posts'=>1); // Запрещаем повторение ссылок
                                $my_query = new wp_query($args);
                                if( $my_query->have_posts() ) {
                                    echo '<div class="col-sm-6 col-xs-12">';
                                    while ($my_query->have_posts()) {
                                        $my_query->the_post();
                                        ?>
                                            <div class="b-article__main-related-item wow zoomInUp" data-wow-delay="0.5s">
                                                <div class="row m-smallPadding">
                                                    <style>
                                                        .img-container img {
                                                            width: 100%;
                                                            height: inherit;
                                                        }
                                                    </style>
                                                    <div class="col-xs-4 img-container">
                                                        <?php the_post_thumbnail('thumbnail'); ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                                        <div class="b-blog__posts-one-body-head-notes">
                                                            <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php the_author() ?></span>
                                                            <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php the_time(get_option('date_format')); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    echo '</div>';
                                }
                                wp_reset_query();
                            }?>

                        </div>
                    </div>

<!--                     <?php $id=14; $n=1; $recent = new WP_Query("cat=$id&showposts=$n"); while($recent->have_posts()) : $recent->the_post(); ?>

                        <?php if( get_field('favourite_review') ): ?>
                            <div class="b-article__main-author wow zoomInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-xs-2 pull-right">
                                        <div class="b-blog__posts-one-author-img pull-right" style="background-image: url('<?php $author_email = get_avatar_url(); echo get_avatar_url($author_email, '70');?>');"></div>
                                    </div>
                                    <div class="col-xs-10 pull-right">
                                        <h3><span>Автор: </span> <?php the_author() ?></h3>
                                        <div class="b-article__main-author-social">
                                            <a href="<?php echo $user_vk = get_the_author_meta('user_vk'); ?>" class=""><span class="fa fa-vk"></span></a>
                                            <a href="<?php echo $user_vk = get_the_author_meta('user_tw'); ?>" class=""><span class="fa fa-twitter"></span></a>
                                            <a href='<?php echo $user_vk = get_the_author_meta('user_gp'); ?>' class=""><span class="fa fa-google-plus"></span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?> -->

                    <?php comments_template(); ?>
                    
                <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!--b-article-->

<?php if( get_field('form-on') ): ?>
    <section class="b-feedback">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="b-contacts__form">
                    <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                        <h2 class="s-titleDet">Форма заявки</h2>
                    </header>
                    <p class=" wow zoomInUp" data-wow-delay="0.5s">Отправьте ваше сообщение нам если у вас есть информация, которую стоило бы нам сообщить</p>
                    <div id="success"></div>
                    <form id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                        <?php the_field('feedback'); ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!--Content Area End-->

<?php get_footer(); ?>
