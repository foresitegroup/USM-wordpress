<?php
/**
 * Displays content for opportunities pages
 */
global $TotalRaisedText;
?>

<?php wp_nav_menu(array('theme_location' => 'opportunities-menu', 'container_class' => 'site-width goals-menu opportunities-menu', 'menu_class' => '')); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.mm-opp').addClass('current_page_item');
  });
</script>

<div class="opportunities-header">
  <div class="site-width">
    <div class="opportunities-text">
      <?php the_title('<h2>', '</h2>'); ?>
      <?php the_content(); ?>

      <?php if (isset($TotalRaisedText)) echo $TotalRaisedText; ?>
    </div>
  </div>

  <div class="opportunities-image"<?php echo "style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ")\""; ?>></div>
</div>
