<?php
//** [nav menu="" class=""]
function opendai_nav_shortcode( $atts ) {

  // Attribute defaults
  $atts = shortcode_atts( array(
    'menu'                => null,
    'class'               => 'nav nav-pills nav-justified margin-top-xs margin-bottom-sm',
  ), $atts, 'nav' );


  // Generate output
  ob_start();
  if ( $atts['menu'] !== null ) :
    wp_nav_menu(
      array(
        'menu'        => $atts['menu'],
        'menu_class'  => $atts['class']
      )
    );
  endif;

  // Return above output
  return ob_get_clean();
}
add_shortcode( 'nav', 'opendai_nav_shortcode' );

//** [icon name=""]
function opendai_icon_shortcode( $atts ) {

  // Attribute defaults
  $atts = shortcode_atts( array(
    'name'           => null
  ), $atts, 'icon' );

  // Set the global post variable for setup post data below
  global $post;

  // Generate output
  ob_start();
  if ( !empty($atts['name']) ) : ?>
    <span class="glyphicon glyphicon-<?php echo $atts['name']; ?>"></span>
  <?php endif;

  // Return above output
  return ob_get_clean();
}
add_shortcode( 'icon', 'opendai_icon_shortcode' );
