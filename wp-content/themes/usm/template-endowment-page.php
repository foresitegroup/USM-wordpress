<?php
/* Template Name: Endowment */

get_header();

$usmgoal = "endowment";
$usmgoal_pretty = "Endowment";
$usmgoal_color = "#EDA50B";

// Show the selected capital page content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'goals-page' );
	endwhile;
else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
	get_template_part( 'template-parts/post/content', 'none' );
endif;
?>

<div class="site-width">
  <?php echo do_shortcode('[insert page="endowment-support-faculty" display="content"]'); ?>
</div>

<hr>

<div class="site-width text-first">
  <?php echo do_shortcode('[insert page="endowment-support-scholarships" display="content"]'); ?>
</div>

<hr>

<div class="site-width goals-contact">
  <?php echo do_shortcode('[insert page="endowment-contact" display="content"]'); ?>
</div>

<div class="goals-footer overlay"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id(286)) . ")\""; ?>>
  <div class="site-width">
    <?php echo do_shortcode('[insert page="286" display="content"]'); ?>
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
<script type="text/javascript">
  // $(document).ready(function() {
  //   $(".goals-footer").waypoint(function() {
  //     $('.goals-footer .one-fourth:nth-of-type(1) H2').attr('id', 'col1');
  //     var col1num = $('.goals-footer .one-fourth:nth-of-type(1) H2').text();

  //     $('.goals-footer .one-fourth:nth-of-type(2) H2 SPAN').attr('id', 'col2');
  //     var col2num = $('.goals-footer .one-fourth:nth-of-type(2) H2 SPAN').text();

  //     $('.goals-footer .one-fourth:nth-of-type(3) H2').attr('id', 'col3');
  //     var col3num = $('.goals-footer .one-fourth:nth-of-type(3) H2').text();

  //     var col1up = new CountUp("col1", 0, col1num, 0, 2);
  //     var col2up = new CountUp("col2", 0, col2num, 0, 2);
  //     var col3up = new CountUp("col3", 0, col3num, 0, 2);

  //     col1up.start();
  //     col2up.start();
  //     col3up.start();

  //     this.destroy();
  //   },{offset: '80%'});
  // });
</script>

<?php get_footer(); ?>