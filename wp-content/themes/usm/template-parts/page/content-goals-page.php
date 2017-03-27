<?php
/**
 * Displays content for goals pages
 */

global $usmgoal;
global $usmgoal_pretty;
global $usmgoal_color;
?>

<?php wp_nav_menu(array('theme_location' => 'goals-menu', 'container_class' => 'site-width-small goals-menu', 'menu_class' => '')); ?>

<div class="goal-header">
  <div class="site-width">
    <div class="goal-text">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="goal-meter">
  	<?php
  	$Raised = get_theme_mod($usmgoal . '_raised');
    $Goal = get_theme_mod($usmgoal . '_goal');
    $Percent = number_format(($Raised/$Goal) * 100);

    function nice_number($num) {
      if ($num < 1000) {
        $num_format = number_format($num);
      } elseif ($num < 1000000) {
        $num_format = number_format($num / 1000) . " Thousand";
      } else {
        $num_format = number_format($num / 1000000) . " Million";
      }

      return $num_format;
    }
  	?>
  	<div class="circle">
      <div id="<?php echo $usmgoal; ?>-circle"></div>

      <div class="circle-text">
        <?php echo $usmgoal_pretty; ?>
        <div id="<?php echo $usmgoal; ?>-percent"><?php echo $Percent . "%"; ?></div>
      </div>
    </div>

    <div id="<?php echo $usmgoal; ?>-raised"><noscript>$<?php echo number_format($Raised); ?></noscript></div>
    <div class="goal">Goal: $<?php echo nice_number($Goal); ?></div>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/circle-progress.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#<?php echo $usmgoal; ?>-circle').circleProgress({
          value: 0.<?php echo $Percent; ?>, fill: '<?php echo $usmgoal_color; ?>', size: $('.goal-meter .circle').width(),
          emptyFill: '#D7D7D7', startAngle: -Math.PI/2, thickness: 21, animation: { duration: 2000 }
        });

        $('.goals-slider').find('br').remove();
      });

      var Percent = new CountUp("<?php echo $usmgoal; ?>-percent", 0, <?php echo $Percent; ?>, 0, 2, {suffix: '%'});
      var Raised = new CountUp("<?php echo $usmgoal; ?>-raised", 0, <?php echo $Raised; ?>, 0, 2, {prefix: '$'});
      Percent.start();
      Raised.start();
    </script>
  </div>
</div>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.init.goals-slider.js"></script>
