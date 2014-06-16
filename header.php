<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">

    <!-- bug: 10000003 -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/images/favicons/mstile-144x144.png">

    <title>
      <?php wp_title('|', true, 'right'); ?>
      <?php bloginfo('name'); ?>
    </title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <div class="navbar navbar-inverse navbar-fixed-top scrollup" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <div class="navbar-collapse collapse">
          <?php

            // Bug 1
            // must hardcode links in admin panel > menus for header-menu-alt
            $menu_slug;
            $theme_location;
            if ( is_page_template( 'page-single-page-site.php' ) ) {
              $menu_slug = 'header-menu';
            } else {
              $menu_slug = 'header-menu-alt';
              $theme_location = $menu_slug;
            }
            $args = array(
                'menu' => $menu_slug,
                'menu_class' => 'nav navbar-nav',
                'container' => 'false',
                'theme_location' => $theme_location
              );
            wp_nav_menu($args);
          ?>
          <button class="btn btn-default btn-xs btn-contact" data-toggle="modal" data-target="#contact-form">
            Contact
          </button>
        </div><!--/.navbar-collapse -->
      </div>
    </div>


