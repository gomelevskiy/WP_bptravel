<?php
/*
Template Name: Начальный экран
*/
?>

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

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" />
    <link href="<?php bloginfo('template_directory'); ?>/css/master.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
    <div class="begin-desct">
        <script type="text/javascript" src="https://russiatourism.ru/operators/widget/js/widget.js"></script>
        <!-- Russiatourism.ru Widget -->
        <div style="position: absolute; z-index: 88; left: 0; right: 0; text-align: center;" id="russiatourism_widget"></div>
        <script type="text/javascript">
            RT.Widget.build('%D0%A0%D0%A2%D0%9E+016823');
        </script>
        <div class="begin-desct__flag">
            <img src="<?php bloginfo('template_directory'); ?>/images/backgrounds/flag.png"/>
            <div class="begin-desct__col-roud-flag">Куда вы хотите<br/> направиться?</div>
        </div>
        <div class="begin-desct_box">
            <a target="_blank" href="https://k4.spb.ru/">
                <div class="begin-desct__col begin-desct__col-left">
                  <div class="begin-desct__col-roud">Из России?<span>from Russia?</span></div>
                </div>
            </a>
        </div>
        <div class="begin-desct_box">
            <a href="/main/">
                <div class="begin-desct__col begin-desct__col-right">
                    <div class="begin-desct__col-roud">В Россию?<span>in Russia?</span></div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
