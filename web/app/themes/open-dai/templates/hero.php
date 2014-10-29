<div class="hero jumbotron relative">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <img class="img-responsive center-block margin-top-md margin-bottom-md" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/open-dai-logo.png" alt="<?php _e('Open-DAI: Open Data Architectures and Infrastructures', 'open-dai'); ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <p class="lead text-center">
          <?php bloginfo('description'); ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <nav class="margin-top-lg margin-bottom-lg">
          <?php
            if (has_nav_menu('hero_navigation')) :
              wp_nav_menu(array('theme_location' => 'hero_navigation', 'menu_class' => 'nav nav-pills nav-justified'));
            endif;
          ?>
        </nav>
      </div>
    </div>
  </div>
  <p class="text-center absolute pin-bottom pin-left pin-right"><a class="next-link" href="#" title="More about Open-DAI">More <span class="glyphicon glyphicon-chevron-down center-block"></span></a></p>
</div>
