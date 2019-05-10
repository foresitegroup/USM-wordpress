<?php
if (is_single()) :
  the_post();
  $BlogInc = '
  <meta property="og:title" content="'.get_the_title().'" />
  <meta property="og:image" content="'.wp_get_attachment_url(get_post_thumbnail_id()).'" />
  <meta property="og:url" content="'.get_permalink().'" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="'.get_the_title().'">
  <meta name="twitter:description" content="'.get_the_excerpt().'">
  <meta name="twitter:image" content="'.wp_get_attachment_url(get_post_thumbnail_id()).'">
  ';
endif;

get_header();

if ( have_posts() ) :
  $args = array('posts_per_page' => 1, 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes');
  $argsnf = array('posts_per_page' => 1, 'order' => 'DESC', 'orderby' => 'date');

  if (is_archive()) :
    $cats = get_the_category();
    $args['category_name'] = esc_html($cats[0]->slug);
    $argsnf['category_name'] = esc_html($cats[0]->slug);
  endif;

  /* Look for Featured Post in category */
  $featured = new WP_Query($args);

  if ($featured->have_posts()):
    $featured->the_post();
  else :
    /* No Featured Post so just get the most recent */
    $nofeatured = get_posts($argsnf);
    foreach ($nofeatured as $post) : setup_postdata( $post ); endforeach;
  endif;

  $featuredID = $post->ID;

  /* Give the Featured or most recent post the hero treatment */
  ?>

  <div class="first-post overlay" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);">
    <div class="site-width">
      <?php //the_date('F j, Y', '<h3>', '</h3>'); ?> 

      <?php
      the_title('<h1>', '</h1>');

      $Action = "Read";
      $cats = get_the_category();
      if (esc_html($cats[0]->name) == "Event") $Action = "View";
      if (esc_html($cats[0]->name) == "Video") {
        $Action = "Watch";
        $TheLink = get_field("video_url");
        $AddClass = ' class="video-popup-hero"';
      } else {
        $TheLink = get_permalink();
        $AddClass = "";
      }
      $CatName = esc_html($cats[0]->name);
      ?>

      <a href="<?php echo $TheLink; ?>"<?php echo $AddClass; ?>><?php echo $Action . " " . $CatName; ?></a>
      <div class="explore">EXPLORE MORE <?php echo category_description(); ?> <i class="fa fa-chevron-down" aria-hidden="true"></i></div>

      <div id="scrollto"></div>
    </div>
  </div>
  
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.scrollTo.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".explore").click(function(e) {
        $.scrollTo("#scrollto",{duration: 500});
        e.preventDefault();
      });

      $(".filter [href]").each(function() {
        if (this.href == window.location.href) { $(this).addClass("current"); }
      });
    });
  </script>

  <div class="filter">
    <div class="site-width">
      <a href="<?php echo site_url(); ?>/campaign-news/">ALL</a>
      <?php
      if (get_category(10)->category_count > 0) echo '<a href="'.site_url().'/category/'.get_category(10)->slug.'/">'.get_category(10)->description.'</a>';
      if (get_category(9)->category_count > 0) echo '<a href="'.site_url().'/category/'.get_category(9)->slug.'/">'.get_category(9)->description.'</a>';
      if (get_category(12)->category_count > 0) echo '<a href="'.site_url().'/category/'.get_category(12)->slug.'/">'.get_category(12)->description.'</a>';
      if (get_category(13)->category_count > 0) echo '<a href="'.site_url().'/category/'.get_category(13)->slug.'/">'.get_category(13)->description.'</a>';
      ?>
    </div>
  </div>

  <?php
  echo '<div class="site-width">';

	/* Start the Loop */
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/post/content', get_post_format() );
	endwhile;
  
  echo '</div>';

  if (!is_single()) :
  	?>
		<div class="site-width index-post-loadmore">
			<a href="#" id="loadmore">LOAD MORE</a>
			<script type="text/javascript">
			  $(function () {
				  $(".index-post").slice(0, 6).show();

				  // Don't show button if fewer than max number of posts
				  if ($(".index-post:hidden").length == 0) $("#loadmore").fadeOut('fast');

				  $("#loadmore").on('click', function (e) {
				    e.preventDefault();
				    $(".index-post:hidden").slice(0, 6).slideDown();

				    // Remove button when we get to the end of the posts
				    if ($(".index-post:hidden").length == 0) $("#loadmore").fadeOut('slow');
				  });
				});
			</script>
		</div>
	  <?php
	endif;
else :
	get_template_part( 'template-parts/post/content', 'none' );
endif;
?>

<div class="blog-newsletter">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="newsletter-footer" display="content"]'); ?>
  </div>
</div>

<div class="goals-contact yellow">
	<div class="site-width">
		<p>Support Our Common Bond and share your story.</p>

		<p><a href="<?php echo home_url('/contact/'); ?>">Contact Us</a></p>
	</div>
</div>

<?php get_footer(); ?>