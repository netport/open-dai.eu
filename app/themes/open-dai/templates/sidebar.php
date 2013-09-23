<?php dynamic_sidebar('sidebar-primary'); ?>

<?php
  $cmb_category_id = get_post_meta( get_the_ID(), '_cmb_category_id', true );
  if ($cmb_category_id > -1) :
    $posts = get_posts(array(
      'category'          => $cmb_category_id,
      'posts_per_page'    => 5
    ));
    if ( !empty($posts) ) :
      echo '<ul class="list-unstyled">';
      echo '<h2>Related news</h2>';
      foreach($posts as $post) :
        echo '<li><span class="pubdate">' . mysql2date('Y-m-d', $post->post_date) . '</span> <a href="' . get_permalink($post->ID) . '" title="Read ' . $post->post_title . '">' . $post->post_title . '</a></li>';
      endforeach;
      echo '</ul>';
    endif;
  endif;
?>
