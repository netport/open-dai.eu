<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p class="col-sm-6">
        <?php if( !is_front_page() ) : ?><a href="<?php echo home_url(); ?>/">Return to start page</a><br><?php endif; ?>
        The source code for this website is <a href="https://github.com/netport/open-dai.eu">available on GitHub</a>.
      </p>
      <p class="col-sm-6">
        <img src="/<?php echo THEME_PATH; ?>/assets/img/flag_yellow_low.jpg">
        <img src="/<?php echo THEME_PATH; ?>/assets/img/cip_en-1.gif">
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
