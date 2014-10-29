<?php while (have_posts()) : the_post();
  get_template_part('templates/page', 'header');
  get_template_part('templates/content', 'page');
endwhile; ?>

<div class="row">
  <div class="col-md-6"><?php get_template_part('templates/newslist'); ?></div>
  <div class="col-md-6"><?php get_template_part('templates/social-embeds'); ?></div>
</div>
