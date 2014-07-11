<?php
  $navbar_classes = array();

  // Determine if the navbar is fixed or static
  if (current_theme_supports('bootstrap-fixed-navbar')) :
    $navbar_classes[] = 'navbar-fixed-top';
  else:
    $navbar_classes[] = 'navbar-static-top';
  endif;

  // Add js hook for front page jumbotron
  if (is_front_page()) {
    $navbar_classes[] = 'js-jumbotron-visible';
    $navbar_classes[] = 'js-jumbotron-overlap';
  }
?>

<header class="banner navbar navbar-default <?php echo implode(' ', $navbar_classes); ?>" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>
