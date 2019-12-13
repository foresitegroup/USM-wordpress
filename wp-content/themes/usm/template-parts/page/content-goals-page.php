<?php
/**
 * Displays content for goals pages
 */

global $usmgoal;
global $usmgoal_pretty;
global $usmgoal_color;
?>

<?php wp_nav_menu(array('theme_location' => 'goals-menu', 'container_class' => 'site-width-small goals-menu', 'menu_class' => '')); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.mm-goals').addClass('current_page_item');
  });
</script>

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
      <div id="<?php echo $usmgoal; ?>-circle2" style="position: absolute; top: 0; left: 0; width: 100%;"></div>

      <div class="circle-text">
        <?php echo $usmgoal_pretty; ?>
        <div id="<?php echo $usmgoal; ?>-percent"><?php echo $Percent . "%"; ?></div>
      </div>
    </div>

    <div id="<?php echo $usmgoal; ?>-raised"><noscript>$<?php echo number_format($Raised); ?></noscript></div>
    <div class="goal">Goal: $<?php echo nice_number($Goal); if ($usmgoal == "usm") echo " (Over 5 Years)"; ?></div>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/circle-progress.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        // $(".goal-text .button").click(function(e) {
        //   $.scrollTo("#scrolldown",{duration: 600});
        //   e.preventDefault();
        // });
        
        <?php
        if ($Percent > 99) {
          $Value = "1";
          $Value2 = ($Percent / 100) - 1;
          $CircleDuration = 1500;
        } else {
          $Value = "0." . $Percent;
          $Value2 = "0";
          $CircleDuration = 2000;
        }
        ?>
        $('#<?php echo $usmgoal; ?>-circle').circleProgress({
          value: <?php echo $Value; ?>, fill: '<?php echo $usmgoal_color; ?>',
          size: $('.goal-meter .circle').width(),
          emptyFill: '#D7D7D7', startAngle: -Math.PI/2, thickness: 21,
          animation: { duration: <?php echo $CircleDuration; ?>, easing: "linear" }
        });
        setTimeout(() => $('#<?php echo $usmgoal; ?>-circle2').circleProgress({
          value: <?php echo $Value2; ?>, fill: '#A14C24',
          size: $('.goal-meter .circle').width(),
          emptyFill: 'transparent', startAngle: -Math.PI/2, thickness: 21,
          animation: { duration: 500, easing: "linear" }
        }), <?php echo $CircleDuration; ?>);
        
        $('.goals-slider').append('<div class="cycle-pager"></div><div class="cycle-prev"></div><div class="cycle-next"></div>');
        $('.goals-slider').find('br').remove();
        $('.goals-slider').cycle({
          slides: '> img, > a',
          speed: 1000,
          timeout: 5000,
          pagerTemplate: "<span></span>"
        });
      });

      var Percent = new CountUp("<?php echo $usmgoal; ?>-percent", 0, <?php echo $Percent; ?>, 0, 2, {suffix: '%'});
      var Raised = new CountUp("<?php echo $usmgoal; ?>-raised", 0, <?php echo $Raised; ?>, 0, 2, {prefix: '$'});
      Percent.start();
      Raised.start();
    </script>
  </div>
  <div id="scrolldown"></div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.cycle2.min.js"></script>
