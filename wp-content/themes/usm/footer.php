    <div class="usm-footer">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="University School of Milwaukee" class="usm-logo"><br>

      <?php echo get_theme_mod('usm_address'); ?>, <?php echo get_theme_mod('usm_city'); ?>, <?php echo get_theme_mod('usm_state'); ?><br>
      <?php echo get_theme_mod('usm_phone_number'); ?>

      <div class="site-width-small">
        <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>

        <div class="social">
          <a href="<?php echo get_theme_mod('usm_facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="<?php echo get_theme_mod('usm_twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="<?php echo get_theme_mod('usm_instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="<?php echo get_theme_mod('usm_youtube'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>

    <div id="newsletter" style="display: none;">
      <?php echo do_shortcode('[insert page="newsletter-popup" display="content"]'); ?>
    </div>

    <?php wp_footer(); ?>

  </body>
</html>