<?php
/**
 * Enable extra meta boxes in the admin
 */
function cmb_meta_boxes( $meta_boxes ) {
  $prefix = '_cmb_'; // Prefix for all fields
  $meta_boxes[] = array(
    'id'            => 'pageoptions_metabox',
    'title'         => __('Page Options', 'open-dai'),
    'pages'         => array('page'), // post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    'fields'        => array(
      array(
        'name'      => 'News category',
        'desc'      => 'Select a news category to display on this page.',
        'id'        => $prefix . 'category_id',
        'type'      => 'select',
        'options'   => cmb_cat_options()
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_meta_boxes' );

/**
 * Return categories formatted for select->options
 */
function cmb_cat_options() {

  // Create the return object
  $cat_options = array();
  $cat_options[] = array('name' => 'None', 'value' => '-1');

  // Loop through all categories
  $cats = get_categories(array('order' => 'DESC'));
  foreach ( $cats as $cat ) :

    // Get the depth of this category for the prepending string
    $cat_depth = sizeof(explode('%#%', get_category_parents($cat, false, '%#%')))-2;
    $cat_depth_str = "";
    for ($i = 0; $i<$cat_depth; $i++)
      $cat_depth_str .= "-";

    // Add this category to the return object
    $cat_options[] = array('name' => $cat_depth_str.' '.$cat->name, 'value' => $cat->term_id);

  endforeach;

  return $cat_options;
}
?>