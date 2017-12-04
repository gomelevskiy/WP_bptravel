<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="robots" content="index, follow" >
    <meta name="keywords" content="" >
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />

    <title><?php bloginfo('name'); ?><?php '||' . wp_title(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
    <link href="<?php bloginfo('template_directory'); ?>/css/master.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->
<!--start container background-->
<div class="travel-background">
<!--start container main-->
<div class="container travel-container"><div class="row">

    <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-xs-6">
                    <div class="b-topBar__addr">
                        <span class="fa fa-phone"></span>
                        <span class="number-item"><a href="tel:<?php the_field('tel_1',6); ?>"><?php the_field('tel_1',6); ?></a></span>
                        <span class="number-item"><a href="tel:<?php the_field('tel_2',6); ?>"><?php the_field('tel_2',6); ?></a></span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-xs-6 b-topBar__tel-bord">
                    <div class="b-topBar__tel">
                        <span class="fa fa-at"></span>
                        <a href="mailto:<?php the_field('email',6); ?>"><?php the_field('email',6); ?></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-xs-6">
                    <div class="b-topBar__tel">
                        <span class="fa fa-map-marker"></span>
                        <a href="/kontakty/">КОНТАКТЫ</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 col-xs-6">
                    <div class="b-footer__content-social header__content-social">
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
                </div>
                <div class="col-sm-12 col-md-3 col-xs-6">
                    <a target="_blank" href="http://k4spb.ru/" class="enter-link">Войти</a>
                    <div class="b-topBar__lang">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'>ЯЗЫК</a>
                            <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-ru"></span>RU<span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu h-lang">
                                <li><a class="m-langLink dropdown-toggle" href="/main"><span class="b-topBar__lang-flag m-ru"></span>RU</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-cn"><span class="b-topBar__lang-flag m-cn"></span>CN</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-fr"><span class="b-topBar__lang-flag m-fr"></span>FR</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-de"><span class="b-topBar__lang-flag m-de"></span>DE</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-fi"><span class="b-topBar__lang-flag m-fi"></span>FI</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-it"><span class="b-topBar__lang-flag m-it"></span>IT</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-ir"><span class="b-topBar__lang-flag m-ir"></span>IR</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-es"><span class="b-topBar__lang-flag m-es"></span>ES</a></li>
                                <li><a class="m-langLink dropdown-toggle" href="/modal-in"><span class="b-topBar__lang-flag m-in"></span>IN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--b-topBar-->

        <nav class="b-nav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-4">
                        <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                            <a href="/" class="b-nav__logo-img"></a>
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-8">
                        <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'main',
                                    'container' => 'ul',
                                    'menu_class'=> 'navbar-nav-menu'
                                ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav><!--b-nav-->

        <?php wp_nav_menu( array(
            'theme_location' => 'submenu',
            'container' => 'ul',
            'menu_class'=> 'subnav'
        ) ); ?>