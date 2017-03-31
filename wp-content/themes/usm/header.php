<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

  <title>
    <?php
    echo get_bloginfo('name');
    if(!is_home() || !is_front_page()) wp_title('|');
    ?>
  </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">

	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
  
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Serif:400,700|Open+Sans:300,400,600,700,800">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/jquery.mmenu.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/swipebox/swipebox.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo filemtime(get_template_directory() . "/style.css"); ?>">
  
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.mmenu.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/swipebox/jquery.swipebox.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.modal.min.js"></script>

	<script type="text/javascript">
	  var $ = jQuery.noConflict();

	  $(document).ready(function() {
	  	$("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');

	  	// Mobile menu dropdowns
      $("#my-menu").mmenu({
        "navbar": { "title": '<a href="#my-page">&times</a>' },
        "extensions": [ "pagedim-black" ]
      });
      
      $(".swipebox").swipebox();
      $(".swipebox-video").swipebox({ autoplayVideos: true, videoMaxWidth: 1200 });
      $(".swipebox-video").each(function(){
        if ($(this).data('text')) {
          $(this).append('<div class="play-text"><div class="play"></div>' + $(this).data("text") + '</div>');
        } else {
          $(this).append('<div class="play"></div>');
        }
      });

      $('a[href="#opportunities"],a[href="#newsletter"]').click(function(event) {
        event.preventDefault();
        $(this).modal({ fadeDuration: 200, fadeDelay: 0 });

        $('#newsletter').on($.modal.OPEN, function(event, modal) {
          $('body').addClass('newsletter');
        });
        $('#newsletter').on($.modal.AFTER_CLOSE, function(event, modal) {
          $('body').removeClass('newsletter');
        });
      });
		});
	</script>
</head>

	<body <?php body_class(); ?>>
		<div id="my-page"> <!-- For mobile menu -->
	    
	    <div class="sticky-spacer"></div>

	    <div class="sticky-header">
	      <div class="site-width">
	        <a href="<?php echo site_url(); ?>" class="logo">
	          Our Common Bond
	          <div>The Campaign for University School of Milwaukee</div>
	        </a>
	        
	        <a href="#my-menu" class="my-menu-toggle"></a>
	        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
	      </div>
	    </div>

			<?php if (is_front_page()) : ?>
			<div class="video-banner">
				<div class="site-width home-menu">
					<?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
			    <?php echo get_theme_mod('usm_phone_number'); ?>
			  </div>

				<video playsinline autoplay muted loop poster="<?php echo get_header_image(); ?>">
			    <source src="<?php echo get_header_video_url(); ?>" type="video/mp4">
			  </video>

			  <div class="video-text">
			  	<?php echo get_theme_mod('usm_header_text'); ?>
			  </div>

			  <img src="<?php echo get_template_directory_uri(); ?>/images/home-video-triangle.png" alt="" class="video-triangle">
			  <img src="<?php echo get_template_directory_uri(); ?>/images/logo-badge.png" alt="" class="video-badge">
			</div>
			<?php endif; ?>