<?php
/**
 * Template part for displaying posts
 */
global $PostCount;

if (!is_single()) :
	/* BLOG INDEX */
	if ($PostCount == 1) :
		/* MOST RECENT POST GETS THE HERO TREATMENT */
		?>
	  </div>

		<div class="first-post overlay" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);">
			<div class="site-width">
				<?php the_date('F j, Y', '<h3>', '</h3>'); ?> 

				<?php the_title('<h1>', '</h1>'); ?>

				<a href="<?php echo get_permalink(); ?>">Read <?php $cats = get_the_category(); echo esc_html($cats[0]->name); ?></a>
				<div class="explore">EXPLORE MORE <i class="fa fa-chevron-down" aria-hidden="true"></i></div>

        <div id="scrollto"></div>
			</div>
		</div>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.scrollTo.min.js"></script>
		<script type="text/javascript">
  		$(document).ready(function() {
        $(".explore").click(function(e) {
          $.scrollTo("#scrollto",{duration: 500});
          e.preventDefault();
        });

  		  $(".filter [href]").each(function() {
  		    if (this.href == window.location.href) { $(this).addClass("current"); }
  		  });
  		});
		</script>

		<div class="filter">
		  <div class="site-width">
		    <a href="<?php echo site_url(); ?>/stories-and-progress/">ALL</a>
		    <a href="<?php echo site_url(); ?>/category/story/">STORIES</a>
		    <a href="<?php echo site_url(); ?>/category/progress/">PROGRESS</a>
		  </div>
		</div>

		<div class="site-width">
	<?php
	endif;

	if ($PostCount > 1) :
	  /* ALL THE OTHER PAST POSTS */
	  ?>
	  <a href="<?php echo get_permalink(); ?>" class="index-post" style="display: none;">
	  	<div class="index-post-image" style="<?php echo (wp_get_attachment_url(get_post_thumbnail_id()) != "") ? "background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ")" : "padding-top: 0"; ?>"></div>
      
      <div class="index-post-content">
		  	<h4><?php $cats = get_the_category(); echo esc_html($cats[0]->name); ?></h4>

		  	<?php the_title('<h2>', '</h2>'); ?>

		  	<?php echo get_the_excerpt(); ?>

		  	<?php the_date('F j, Y', '<h3>', '</h3>'); ?> 
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

			<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="new" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
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
	<div class="site-width">
<?php endif; ?>