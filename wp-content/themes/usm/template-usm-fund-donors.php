<?php
/* Template Name: USM Fund Donors */

get_header();
?>

<?php if (has_post_thumbnail()) { ?>
  <div class="usm-fund-donors-header overlay"<?php if (has_post_thumbnail()) echo ' style="background-image: url('.get_the_post_thumbnail_url().');"' ?>>
    <?php if ($post->featured_image_caption != "") echo '<h1>'.$post->featured_image_caption.'</h1>' ?>
  </div>
<?php } ?>

<div class="site-width usm-fund-donors">
  <?php if ($post->ufd_list_header != "") echo '<h2>'.$post->ufd_list_header.'</h2>' ?>

  <?php if ($post->ufd_list_subheader != "") echo '<div class="thanks">'.$post->ufd_list_subheader.'</div>' ?>

  <div class="two-col">
    <?php
    if (have_posts()) :
    	while (have_posts()) : the_post();
        remove_filter('the_content', 'wpautop');
        add_filter('the_content', 'nl2br');
    		the_content();
    	endwhile;
    endif;
    ?>
  </div>

  <?php if ($post->ufd_list_asof != "") echo '<em class="asof">As of '.$post->ufd_list_asof.'</em>' ?>
</div>

<?php get_footer(); ?>