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
?>