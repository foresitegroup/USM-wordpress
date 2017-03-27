<?php
/* Template Name: Capital */

get_header();

$usmgoal = "capital";
$usmgoal_pretty = "Capital";
$usmgoal_color = "#A1B434";

// Show the selected capital page content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'goals-page' );
	endwhile;
else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
	get_template_part( 'template-parts/post/content', 'none' );
endif;

$num_sections = apply_filters( 'usm_capital_page_sections', 4 );
global $usmcounter;

// Create a setting and control for each of the sections available in the theme.
for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
	$usmcounter = $i;
	usm_capital_page_section( null, $i );
}
?>

<div class="site-width goals-contact">
  <?php echo do_shortcode('[insert page="capital-contact" display="content"]'); ?>
</div>

<div class="goals-footer overlay"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id(228)) . ")\""; ?>>
  <div class="site-width">
    <?php echo do_shortcode('[insert page="228" display="content"]'); ?>
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".goals-footer").waypoint(function() {
      $('.goals-footer .one-fourth:nth-of-type(1) H2').attr('id', 'col1');
      var col1num = $('.goals-footer .one-fourth:nth-of-type(1) H2').text();
      col1num = col1num.replace(/\D/g,'');

      $('.goals-footer .one-fourth:nth-of-type(2) H2').attr('id', 'col2');
      var col2num = $('.goals-footer .one-fourth:nth-of-type(2) H2').text();

      $('.goals-footer .one-fourth:nth-of-type(3) H2').attr('id', 'col3');
      var col3num = $('.goals-footer .one-fourth:nth-of-type(3) H2').text();

      $('.goals-footer .one-fourth:nth-of-type(4) H2').attr('id', 'col4');
      var col4num = $('.goals-footer .one-fourth:nth-of-type(4) H2').text();
      col4num = col4num.replace(/\D/g,'');

      var col1up = new CountUp("col1", 0, col1num, 0, 2, {suffix: '+'});
      var col2up = new CountUp("col2", 0, col2num, 0, 2);
      var col3up = new CountUp("col3", 0, col3num, 0, 2);
      var col4up = new CountUp("col4", 0, col4num, 0, 2, {suffix: '+'});

      col1up.start();
      col2up.start();
      col3up.start();
      col4up.start();

      this.destroy();
    },{offset: '80%'});
  });
</script>

<?php get_footer(); ?>