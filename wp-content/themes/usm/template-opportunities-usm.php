<?php
/* Template Name: Opportunities: USM Fund Naming */

get_header();

// Show the selected capital page content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'opportunities-page' );
	endwhile;
else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
	get_template_part( 'template-parts/post/content', 'none' );
endif;
?>

<div class="usm-about">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="about-usm-fund-naming" display="content"]'); ?>
  </div>
</div>

<div class="site-width">
  USM FUND GIVING SOCIETIES STUFF GOES HERE
</div>

<div class="goals-contact yellow">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="endowment-naming-contact" display="content"]'); ?>
  </div>
</div>

<?php get_footer(); ?>