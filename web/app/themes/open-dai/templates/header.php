<?php
  $navbar_classes = array('navbar', 'navbar-default', 'navbar-fixed-top');

  // Add js hook for front page hero
  if (is_front_page()) {
    $navbar_classes[] = 'js-hero-visible';
    $navbar_classes[] = 'js-hero-overlap';
  }
?>

<header class="banner <?php echo implode(' ', $navbar_classes); ?>" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>/"><?php bloginfo('name'); ?></a>
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
