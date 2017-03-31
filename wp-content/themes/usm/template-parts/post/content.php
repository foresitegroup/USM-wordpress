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
			</div>
		</div>

		<script type="text/javascript">
		$(document).ready(function() {
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

  <div class="single-post">
  	<?php the_date('F j, Y', '<div class="single-post-date">', '</div>'); ?> 

  	<?php the_title('<h1 class="site-width-small single-post-title">', '</h1>'); ?>

		<?php the_content(); ?>
	</div>
<?php endif; ?>