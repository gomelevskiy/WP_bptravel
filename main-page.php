<?php
/*
Template Name: Шаблон для главной страницы
*/
?>

<?php get_header(); ?>

<section class="b-slider">
    <div id="carousel" class="slide carousel carousel-fade">
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php the_field('s1_img',179); ?>" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3><?php the_field('s1_sub',179); ?></h3>
                        <h2><?php the_field('s1_article',179); ?></h2>
                        <p><?php the_field('s1_name',179); ?>
                            <?php if( get_field('s1_price',179) ): ?>
                                <span><?php the_field('s1_price',179); ?> </span>
                            <?php endif; ?>
                        </p>
                        <a class="btn m-btn" href="<?php the_field('s1_link',179); ?>">Подробнее<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="<?php the_field('s2_img',179); ?>" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3><?php the_field('s2_sub',179); ?></h3>
                        <h2><?php the_field('s2_article',179); ?></h2>
                        <p><?php the_field('s2_name',179); ?>
                            <?php if( get_field('s2_price',179) ): ?>
                                <span><?php the_field('s2_price',179); ?> </span>
                            <?php endif; ?>
                        </p>
                        <a class="btn m-btn" href="<?php the_field('s2_link',179); ?>">Подробнее<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="<?php the_field('s3_img',179); ?>" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3><?php the_field('s3_sub',179); ?></h3>
                        <h2><?php the_field('s3_article',179); ?></h2>
                        <p><?php the_field('s3_name',179); ?>
                            <?php if( get_field('s3_price',179) ): ?>
                                <span><?php the_field('s3_price',179); ?> </span>
                            <?php endif; ?>
                        </p>
                        <a class="btn m-btn" href="<?php the_field('s3_link',179); ?>">Подробнее<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control right" href="#carousel" data-slide="next">
            <span class="fa fa-angle-right m-control-right"></span>
        </a>
        <a class="carousel-control left" href="#carousel" data-slide="prev">
            <span class="fa fa-angle-left m-control-left"></span>
        </a>
    </div>
</section><!--b-slider-->

<section class="b-world bg-none">
    <div class="container">
        <div class="row">
            <?php
            $id= 7; // ID заданной рубрики
            $recent = new WP_Query("cat=$id");
            while($recent->have_posts()) : $recent->the_post();
            ?>
                <?php if( get_field('view-in-main') ): ?>
                <div class="col-sm-6 col-xs-12">
                    <a href="<?php the_permalink() ?>">
                    <div class="b-world__item wow zoomInLeft" data-wow-delay="0.3s">
                        <div class="img-hidden"><img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></div>
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">Мы организовываем</span>
                        </div>
                        <h2><?php the_title(); ?></h2>
                    </div>
                    </a>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section><!--b-world-->

<section class="b-homeAuto">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="b-homeAuto__latest">
                    <h5 class="s-titleBg wow zoomInLeft" data-wow-delay="0.3s">Выберите себе экскурсию по душе</h5><br />
                    <h2 class="s-title wow zoomInLeft" data-wow-delay="0.3s">Лучшие экскурсии компании</h2>
                    <div class="b-auto__main">
                        <div class="row">
                            <?php
                            $id= 7; // ID заданной рубрики
//                            $n= 6;   // количество выводимых записей
                            $recent = new WP_Query("cat=$id");
                            while($recent->have_posts()) : $recent->the_post();
                            ?>
                            <?php if( get_field('best-ekskursion') ): ?>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="b-auto__main-item wow zoomInUp" data-wow-delay="0.3s">
                                            <img class="img-responsive center-block"  src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                            <div class="b-auto__main-item-info">
                                                <span class="m-price">
                                                    <?php the_field('cost'); ?>
                                                </span>
                                            </div>
                                            <?php if(has_tag()){the_tags('<div class="b-featured__item-links m-auto">','','</div>');}?>
                                            <div class="b-featured__item-text-sub">
                                                <div class="text-cut"><?php the_content(); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="b-homeAuto bg-grey-home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="b-homeAuto__world m-home">
                    <div class="row">
                        <?php
                        $id= 12; // ID заданной рубрики
                        $n= 4;   // количество выводимых записей
                        $recent = new WP_Query("cat=$id&showposts=$n");
                        while($recent->have_posts()) : $recent->the_post();
                        ?>
                        <div class="col-xs-6">
                            <div class="b-homeAuto__world-item wow zoomInUp" data-wow-delay="0.3s">
                                <div class="row container-img">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="b-homeAuto__world-item-info">
                                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive center-block" alt="<?php the_title(); ?>" />
                                    </div>
                                </div>
                                <div class="b-homeAuto__world-item-text">
                                    <span><?php the_time(get_option('date_format')); ?></span>
                                    <div class="text-cut"><?php the_content(); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <a href="/category/news/" class="btn m-btn wow zoomInUp" data-wow-delay="0.3s">Все новости<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</section><!--b-homeAuto-->

<!--Content Area End-->

<?php get_footer(); ?>

