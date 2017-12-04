<div class="b-features">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
                <ul class="b-features__items">
                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100"><a href="/category/gidy/">Гиды</a></li>
                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100"><a href="/category/transfer/">Трансферы</a></li>
                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100"><a href="/sotrudnichestvo/">Сотрудничество</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--b-features-->

<div class="b-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                    <article class="b-info__aside-article">
                        <h3>Office hours</h3>
                        <div class="b-info__aside-article-item">
                            <h6></h6>
                            <p>Mon-Fr : 10:00am - 8:00pm<br />
                                Sat, Sunday is closed</p>
                        </div>
                        <div class="b-info__aside-article-item">
                            <h6>Firma</h6>
                            <p>Mon-Fr : 10:00am - 8:00pm<br />
                                Sat, Sunday is closed</p>
                        </div>
                    </article>
                    <article class="b-info__aside-article">
                        <h3>О НАС</h3>
                        <?php
                        $id = 10;
                        $p = get_page($id);
                        $t = $p->post_title;
                        echo '<div class="cut-text">' . apply_filters('the_content', $p->post_content) . '</div>';
                        ?>
                    </article>
                    <a href="/o-nas/" class="btn m-btn">ПОДРОБНЕЕ<span class="fa fa-angle-right"></span></a>
                </aside>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="b-info__latest">
                    <h3>Экскурсии</h3>

                    <?php
                    $id = 7; // ID заданной рубрики
                    $n = 3;   // количество выводимых записей
                    $recent = new WP_Query("cat=$id&showposts=$n");
                    while($recent->have_posts()) : $recent->the_post();
                        ?>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo" style='background: url("<?php the_post_thumbnail_url(); ?>");'></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                                <p><?php the_field('article-last'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3 col-xs-6">
                <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                    <p>Контакты</p>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-map-marker"></span>
                        <em><?php the_field('adress',6); ?></em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-phone"></span>
                        <em>Телефон: <?php the_field('tel_1',6); ?></em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-phone"></span>
                        <em>Телефон: <?php the_field('tel_2',6); ?></em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-envelope"></span>
                        <em>Email: <?php the_field('email',6); ?></em>
                    </div>
                </address>
                <address class="b-info__map">
                    <a href="/kontakty/">Наши туры на карте</a>
                </address>
            </div>
        </div>
    </div>
</div><!--b-info-->

<footer class="b-footer">
    <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
    <div class="row">
        <div class="col-xs-5">
            <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                <div class="b-nav__logo"></div>
                <p>&copy; 2010 Все права защищены. Туристическая компания BP Travel.</p>
            </div>
        </div>
        <div class="col-xs-7">
            <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                <?php the_field('metrika',6); ?>
                <div class="b-footer__content-social">
                    <?php if( get_field('vk',6) ): ?>
                        <a href="<?php the_field('vk',6); ?>"><span class="fa fa-vk sq-custom"></span></a>
                    <?php endif; ?>
                    <?php if( get_field('fb',6) ): ?>
                        <a href="<?php the_field('fb',6); ?>"><span class="fa fa-facebook sq-custom"></span></a>
                    <?php endif; ?>
                    <?php if( get_field('odnoclassniki',6) ): ?>
                        <a href="<?php the_field('odnoclassniki',6); ?>"><span class="fa fa-odnoklassniki sq-custom"></span></a>
                    <?php endif; ?>
                    <?php if( get_field('tripadvisor',6) ): ?>
                        <a href="<?php the_field('tripadvisor',6); ?>"><span class="fa fa-tripadvisor sq-custom"></span></a>
                    <?php endif; ?>
                </div>
                <nav class="b-footer__content-nav">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'container' => 'ul'
                    ) ); ?>
                </nav>
            </div>
        </div>
    </div>
</footer><!--b-footer-->

<!--end container main-->
</div></div>

<!--end container background-->
</div>

<div class="modal modal-visa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="contactForm" novalidate class="s-form" style="padding: 20px;">
                <h3>Оформи приглашение онлайн</h3>
                <?php the_field('feedback',69); ?>
            </div>
        </div>
    </div>
</div>

<!--Main-->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/waypoints.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.easypiechart.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/classie.js"></script>

<!--Owl Carousel-->
<script src="<?php bloginfo('template_directory'); ?>/assets/owl-carousel/owl.carousel.min.js"></script>
<!--bxSlider-->
<script src="<?php bloginfo('template_directory'); ?>/assets/bxslider/jquery.bxslider.js"></script>
<!-- jQuery UI Slider -->
<script src="<?php bloginfo('template_directory'); ?>/assets/slider/jquery.ui-slider.js"></script>

<!--Theme-->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.smooth-scroll.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/wow.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.placeholder.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/theme.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.grab-gets.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>

</body>
</html>