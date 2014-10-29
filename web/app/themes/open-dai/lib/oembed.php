<?php
/**
 * OEmbed functions
 */
function embed_oembed_html($html) {
  return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'embed_oembed_html', 99, 4);
