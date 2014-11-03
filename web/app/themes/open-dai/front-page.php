<?php while (have_posts()) : the_post();
  get_template_part('templates/page', 'header');
  get_template_part('templates/content', 'page');
endwhile; ?>

<div class="row">
  <div class="col-xs-12 col-md-6"><?php get_template_part('templates/newslist'); ?></div>
  <div class="col-xs-12 col-md-6"><?php get_template_part('templates/social-embeds'); ?></div>
</div>

<div class="row">
  <div style="margin-top:40px;" class="col-xs-12 col-md-8 col-md-offset-2">
    <h3>Open-DAI newsletter</h3>
    <p>Sign up with your email address to receive updates about Open-DAI directly to your inbox</p>
    <form action="https://tinyletter.com/open-dai" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/open-dai', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true">
      <div class="form-group">
        <label for="tlemail">Your email address</label>
        <input type="email" class="form-control" name="email" id="tlemail" />
      </div>
      <input type="hidden" value="1" name="embed"/>
      <input type="submit" class="btn btn-default" value="Subscribe" />
    </form>
  </div>
</div>
