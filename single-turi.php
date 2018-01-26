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

<section class="b-detail s-shadow">
    <div class="container">
        <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <div class="b-detail__head-title">
                        <h1><?php the_title();?></h1>
                        <h3><?php the_field('article-last'); ?></h3>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="b-detail__head-price">
                        <div class="b-detail__head-price-num"><?php the_field('cost'); ?></div>
                        <p><?php the_field('sub-price-text'); ?></p>
                    </div>
                </div>
            </div>
        </header>
        <div class="b-detail__main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="b-detail__main-info">
                        <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                            <div class="row m-smallPadding">
                                <div class="col-xs-10">
                                    <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                                        <li class="s-relative">
                                            <img class="img-responsive center-block" src="<?php the_post_thumbnail_url(); ?>" />
                                        </li>
                                        <?php if( get_field('slide2') ): ?>
                                            <li class="s-relative">
                                                <img class="img-responsive center-block" src="<?php the_field('slide2'); ?>" />
                                            </li>
                                        <?php endif; ?>
                                        <?php if( get_field('slide3') ): ?>
                                            <li class="s-relative">
                                                <img class="img-responsive center-block" src="<?php the_field('slide3'); ?>" />
                                            </li>
                                        <?php endif; ?>
                                        <?php if( get_field('slide4') ): ?>
                                            <li class="s-relative">
                                                <img class="img-responsive center-block" src="<?php the_field('slide4'); ?>" />
                                            </li>
                                        <?php endif; ?>
                                        <?php if( get_field('slide5') ): ?>
                                            <li class="s-relative">
                                                <img class="img-responsive center-block" src="<?php the_field('slide5'); ?>" />
                                            </li>
                                        <?php endif; ?>
                                        <?php if( get_field('slide6') ): ?>
                                            <li class="s-relative">
                                                <img class="img-responsive center-block" src="<?php the_field('slide6'); ?>" />
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-xs-2 pagerSlider pagerVertical">
                                    <div class="b-detail__main-info-images-small" id="bx-pager">
                                        <a href="#" data-slide-index="0" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" />
                                        </a>
                                        <?php if( get_field('slide2') ): ?>
                                            <a href="#" data-slide-index="1" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php the_field('slide2'); ?>" />
                                            </a>
                                        <?php endif; ?>
                                        <?php if( get_field('slide3') ): ?>
                                            <a href="#" data-slide-index="2" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php the_field('slide3'); ?>" />
                                            </a>
                                        <?php endif; ?>
                                        <?php if( get_field('slide4') ): ?>
                                            <a href="#" data-slide-index="3" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php the_field('slide4'); ?>" />
                                            </a>
                                        <?php endif; ?>
                                        <?php if( get_field('slide5') ): ?>
                                            <a href="#" data-slide-index="4" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php the_field('slide5'); ?>" />
                                            </a>
                                        <?php endif; ?>
                                        <?php if( get_field('slide6') ): ?>
                                            <a href="#" data-slide-index="5" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php the_field('slide6'); ?>" />
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-detail__main-aside-about-form-links">
                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>Описание</a>
                            </div>
                            <div id="info1">
                                <?php if (have_posts()) : while (have_posts()) : the_post();?>

                                    <?php the_content(); ?>

                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--b-detail-->

<section class="b-related m-home">
    <div class="container">
        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">В той же теме</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Еще наши экскурсии</h2>
        <div class="row">

            <?php $categories = get_the_category($post->ID);
            if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args=array(
                    'category__in' => $category_ids, // Сортировка производится по категориям
                    'orderby'=>rand, // Условие сортировки рандом
                    'post__not_in' => array($post->ID),
                    'showposts'=> 3, //Количество выводимых записей
                    'caller_get_posts'=> 1); // Запрещаем повторение ссылок
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) {
                    echo '<div class="related-posts">';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                                <img class="img-responsive center-block"  src="<?php the_post_thumbnail_url(); ?>" />
                                <div class="b-world__item-val">
                                    <span class="b-world__item-val-title"><?php the_field('article-last'); ?></span>
                                </div>
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                <div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price"><?php the_field('cost'); ?> </span>
								<span class="m-number"><span class="fa fa-tachometer"></span><?php the_field('time'); ?></span>
                                </div>
                                <?php if(has_tag()){the_tags('<div class="b-featured__item-links m-auto">','','</div>');}?>
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
</section><!--"b-related-->

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
