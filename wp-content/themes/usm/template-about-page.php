<?php
/* Template Name: About */

get_header();
?>

<div class="about-header">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="about-header" display="content"]'); ?>
  </div>
</div>

<div class="site-width about-content">
  <?php
  if ( have_posts() ) :
  	while ( have_posts() ) : the_post();
  		get_template_part( 'template-parts/page/content', 'page' );
  	endwhile;
  else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
  	get_template_part( 'template-parts/post/content', 'none' );
  endif;
  ?>
</div>

<div class="about-gift">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="about-gift" display="content"]'); ?>
  </div>
</div>

<div class="about-cabinet-header overlay"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id(327)) . ")\""; ?>>
  <div class="site-width">
    <?php echo do_shortcode('[insert page="327" display="title"]'); ?>
  </div>
</div>

<div class="about-cabinet">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="327" display="content"]'); ?>
  </div>
</div>

<div class="about-contact">
  <?php echo do_shortcode('[insert page="about-contact" display="content"]'); ?>
</div>

<?php get_footer(); ?>