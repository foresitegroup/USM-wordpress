<?php
/* Template Name: Opportunities: Gifts Needed */

get_header();

$TotalRaisedText = "<div class=\"bluetext\">OUR COMPREHENSIVE CAMPAIGN GOAL IS $" . number_format(get_theme_mod('capital_goal') + get_theme_mod('endowment_goal') + get_theme_mod('usm_goal')) . "</div>";

// Show the selected capital page content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'opportunities-page' );
	endwhile;
else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
	get_template_part( 'template-parts/post/content', 'none' );
endif;
?>

<div class="site-width contribution-levels">
  <?php echo do_shortcode('[insert page="contribution-levels" display="content"]'); ?>
</div>

<div class="gifts-progress overlay"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(374) . ")\""; ?>>
  <div class="site-width">
    TOGETHER WE HAVE RAISED A TOTAL OF

    <div id="total-raised"><noscript>
      $<?php
      $TotalRaised = get_theme_mod('capital_raised') + get_theme_mod('endowment_raised') + get_theme_mod('usm_raised');
      echo number_format($TotalRaised);
      ?>
    </noscript></div>

    TOWARD OUR $<?php echo number_format(get_theme_mod('capital_goal') + get_theme_mod('endowment_goal') + get_theme_mod('usm_goal')); ?> CAMPAIGN GOAL.
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".gifts-progress").waypoint(function() {
      var totalRaised = new CountUp("total-raised", 0, <?php echo $TotalRaised; ?>, 0, 2, {prefix: '$'});
      totalRaised.start();
      this.destroy();
    },{offset: '75%'});
  });
</script>

<div class="goals-contact">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="gifts-contact" display="content"]'); ?>
  </div>
</div>

<div id="opportunities" style="display: none;">
  <?php echo do_shortcode('[insert page="gifts-contribution" display="content"]'); ?>
</div>

<?php get_footer(); ?>