<?php
get_header();

if ( have_posts() ) :
	$PostCount = 1;
  
  echo '<div class="site-width">';

	/* Start the Loop */
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/post/content', get_post_format() );

    $PostCount++;
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

<div class="goals-contact yellow">
	<div class="site-width">
		<p>Support Our Common Bond and share your story.</p>

		<p><a href="<?php echo home_url('/contact/'); ?>">Contact Us</a></p>
	</div>
</div>

<?php get_footer(); ?>