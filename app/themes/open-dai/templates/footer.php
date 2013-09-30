<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-xs-12">
      <?php if( !is_front_page() ) : ?><a class="btn btn-sm btn-info" href="<?php echo home_url(); ?>/">Return to start page</a><br><?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
  </div>
  <div class="row">
    <p class="col-md-6">
      The source code for this website is <a href="https://github.com/netport/open-dai.eu">available on GitHub</a>.
    </p>
    <p class="col-md-6">
      <img src="/<?php echo THEME_PATH; ?>/assets/img/flag_yellow_low.jpg">
      <img src="/<?php echo THEME_PATH; ?>/assets/img/cip_en-1.gif">
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
