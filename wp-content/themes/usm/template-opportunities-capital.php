<?php
/* Template Name: Opportunities: Capital Naming */

get_header();

// Show the selected capital page content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'opportunities-page' );
	endwhile;
else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
	get_template_part( 'template-parts/post/content', 'none' );
endif;

$MoreInfo = '<a href="#opportunities" class="more">I WOULD LIKE MORE INFORMATION</a><div class="keepscrolling">SEE MORE OPPORTUNITIES</div>';
?>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="pac-theatre-and-lobby" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="pac-theatre-and-lobby" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="pac-theatre-support-addition" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="pac-theatre-support-addition" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="commons-upper-school-entrance" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="commons-upper-school-entrance" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="innovation-center" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="innovation-center" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="lower-school-community-room" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="lower-school-community-room" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="opportunities-section-title">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="quadracci-lodge-area" display="title"]'); ?>
  </div>
</div>
<div class="site-width opportunities-section">
  <div class="opp-three-col">
    <?php echo do_shortcode('[insert page="quadracci-lodge-area" display="content"]'); ?>
  </div>

  <?php echo $MoreInfo; ?>
</div>

<div class="goals-contact yellow">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="capital-naming-contact" display="content"]'); ?>
  </div>
</div>

<div id="opportunities" style="display: none;">
  <?php echo do_shortcode('[insert page="capital-contribution" display="content"]'); ?>
</div>

<?php get_footer(); ?>