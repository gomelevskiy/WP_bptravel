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

<section class="b-article">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="b-article__main">

                    <?php $i = 0; $id=14;
                    $arg_posts =  array(
                        'orderby'      => 'modified',
                        'order'        => 'ASC',
                        'cat' => $id,
                        'showposts'=>$n
                    );
                    $recent = new WP_Query($arg_posts);

                    while($recent->have_posts()) : $recent->the_post(); ?>
                    <div class="b-article__main-author wow zoomInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-xs-2 pull-right">
                                <div class="b-blog__posts-one-author-img pull-right" style="background-image: url('<?php $author_email = get_avatar_url(); echo get_avatar_url($author_email, '70');?>');"></div>
                            </div>
                            <div class="col-xs-10 pull-right">
                                <h3><span>Автор: </span> <?php the_author() ?></h3>
                                <div class="b-article__main-author-social">
                                    <a href="<?php echo $user_vk = get_the_author_meta('user_vk'); ?>" class=""><span class="fa fa-vk"></span></a>
                                    <a href="<?php echo $user_tw = get_the_author_meta('user_tw'); ?>" class=""><span class="fa fa-twitter"></span></a>
                                    <a href='<?php echo $user_gp = get_the_author_meta('user_gp'); ?>' class=""><span class="fa fa-google-plus"></span></a>
                                </div>
                                <div class="clearfix"></div>
                                <?php the_content(); ?>
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
</section><!--b-article-->

<!--Content Area End-->

<?php get_footer(); ?>
