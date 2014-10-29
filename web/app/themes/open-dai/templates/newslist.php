<?php

$the_query = new WP_Query(array(
  'category_name' => 'news',
  'posts_per_page' => '7'
));

if ( $the_query->have_posts() ) : ?>
  <div class="news-list">
    <h2><?php _e('Project news', 'opendai'); ?></h2>
    <hr>
    <ol class="post-list">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li class="list-item">
        <?php get_template_part('templates/content'); ?>
        </li>
      <?php endwhile; ?>
    </ol>
  </div>
<?php
endif;

wp_reset_postdata();
