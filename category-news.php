<?php get_header(); ?>

<section class="b-pageHeader">
    <div class="row">
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php echo get_cat_name(12);?></h1>
        <?php if( get_field('flag_feedback') ): ?>
            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                <h3>Оформи приглашение онлайн</h3>
            </div>
        <?php endif; ?>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container">
        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
</div><!--b-breadCumbs-->

<div class="b-blog s-shadow">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <div class="b-blog__posts">

                <?php $i = 0; $id=12; $paged = get_query_var( 'paged', 1 ); $count_items = 12;
                $arg_posts =  array(
                    'orderby'      => 'modified',
                    'order'        => 'ASC',
                    'cat' => $id,
//                            'showposts'=>$n
                );
                $recent = new WP_Query( "cat=$id&posts_per_page=$count_items&paged=$paged" );

                while($recent->have_posts()) : $recent->the_post(); ?>

                    <div class="b-blog__posts-one wow zoomInUp" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="col-xs-8">
                                <header class="b-blog__posts-one-body-head s-lineDownLeft">
                                    <div class="b-blog__posts-one-body-head-notes">
                                        <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php the_author() ?></span>
                                        <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php the_time(get_option('date_format')); ?></span>
                                        <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-comment"></span><?php comments_number("нет комментариев", "<i>2</i> комментарий", "<i>%</i> комментариев"); ?></span>
                                    </div>
                                    <h2 class="s-titleDet"><?php the_title(); ?></h2>
                                </header>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 pull-right">
                                <img class="img-responsive center-block" src="<?php the_post_thumbnail_url(); ?>" />
                            </div>
                            <div class="col-xs-8 pull-right">
                                <div class="b-blog__posts-one-info">
                                    <div><?php the_content(); ?></div>
                                    <a href="<?php the_permalink() ?>" class="btn m-btn m-readMore">Подробнее<span class="fa fa-angle-right"></span></a>
                                    <div class="b-blog__posts-one-social pull-right">
                                        <?php the_field('repost',6); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php $i++; endwhile; ?>

                <div class="b-blog__posts-one-body-main-link wow zoomInUp" data-wow-delay="0.3s"><a href="/"><?php echo category_description(12); ?></a></div>

                <?php the_posts_pagination( array(
                    'prev_text' => "<span class='fa fa-angle-left'></span>",
                    'next_text' => "<span class='fa fa-angle-right'></span>",
                    'end_size' => 2,
                    'mid_size' => 2
                ) ); ?>

            </div>
        </div>
    </div>
</div><!--b-blog-->

<!--Content Area End-->

<?php get_footer(); ?>
