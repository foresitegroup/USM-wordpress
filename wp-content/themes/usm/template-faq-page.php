<?php
/* Template Name: FAQ */

get_header();
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("dd").hide();
    
    $("dl dt").append('<a href="#"></a>');
      
    $("dl dt a").click(function(){
      // $("dd").slideUp();
      $(this).parent().parent().find("dd").slideToggle();
      $(this).toggleClass("open");
      return false;
    });
  });
</script>

<div class="site-width faq">
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

<div class="about-contact faq-contact">
  <div class="site-width">
    <?php echo do_shortcode('[insert page="faq-contact" display="content"]'); ?>
  </div>
</div>

<?php get_footer(); ?>