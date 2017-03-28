<?php
/* Template Name: Contact */

get_header();
?>

<div class="site-width contact">
  <?php
  if ( have_posts() ) :
  	while ( have_posts() ) : the_post();
      the_title('<h2>', '</h2>');
  		get_template_part( 'template-parts/page/content', 'page' );
  	endwhile;
  else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
  	get_template_part( 'template-parts/post/content', 'none' );
  endif;
  ?>
</div>

<div class="contact-footer overlay"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id(360)) . ")\""; ?>>
  <div class="site-width-small">
    <?php echo do_shortcode('[insert page="360" display="content"]'); ?>
  </div>
</div>

<?php get_footer(); ?>