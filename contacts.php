<?php
/*
Template Name: Шаблон для страницы Контакты
*/
?>

<?php get_header(); ?>

<section class="b-pageHeader">
    <div class="row">
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php the_title();?></h1>
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

<div class="b-map wow zoomInUp" data-wow-delay="0.5s">
    <?php the_field('map'); ?>
</div><!--b-map-->

<section class="b-contacts s-shadow">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="b-contacts__form">
                    <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                        <h2 class="s-titleDet">Обратная связь</h2>
                    </header>
                    <p class=" wow zoomInUp" data-wow-delay="0.5s">Отправьте ваше сообщение нам если у вас есть информация, которую стоило бы нам сообщить</p>
                    <div id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                            <?php the_field('feedback',69); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="b-contacts__address">
                    <div class="b-contacts__address-hours">
                        <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">ЧАСЫ РАБОТЫ</h2>
                        <div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <h5>ОБЫЧНЫЕ ЧАСЫ</h5>
                                    <p><?php the_field('work-day',69); ?> <br/><?php the_field('free-day',69); ?></p>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <h5>ПРАЗДНИЧНЫЕ</h5>
                                    <p><?php the_field('happy-work-day',69); ?> <br/><?php the_field('happy-free-day',69); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-contacts__address-info">
                        <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">НАШИ КОНТАКТЫ</h2>
                        <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-contacts__address-info-main-item">
                                <span class="fa fa-home"></span>
                                АДРЕС
                                <p><?php the_field('adress',6); ?></p>
                            </div>
                            <div class="b-contacts__address-info-main-item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-xs-12">
                                        <span class="fa fa-phone"></span>
                                        ТЕЛЕФОН
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-xs-12">
                                        <em><?php the_field('tel_1',6); ?></em>
                                    </div>
                                </div>
                            </div>
                            <div class="b-contacts__address-info-main-item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-xs-12">
                                        <span class="fa fa-phone"></span>
                                        ТЕЛЕФОН
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-xs-12">
                                        <em><?php the_field('tel_2',6); ?></em>
                                    </div>
                                </div>
                            </div>
                            <div class="b-contacts__address-info-main-item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-xs-12">
                                        <span class="fa fa-envelope"></span>
                                        EMAIL
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-xs-12">
                                        <em><a href="mailto:<?php the_field('email',6); ?>"><?php the_field('email',6); ?></a></em>
                                    </div>
                                </div>
                            </div>
                                                      <div class="b-contacts__address-info-main-item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-xs-12">
                                        <span class="fa fa-fax"></span>
                                        ФАКС
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-xs-12">
                                        <em><a href="tel:<?php the_field('fax',6); ?>"><?php the_field('fax',6); ?></a></em>
                                    </div>
                                </div>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--b-contacts-->

<!--Content Area End-->

<?php get_footer(); ?>

