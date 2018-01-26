<?php get_header(); ?>
<!--
<section class="b-feedback" style="display: none" id="feedback">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="b-contacts__form">
                <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                    <h2 class="s-titleDet">Форма заявки</h2>
                </header>
                <p class=" wow zoomInUp" data-wow-delay="0.5s">Отправьте ваше сообщение нам если у вас есть информация, которую стоило бы нам сообщить</p>
                <div id="success"></div>
                <form id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                    <div class="s-relative">
                        <select name="user-topic" id="user-topic" class="m-select">
                            <option value="Not select">Дата</option>
                            <option value="Topic 1">TOPIC 1</option>
                            <option value="Topic 2">TOPIC 2</option>
                            <option value="Topic 3">TOPIC 3</option>
                            <option value="Topic 4">TOPIC 4</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>
                    <input type="text" placeholder="Ваше имя" value="" name="user-name" id="user-name" />
                    <input type="text" placeholder="Телефон" value="" name="user-phone" id="user-phone" />
                    <input type="text" placeholder="Электронная почта" value="" name="user-email" id="user-email" />
                    <textarea id="user-message" name="user-message" placeholder="Комментарий"></textarea>
                    <button type="submit" class="btn m-btn">Оформить<span class="fa fa-angle-right"></span></button>
                    <?php the_field('feedback'); ?>
                </form>
            </div>
        </div>
    </div>
</section>
-->
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

<section class="b-best">
    <div class="row">
        <?php if( has_post_thumbnail() ): ?>
        <div class="col-sm-6 col-xs-12">
            <div class="b-best__info">
                <?php if( get_field('article-last') ): ?>
                <header class="s-lineDownLeft b-best__info-head">
                    <h2 class="wow zoomInUp" data-wow-delay="0.5s"><?php the_field('article-last'); ?></h2>
                </header>
                <?php endif; ?>
                <div class="b-best__info-head wow zoomInUp" data-wow-delay="0.5s">
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
						<style>.b-best__info p{margin: 0 0 0 0}</style>
                        <?php the_content(); ?>

                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="<?php the_post_thumbnail_url('thumb'); ?>" />
        </div>
        <?php else: ?>
            <div class="col-sm-11 col-xs-12">
                <div class="b-best__info">
                    <?php if( get_field('article-last') ): ?>
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s"><?php the_field('article-last'); ?></h2>
                        </header>
                    <?php endif; ?>
                    <div class="b-best__info-head wow zoomInUp" data-wow-delay="0.5s">
                        <?php if (have_posts()) : while (have_posts()) : the_post();?>

							<style>.b-best__info p{margin: 0 0 0 0}</style>
                            <?php the_content(); ?>

                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section><!--b-best-->

<!--Content Area End-->

<?php get_footer(); ?>
