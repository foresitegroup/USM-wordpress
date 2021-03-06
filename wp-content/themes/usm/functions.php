<?php
// We want Featured Images on Pages and Posts
add_theme_support( 'post-thumbnails' );

// Define menus
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'goals-menu' => __( 'Goals Menu' ),
      'opportunities-menu' => __( 'Opportunities Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Set length of blog index excerpt
function wpdocs_custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Add "..." to end of excerpt
function change_excerpt_more() {
  function new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');
}
add_action('after_setup_theme', 'change_excerpt_more');

// Break excerpt at sentence end
// function end_with_sentence( $excerpt ) {
//   $allowed_ends = array('.', '!', '?', '...');
//   $number_sentences = 2;
//   $excerpt_chunk = $excerpt;

//   for($i = 0; $i < $number_sentences; $i++){
//     $lowest_sentence_end[$i] = 100000000000000000;
//     foreach($allowed_ends as $allowed_end) {
//       $sentence_end = strpos( $excerpt_chunk, $allowed_end);
//       if ($sentence_end !== false && $sentence_end < $lowest_sentence_end[$i]) {
//         $lowest_sentence_end[$i] = $sentence_end + strlen( $allowed_end );
//       }
//       $sentence_end = false;
//     }

//     $sentences[$i] = substr( $excerpt_chunk, 0, $lowest_sentence_end[$i]);
//     $excerpt_chunk = substr( $excerpt_chunk, $lowest_sentence_end[$i]);
//   }

//   return implode('', $sentences);
// }
// add_filter('get_the_excerpt', 'end_with_sentence');

/* Video header stuff */
function custom_theme_features()  {
  $header_args = array(
    'width'                  => 1280,
    'height'                 => 720,
    'flex-width'             => true,
    'flex-height'            => true,
    'video'                  => true,
    'video-active-callback'  => ''
  );
  add_theme_support( 'custom-header', $header_args );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

/* Customizer */
function usm_customize_register( $wp_customize ) {
  $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('custom_css');
  
  /* Header Media Text */
  $wp_customize->add_setting('usm_header_text');
  $wp_customize->add_control('usm_header_text', array(
    'label'   => __('Header Text', 'usm_header'),
    'section' => 'header_image',
    'type'    => 'textarea'
  ));

  /* Contact Info */
  $wp_customize->add_section( 'usm_contact_info', array(
    'title'    => __( 'Contact Info', 'usm' ),
    'priority' => 110
  ));

  $wp_customize->add_setting('usm_phone_number', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_phone_number', array(
    'label'   => __('Phone', 'contact'),
    'section' => 'usm_contact_info',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_address', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_address', array(
    'label'   => __('Address', 'contact'),
    'section' => 'usm_contact_info',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_city', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_city', array(
    'label'   => __('City', 'contact'),
    'section' => 'usm_contact_info',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_state', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_state', array(
    'label'   => __('State', 'contact'),
    'section' => 'usm_contact_info',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_zip', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_zip', array(
    'label'   => __('Zip Code', 'contact'),
    'section' => 'usm_contact_info',
    'type'    => 'text'
  ));

  /* Social Media */
  $wp_customize->add_section( 'usm_social_media', array(
    'title'    => __( 'Social Media', 'usm' ),
    'priority' => 110
  ));

  $wp_customize->add_setting('usm_facebook', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_facebook', array(
    'label'   => __('Facebook', 'contact'),
    'section' => 'usm_social_media',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_twitter', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_twitter', array(
    'label'   => __('Twitter', 'contact'),
    'section' => 'usm_social_media',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_instagram', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_instagram', array(
    'label'   => __('Instagram', 'contact'),
    'section' => 'usm_social_media',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_youtube', array('sanitize_callback' => 'sanitize_text_field'));
  $wp_customize->add_control( 'usm_youtube', array(
    'label'   => __('YouTube', 'contact'),
    'section' => 'usm_social_media',
    'type'    => 'text'
  ));
  
  /* Goals / Raised */
  $wp_customize->add_section( 'usm_goals_raised', array(
    'title'    => __( 'Goals / Raised', 'usm' ),
    'priority' => 120
  ));
  
  $wp_customize->add_setting('capital_raised', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'capital_raised', array(
    'label'   => __('Capital Raised', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('capital_goal', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'capital_goal', array(
    'label'   => __('Capital Goal', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('capital_home_text');
  $wp_customize->add_control( 'capital_home_text', array(
    'label'   => __('Capital Home Text', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'textarea'
  ));

  $wp_customize->add_setting('endowment_raised', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'endowment_raised', array(
    'label'   => __('Endowment Raised', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('endowment_goal', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'endowment_goal', array(
    'label'   => __('Endowment Goal', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('endowment_home_text');
  $wp_customize->add_control( 'endowment_home_text', array(
    'label'   => __('Endowment Home Text', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'textarea'
  ));

  $wp_customize->add_setting('usm_raised', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'usm_raised', array(
    'label'   => __('USM Fund Raised', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_goal', array('sanitize_callback' => 'usm_sanitize_num'));
  $wp_customize->add_control( 'usm_goal', array(
    'label'   => __('USM Fund Goal', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('usm_fund_home_text');
  $wp_customize->add_control( 'usm_fund_home_text', array(
    'label'   => __('USM Fund Home Text', 'goals'),
    'section' => 'usm_goals_raised',
    'type'    => 'textarea'
  ));

  /* Capital Page Options */
  $wp_customize->add_section( 'usm_capital_page_options', array(
    'title'    => __( 'Capital Page Sorting', 'goals' ),
    'priority' => 130,
  ));

  /* Filter number of capital page sections. */
  $num_sections = apply_filters( 'usm_capital_page_sections', 4 );

  /* Create a setting and control for each of the sections available in the theme. */
  for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
    $wp_customize->add_setting( 'panel_' . $i, array(
      'default'           => false,
      'sanitize_callback' => 'absint',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'panel_' . $i, array(
      'label'          => sprintf( __( 'Capital Page Section %d Content', 'usm' ), $i ),
      'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Empty sections will not be displayed.', 'usm' ) ),
      'section'        => 'usm_capital_page_options',
      'type'           => 'dropdown-pages',
      'allow_addition' => true
    ) );

    $wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
      'selector'            => '#panel' . $i,
      'render_callback'     => 'usm_capital_page_section',
      'container_inclusive' => true,
    ) );
  }
}
add_action( 'customize_register', 'usm_customize_register' );
remove_action( 'customize_register', 'shiftnav_register_customizers' );

function usm_capital_page_section( $partial = null, $id = 0 ) {
  if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
    // Find out the id and set it up during a selective refresh.
    global $usmcounter;
    $id = str_replace( 'panel_', '', $partial->id );
    $usmcounter = $id;
  }

  global $post; // Modify the global post object before setting up post data.
  if ( get_theme_mod( 'panel_' . $id ) ) {
    global $post;
    $post = get_post( get_theme_mod( 'panel_' . $id ) );
    setup_postdata( $post );
    set_query_var( 'panel', $id );

    get_template_part( 'template-parts/page/content', 'capital-page-panels' );

    wp_reset_postdata();
  }
}

function usm_sanitize_num($input) {
  $input = preg_replace('/[^0-9]/s', '', $input);
  return $input;
}

/* Remove visual editor */
add_filter( 'user_can_richedit' , '__return_false', 50 );

/* 
 * Change WordPress default gallery output
 * http://wpsites.org/?p=10510/
 */
add_filter('post_gallery', 'FG_post_gallery', 10, 2);
function FG_post_gallery($output, $attr) {
  global $post;

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) unset($attr['orderby']);
  }

  extract(shortcode_atts(array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => $post->ID,
    'itemtag' => 'dl',
    'icontag' => 'dt',
    'captiontag' => 'dd',
    'columns' => 3,
    'size' => 'thumbnail',
    'include' => '',
    'exclude' => ''
  ), $attr));

  $id = intval($id);
  if ('RAND' == $order) $orderby = 'none';

  if (!empty($include)) {
    $include = preg_replace('/[^0-9,]+/', '', $include);
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  }

  if (empty($attachments)) return '';

  // Here's your actual output, you may customize it to your need
  $output = "<div class=\"single-post-gallery gallery-columns-" . $columns . " cf\">\n";

  // Now you loop through each attachment
  foreach ($attachments as $id => $attachment) {
    $img = wp_get_attachment_image_src($id, 'full');

    $output .= "<a href=\"" . $img[0] . "\" rel=\"sb" . $columns . "\" style=\"background-image: url(" . $img[0] . ");\"></a>\n";
  }

  $output .= "</div>\n";

  return $output;
}


add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Wrap video embed code in DIV for responsive goodness
add_filter( 'embed_oembed_html', 'my_oembed_filter', 10, 4 ) ;
function my_oembed_filter($html, $url, $attr, $post_ID) {
  $return = '<div class="video">'.$html.'</div>';
  return $return;
}

// Format the single post pagination
function FG_post_pagination($args = array()) {
  $prev_link = (get_previous_post_link()) ? get_previous_post_link('%link', $args['prev_text']) : '<a class="prev home-link" href="'.get_permalink(get_option('page_for_posts')).'">BACK TO STORIES AND PROGRESS</a>';
  $next_link = (get_next_post_link()) ? get_next_post_link('%link', $args['next_text']) : '<a class="next home-link" href="'.get_permalink(get_option('page_for_posts')).'">BACK TO STORIES AND PROGRESS</a>';

  // Only add markup if there's somewhere to navigate to.
  if ( $prev_link || $next_link ) {
    echo _navigation_markup($prev_link . $next_link, ' ', ' ');
  }
}
add_filter('previous_post_link', 'post_link_attributes_prev');
add_filter('next_post_link', 'post_link_attributes_next');
function post_link_attributes_prev($output) { return str_replace('<a href=', '<a class="prev" href=', $output); }
function post_link_attributes_next($output) { return str_replace('<a href=', '<a class="next" href=', $output); }

// Remove p tags from category description
remove_filter('term_description','wpautop');


// Add Featured Post checkbox to post admin page
function fg_custom_meta() {
  add_meta_box('fg_meta', __('Featured Post', 'fg-textdomain'), 'fg_meta_callback', 'post');
}
function fg_meta_callback( $post ) {
  $featured = get_post_meta( $post->ID );
  ?>
  <p>
    <div class="fg-row-content">
      <label for="featured-checkbox">
        <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="Yes" <?php if (isset($featured['featured-checkbox'])) checked($featured['featured-checkbox'][0], 'Yes'); ?> />
        <?php _e('Make this the featured post for this category', 'fg-textdomain')?>
      </label>
    </div>
  </p>
  <?php
}
add_action( 'add_meta_boxes', 'fg_custom_meta' );

// Saves the Featured Post input
function fg_meta_save( $post_id ) {
  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'fg_nonce' ] ) && wp_verify_nonce( $_POST[ 'fg_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

  // Checks for input and saves
  $fp_input = (isset($_POST[ 'featured-checkbox' ])) ? 'Yes' : '';
  update_post_meta( $post_id, 'featured-checkbox', $fp_input);
}
add_action( 'save_post', 'fg_meta_save' );

// Add Featured Post column to admin post list
add_filter( 'manage_edit-post_columns', 'admin_post_header_columns', 10, 1);
add_action( 'manage_posts_custom_column', 'admin_post_data_row', 10, 2);
function admin_post_header_columns($columns) {
  if (!isset($columns['featured-checkbox'])) $columns['featured-checkbox'] = "Featured";
  unset($columns['comments']); // Remove Comments column while we're at it
  return $columns;
}
function admin_post_data_row($column_name, $post_id) {
  switch($column_name) {
    case 'featured-checkbox':    
      $featuredpost = get_post_meta($post_id, 'featured-checkbox', true);
      if ($featuredpost) echo $featuredpost;
      break;    
    default:
      break;
  }
}

// Style the Featured Post admin column
add_action('admin_head', 'my_admin_styles');
function my_admin_styles() {
  echo '<style>
    .fixed .column-featured-checkbox { width: 10%; }
  </style>';
}



add_filter('admin_post_thumbnail_html', 'add_featured_image_display_settings', 10, 2);
function add_featured_image_display_settings($content, $post) {
  if(get_page_template_slug() == 'template-usm-fund-donors.php') {
    $fic = get_post_meta($post, "featured_image_caption", true);
    
    $fi_caption = '<strong>Text Overlay</strong><br>';
    $fi_caption .= '<input type="text" name="featured_image_caption" value="';
    if ($fic != "") $fi_caption .= $fic;
    $fi_caption .= '" style="width: 100%;">';

    return $content .= $fi_caption;
  } else {
    return $content;
  }
}

add_action('save_post', 'save_featured_image_display_settings', 10, 3);
function save_featured_image_display_settings($post_id, $post, $update) {
  if (get_page_template_slug() != 'template-usm-fund-donors.php') return;

  if (!empty($_POST['featured_image_caption'])) {
    update_post_meta($post_id, 'featured_image_caption', $_POST['featured_image_caption']);
  } else {
    delete_post_meta($post_id, 'featured_image_caption');
  }
}

add_action('edit_form_after_title', 'usm_fund_donors');
function usm_fund_donors() {
  global $post;

  if(get_page_template_slug() == 'template-usm-fund-donors.php') {
    echo '<style>
      .ufd-headers { margin: 0.5em 0; padding: 3px 8px; font-size: 1.2em; line-height: 100%; height: 1.7em; width: 100%; outline: 0; }
    </style>';

    echo '<input type="text" name="ufd_list_header" placeholder="Enter list header here" value="';
    if ($post->ufd_list_header != "") echo $post->ufd_list_header;
    echo '" class="ufd-headers">';

    echo '<input type="text" name="ufd_list_subheader" placeholder="Enter list subheader here" value="';
    if ($post->ufd_list_subheader != "") echo $post->ufd_list_subheader;
    echo '" class="ufd-headers">';

    echo '<input type="text" name="ufd_list_asof" placeholder="Enter as of date here" value="';
    if ($post->ufd_list_asof != "") echo $post->ufd_list_asof;
    echo '" class="ufd-headers">';
  }
}

add_action('save_post', 'save_ufd', 10, 3);
function save_ufd($post_id, $post, $update) {
  if (get_page_template_slug() != 'template-usm-fund-donors.php') return;

  if (!empty($_POST['ufd_list_header'])) {
    update_post_meta($post_id, 'ufd_list_header', $_POST['ufd_list_header']);
  } else {
    delete_post_meta($post_id, 'ufd_list_header');
  }

  if (!empty($_POST['ufd_list_subheader'])) {
    update_post_meta($post_id, 'ufd_list_subheader', $_POST['ufd_list_subheader']);
  } else {
    delete_post_meta($post_id, 'ufd_list_subheader');
  }

  if (!empty($_POST['ufd_list_asof'])) {
    update_post_meta($post_id, 'ufd_list_asof', $_POST['ufd_list_asof']);
  } else {
    delete_post_meta($post_id, 'ufd_list_asof');
  }
}
?>