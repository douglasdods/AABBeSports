<!doctype html>
<html>
<head>
    <meta charset="UTF-8"  />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de75cbd441.js" crossorigin="anonymous"></script>

    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<header>
    <?php 
    global $wp;
    $url_atual =  parse_url(home_url( $wp->request ), PHP_URL_PATH);
    if($url_atual == '/my-account' && !is_user_logged_in()){ ?>
        <script>
            window.location = '<?php bloginfo('url'); ?>';
        </script>
    <?php } ?>
    <div class="menu fixed-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-2 menu_logo">
                    <a class="link-logo" href="<?php bloginfo('url'); ?>">
                        <img src="<?php echo AABB_THEME_URI?>/img/logo-nova2.png">

                    </a>
                </div>
                <div class="col-md-10 no-responsive">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'container_class' => 'custom-menu-class' ) );
                    ?>

                </div>
                <div class="icon-menu col-8">
                    <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <img src="<?php echo AABB_THEME_URI?>/img/icon-menu.png">
                    </a>
                </div>
                <!--<div class="col-md-5">
                </div>-->

            </div>
        </div>
    </div>
    <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div class="menu-responsive">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'container_class' => 'custom-menu-class' ) );
            ?>
        </div>
    </div>
</header>
<body <?php body_class(); ?>>