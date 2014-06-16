<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
          // sorta works, but must hardcode links in admin panel > menus for header-menu-alt
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