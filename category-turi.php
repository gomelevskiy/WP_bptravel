<?php get_header(); ?>

    <section class="b-pageHeader">
        <div class="row">
            <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php echo get_cat_name(7);?></h1>
        </div>
    </section><!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div><!--b-breadCumbs-->

    <div class="b-items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <?php $i = 0; $id=7;
                        $arg_posts =  array(
                            'orderby'      => 'modified',
                            'order'        => 'ASC',
                            'cat' => $id,
                            'showposts'=>$n
                        );
                        $recent = new WP_Query($arg_posts);

                        while($recent->have_posts()) : $recent->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-items__cars-one-img">
                                        <img class='img-responsive' src="<?php the_post_thumbnail_url(); ?>" alt='chevrolet'/>
                                        <?php if( get_field('priority') == 'vip' ): ?>
                                            <span class="b-items__cars-one-img-type m-premium">Особая</span>
                                        <?php endif; ?>
                                        <?php if( get_field('priority') == 'new' ): ?>
                                            <span class="b-items__cars-one-img-type m-listing">Новинка</span>
                                        <?php endif; ?>
                                        <?php if( get_field('priority') == 'sale' ): ?>
                                            <span class="b-items__cars-one-img-type m-owner">Акция</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="b-items__cell-info">
                                        <div class="s-lineDownLeft b-items__cell-info-title">
                                            <h2 class=""><?php the_title(); ?></h2>
                                        </div>
                                        <div class="text-cut"><?php the_content(); ?></div>
                                        <div class="row m-smallPadding">
                                            <div class="col-xs-6">
                                                <?php if(has_tag()){the_tags('<div class="text-dop"><div class="meta-tags">','','</div></div>');}?>
                                                <h5 class="b-items__cell-info-price"><?php the_field('cost'); ?></h5>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="b-items__cell-info-km">
                                                    <span class="fa fa-tachometer"></span>
                                                    <p><?php the_field('time'); ?></p>
                                                </div>
                                                <a href="<?php the_permalink() ?>" class="btn m-btn">ПОДРОБНЕЕ<span class="fa fa-angle-right"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; endwhile; ?>

                    </div>

                    <?php the_posts_pagination( array(
                        'prev_text' => "<span class='fa fa-angle-left'></span>",
                        'next_text' => "<span class='fa fa-angle-right'></span>",
                        'end_size' => 2,
                        'mid_size' => 2
                    ) ); ?>
                </div>
            </div>
        </div>
    </div><!--b-items-->

    <!--Content Area End-->

<?php get_footer(); ?>