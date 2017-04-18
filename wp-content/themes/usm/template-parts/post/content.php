<?php
/**
 * Template part for displaying posts
 */
global $featuredID;
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.mm-blog').addClass('current_page_item');
  });
</script>

<?php
if (!is_single()) :
	if ($post->ID != $featuredID) :
	  /* ALL THE OTHER PAST POSTS BESIDES THE HERO */
    $cats = get_the_category();
    if (esc_html($cats[0]->name) == "Video") {
      $TheLink = get_field("video_url");
      $AddClass = " video-popup";
      $TheContent = "";
    } else {
      $TheLink = get_permalink();
      $AddClass = "";
      $TheContent = get_the_excerpt();
    }
	  ?>
	  <a href="<?php echo $TheLink; ?>" class="index-post<?php echo $AddClass; ?>" style="display: none;">
	  	<div class="index-post-image" style="<?php echo (wp_get_attachment_url(get_post_thumbnail_id()) != "") ? "background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ")" : "padding-top: 0"; ?>"></div>
      
      <div class="index-post-content">
		  	<h4><?php echo esc_html($cats[0]->name); ?></h4>

		  	<?php the_title('<h2>', '</h2>'); ?>

		  	<?php echo $TheContent; ?>

		  	<h3><?php echo get_the_date('F j, Y'); ?></h3>
		  </div>
	  </a>
	<?php
	endif;
else :
	/* A SINGLE POST */
  ?>
  </div>

  <div class="single-post-banner overlay" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);"></div>

  <div class="site-width">

  <div class="single-post-content">
  	<?php the_date('F j, Y', '<div class="single-post-date">', '</div>'); ?> 

  	<?php the_title('<h1 class="site-width-small single-post-title">', '</h1>'); ?>

		<?php the_content(); ?>
    
    <div class="single-post-share">
    	SHARE THIS <?php $cats = get_the_category(); echo strtoupper(esc_html($cats[0]->name)); ?><br>
    	<br>

			<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&picture=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" target="new" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="http://www.twitter.com/share?url=<?php echo get_permalink(); ?>&text=<?php echo str_replace(' ', '+', the_title('','',false)); ?>" target="new" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="http://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="new" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<a href="mailto:?subject=<?php echo str_replace(' ', '%20', the_title('','',false)); ?>&body=<?php echo get_permalink(); ?>" class="email"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></a>
		</div>
	</div>
  
  </div>

  <div class="single-post-nav">
  	<div class="site-width">
			<?php
		  // Previous/next post navigation.
		  $next_post = get_next_post();
		  $prev_post = get_previous_post();
      ?>

	  <script type="text/javascript">
      $(document).ready(function() {
      	$('.nav-links .next').append("<span></span>");
      	$('.nav-links .prev').append("<span></span>");
      });
    </script>
    
    <?php
			FG_post_pagination(array(
				'next_text' => __($next_post->post_title),
				'prev_text' => __($prev_post->post_title)
			));
			?>
	  </div>
	</div>
<?php endif; ?>