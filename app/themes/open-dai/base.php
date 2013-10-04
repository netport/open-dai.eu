<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <?php
    // Display the jumbotron on the front page
    if (is_front_page()) get_template_part('templates/jumbotron');
  ?>

  <div class="wrap container" role="document">
    <div class="row">
      <div class="<?php echo roots_main_class(); ?>">
        <?php dynamic_sidebar('sidebar-languages'); ?>
      </div>
    </div>
    <div class="content row">
      <div class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
    <?php
    // Display a news feed on the front page
    if (is_front_page()) :
      $the_query = new WP_Query(array(
        'category_name' => 'news',
        'posts_per_page' => '6'
      ));
      if ( $the_query->have_posts() ) :
    ?>
    <div class="row">
      <h2 class="col-xs-12 ">Project news</h2>
      <ul class="newsfeed">
      <?php
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li class="col-xs-12 newsfeed-item">
          <?php get_template_part('templates/content-title'); ?>
        </li>
      <?php endwhile; ?>
      </ul>
      <?php $news_url = (get_option( 'show_on_front' ) == 'page' ? get_permalink( get_option('page_for_posts' ) ) : bloginfo('url')); ?>
      <p><a class="btn btn-primary btn-lg" href="<?php echo $news_url; ?>"><?php _e('More news', 'open-dai'); ?></a></p>
    </div>
    <?php
    else :
      // no posts found
    endif;
    wp_reset_postdata();
  endif;
  ?>
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
