<?php get_header(); ?>

<section class="b-pageHeader">
    <div class="row">
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php the_title();?></h1>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container">
        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
</div><!--b-breadCumbs-->

<section class="b-personal s-shadow">
    <div class="container">
        <h3 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">Этим людям вы можете доверять</h3><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">НАША КОМАНДА МЕЧТЫ</h2>
        <div class="row">

            <?php $i = 0; $id=5;
            $arg_posts =  array(
                'orderby'      => 'modified',
                'order'        => 'ASC',
                'cat' => $id,
                'showposts'=>$n
            );
            $recent = new WP_Query($arg_posts);

            while($recent->have_posts()) : $recent->the_post(); ?>
            <div class="col-md-4">
                <div class="b-personal__worker wow zoomInUp" data-wow-delay="0.5s">
                    <div class="b-personal__worker-img">
                        <img src="<?php the_post_thumbnail_url(); ?>" width="330" height="244" class="img-responsive"/>
                        <div class="b-personal__worker-img-social">
                            <div class="b-personal__worker-img-social-main">
                                <?php if( get_field('vk') ): ?>
                                    <a href="<?php the_field('vk'); ?>"><span class="fa fa-vk sq-custom"></span></a>
                                <?php endif; ?>
                                <?php if( get_field('fb') ): ?>
                                    <a href="<?php the_field('fb'); ?>"><span class="fa fa-facebook sq-custom"></span></a>
                                <?php endif; ?>
                                <?php if( get_field('odnoklassniki') ): ?>
                                    <a href="<?php the_field('odnoklassniki'); ?>"><span class="fa fa-odnoklassniki sq-custom"></span></a>
                                <?php endif; ?>
                                <?php if( get_field('tripadvisor') ): ?>
                                    <a href="<?php the_field('tripadvisor'); ?>"><span class="fa fa-tripadvisor sq-custom"></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <h6><?php the_field('position'); ?></h6>
                    <div class="b-personal__worker-name s-lineDownLeft">
                        <h4 class="s-titleDet"><?php the_title(); ?></h4>
                    </div>
                    <div><?php the_content(); ?></div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
        </div>
    </div>
</section><!--b-personal-->

<!--Content Area End-->

<?php get_footer(); ?>

