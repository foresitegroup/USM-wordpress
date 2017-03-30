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

<div class="site-width opportunities-section">
  <?php echo do_shortcode('[insert page="usm-fund-giving-societies" display="title"]'); ?>

  <div class="opp-four-col">
    <?php echo do_shortcode('[insert page="usm-fund-giving-societies" display="content"]'); ?>
  </div>

  <a href="#opportunities" class="more">I WOULD LIKE MORE INFORMATION</a>
</div>

<div class="goals-contact yellow">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="usm-fund-naming-contact" display="content"]'); ?>
  </div>
</div>

<div id="opportunities" style="display: none;">
  <?php echo do_shortcode('[insert page="usm-fund-contribution" display="content"]'); ?>
</div>

<?php get_footer(); ?>