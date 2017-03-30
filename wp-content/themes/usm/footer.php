      <div class="usm-footer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="University School of Milwaukee" class="usm-logo"><br>

        <?php echo get_theme_mod('usm_address'); ?>, <?php echo get_theme_mod('usm_city'); ?>, <?php echo get_theme_mod('usm_state'); ?>

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

    </div> <!-- /#my-page For mobile menu -->
    <nav id="my-menu">
      <?php
      // Just display the menu without all the classes and IDs
      if (($locations = get_nav_menu_locations()) && isset($locations['main-menu'])) {
        $menu_items = wp_get_nav_menu_items(wp_get_nav_menu_object($locations['main-menu'])->term_id);

        $menu_list = "<ul>\n";
        foreach ( (array) $menu_items as $key => $menu_item ) {
          $menu_list .= "<li><a href=\"" . $menu_item->url . "\">" . $menu_item->title . "</a></li>\n";
        }
        $menu_list .= "</ul>\n";

        echo $menu_list;
      }
      ?>
    </nav>

    <div id="newsletter" style="display: none;">
      <?php echo do_shortcode('[insert page="newsletter-popup" display="content"]'); ?>

      <form>
        <div class="cf">
          <input type="email" placeholder="Email Address">
          <input type="button" value="Signup">
        </div>
      </form>
    </div>

    <?php wp_footer(); ?>

  </body>
</html>