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
				  $("#loadmore").on('click', function (e) {
				    e.preventDefault();
				    $(".index-post:hidden").slice(0, 6).slideDown();
				    if ($(".index-post:hidden").length == 0) {
				      $("#load").fadeOut('slow');
				    }
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
		<p>Please share your Common Bond.</p>

		<p><a href="<?php echo home_url('/contact/'); ?>">Contact Us</a></p>
	</div>
</div>

<?php get_footer(); ?>