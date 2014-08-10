
<?php if ( has_post_thumbnail() ) the_post_thumbnail(array(360,360)); ?>

<?php dynamic_sidebar('sidebar-primary'); ?>

<?php
  $cmb_category_id = get_post_meta( get_the_ID(), '_cmb_category_id', true );
  if (!empty($cmb_category_id) && $cmb_category_id >= 0) :
    $posts = get_posts(array(
      'category'          => $cmb_category_id,
      'posts_per_page'    => 3
    ));
    if ( !empty($posts) ) : ?>
    <div class="panel panel-default">
      <div class="panel-heading">News articles</div>
      <div class="list-group">
        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
        <a class="list-group-item" href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>">
        <h4 class="list-group-item-heading"><?php the_title(); ?></h4>
        <p class="list-group-item-text"><span class="text-muted"><?php echo mysql2date('Y-m-d', $post->post_date); ?></span>&emsp;<?php echo get_the_excerpt(); ?></p>
        </a>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
      <div class="panel-footer">
        <p><a href="<?php echo esc_url( get_category_link( $cmb_category_id ) ); ?>" title="More articles">More &rsaquo;</a></p>
      </div>
    </div>
    <?php endif; endif; ?>