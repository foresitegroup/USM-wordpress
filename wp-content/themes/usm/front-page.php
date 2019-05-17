<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 */

get_header();

$CapitalPercent = number_format((get_theme_mod('capital_raised')/get_theme_mod('capital_goal')) * 100);
$EndowmentPercent = number_format((get_theme_mod('endowment_raised')/get_theme_mod('endowment_goal')) * 100);
$USMPercent = number_format((get_theme_mod('usm_raised')/get_theme_mod('usm_goal')) * 100);
$TotalRaised = get_theme_mod('capital_raised') + get_theme_mod('endowment_raised') + get_theme_mod('usm_raised');
$TotalGoal = get_theme_mod('capital_goal') + get_theme_mod('endowment_goal') + get_theme_mod('usm_goal');
$TotalPercent = number_format(($TotalRaised/$TotalGoal) * 100);

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

<div class="home-progress">
  TOGETHER WE HAVE RAISED A TOTAL OF

  <div id="total-raised"><noscript>$<?php echo number_format($TotalRaised); ?></noscript></div>

  <div id="total-raised-bar">
    <div class="outer-therm" style="width: <?php echo ($TotalPercent > 100) ? "100" : $TotalPercent; ?>%;">
      <div class="inner-therm">
        <span<?php if ($TotalPercent > 95) echo ' style="right: 0.5%;"'; ?>><?php echo $TotalPercent; ?>%</span>
      </div>
    </div>
  </div>
  <!-- <div id="total-raised-bar"></div> -->

  TOWARD OUR $<?php echo number_format($TotalGoal); ?> CAMPAIGN GOAL. THANK YOU.

  <div class="site-width">
    <div class="one-third">
      <div class="circle">
        <div id="endowment-circle" class="preload"></div>

        <div class="circle-text">
          Endowment
          <div id="endowment-percent"><noscript><?php echo $EndowmentPercent . "%"; ?></noscript></div>
        </div>
      </div>
      
      <div class="one-third-text">
        <div id="endowment-raised"><noscript>$<?php echo number_format(get_theme_mod('endowment_raised')); ?></noscript></div>
        <div class="goal">Goal: $<?php echo nice_number(get_theme_mod('endowment_goal')); ?></div>
        <?php echo get_theme_mod('endowment_home_text'); ?><br>

        <a href="<?php echo site_url(); ?>/endowment">LEARN MORE</a>
      </div>
    </div>

    <div class="one-third">
      <div class="circle">
        <div id="usm-circle" class="preload"></div>

        <div class="circle-text">
          USM Fund
          <div id="usm-percent"><?php echo $USMPercent . "%"; ?></div>
        </div>
      </div>
      
      <div class="one-third-text">
        <div id="usm-raised"><noscript>$<?php echo number_format(get_theme_mod('usm_raised')); ?></noscript></div>
        <div class="goal">Goal: $<?php echo nice_number(get_theme_mod('usm_goal')); ?> (Over 5 Years)</div>
        <?php echo get_theme_mod('usm_fund_home_text'); ?><br>

        <a href="<?php echo site_url(); ?>/usm-fund">LEARN MORE</a>
      </div>
    </div>

    <div class="one-third">
      <div class="circle">
        <div id="capital-circle" class="preload"></div>

        <div class="circle-text">
          Capital
          <div id="capital-percent"><?php echo $CapitalPercent . "%"; ?></div>
        </div>
      </div>
      
      <div class="one-third-text">
        <div id="capital-raised"><noscript>$<?php echo number_format(get_theme_mod('capital_raised')); ?></noscript></div>
        <div class="goal">Goal: $<?php echo nice_number(get_theme_mod('capital_goal')); ?></div>
        <?php echo get_theme_mod('capital_home_text'); ?><br>

        <a href="<?php echo site_url(); ?>/capital">LEARN MORE</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/jqmeter.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/countUp.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/circle-progress.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".video-badge").waypoint(function(direction) {
      $("BODY").toggleClass("home-sticky", direction == "down");
      $(".home .sticky-header").toggleClass("sticky", direction == "down");
    });

    $(".home-progress").waypoint(function() {
      totalRaised.start();

      // $('#total-raised-bar').jQMeter({
      //   goal: '<?php echo $TotalGoal; ?>',
      //   raised: '<?php echo $TotalRaised; ?>',
      //   height: '12px',
      //   bgColor: '#D7D7D7',
      //   barColor: '#00CCCC'
      // });

      setTimeout(function(){
        if (<?php echo $TotalPercent; ?> == 100) {
          $('.inner-therm').addClass("hundred");
          $('.inner-therm span').css("right", "0");
        }
      }, 2000);

      this.destroy();
    },{offset: '100%'});

    $(".home-progress .site-width").waypoint(function() {
      $(".home-progress .one-third .circle .preload").removeClass("preload");
      
      <?php $CapitalValue = ($CapitalPercent > 99) ? "1." . $CapitalPercent : "0." . $CapitalPercent; ?>
      $('#capital-circle').circleProgress({
        value: <?php echo $CapitalValue; ?>, fill: '#A1B434', size: $('.home-progress .one-third .circle').width(),
        emptyFill: '#D7D7D7', startAngle: -Math.PI/2, thickness: 15, animation: { duration: 2000 }
      });
      
      <?php $EndowmentValue = ($EndowmentPercent > 99) ? "1." . $EndowmentPercent : "0." . $EndowmentPercent; ?>
      $('#endowment-circle').circleProgress({
        value: <?php echo $EndowmentValue; ?>, fill: '#EDA50B', size: $('.home-progress .one-third .circle').width(),
        emptyFill: '#D7D7D7', startAngle: -Math.PI/2, thickness: 15, animation: { duration: 2000 }
      });
      
      <?php $USMValue = ($USMPercent > 99) ? "1." . $USMPercent : "0." . $USMPercent; ?>
      $('#usm-circle').circleProgress({
        value: <?php echo $USMValue; ?>, fill: '#003366', size: $('.home-progress .one-third .circle').width(),
        emptyFill: '#D7D7D7', startAngle: -Math.PI/2, thickness: 15, animation: { duration: 2000 }
      });

      capitalPercent.start();
      endowmentPercent.start();
      usmPercent.start();
      capitalRaised.start();
      endowmentRaised.start();
      usmRaised.start();

      this.destroy();
    },{offset: '65%'});
  });

  var opt1 = { prefix: '$' };
  var opt2 = { suffix: '%' };

  var totalRaised = new CountUp("total-raised", 0, <?php echo $TotalRaised; ?>, 0, 2, opt1);

  var capitalPercent = new CountUp("capital-percent", 0, <?php echo $CapitalPercent; ?>, 0, 2, opt2);
  var endowmentPercent = new CountUp("endowment-percent", 0, <?php echo $EndowmentPercent; ?>, 0, 2, opt2);
  var usmPercent = new CountUp("usm-percent", 0, <?php echo $USMPercent; ?>, 0, 2, opt2);

  var capitalRaised = new CountUp("capital-raised", 0, <?php echo get_theme_mod('capital_raised'); ?>, 0, 2, opt1);
  var endowmentRaised = new CountUp("endowment-raised", 0, <?php echo get_theme_mod('endowment_raised'); ?>, 0, 2, opt1);
  var usmRaised = new CountUp("usm-raised", 0, <?php echo get_theme_mod('usm_raised'); ?>, 0, 2, opt1);
</script>

<div id="home-campaign">
  <div class="site-width">
    <?php
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
    ?>
  </div>
</div>

<div class="site-width">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.css">
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.init.home-slider.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/slick/slick.init.home-slider-inner.js"></script>
  <?php echo do_shortcode('[insert page="home-slider" display="content" class="insert-page-home-slider"]'); ?>
</div>

<div id="home-stories">
  <?php
  $query = new WP_Query(array('category_name' => 'story', 'posts_per_page' => 1, 'order' => 'DESC', 'orderby' => 'date', 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes'));
  
  if ($query->post_count == 0) $query = new WP_Query(array('category_name' => 'story', 'posts_per_page' => 1));

  while ($query -> have_posts()) : $query -> the_post();
    $TheImage = wp_get_attachment_url(get_post_thumbnail_id());
    $TheTitle = get_the_title();
    $TheLink = get_the_permalink();
    $TheQuote = get_field("quote");
    $TheQuoteAuthor = get_field("quote_author");
    $TheQuoteAuthorTitle = get_field("quote_author_title");
  endwhile;
  wp_reset_postdata();

  $HomeTitle = ($TheQuote != "") ? $TheQuote : $TheTitle;
  ?>
  <div class="home-stories-image" style="background-image: url(<?php echo $TheImage; ?>);"></div>

  <div class="site-width">
    <div class="home-stories-text">
      <h5>CAMPAIGN NEWS</h5>

      <h2><?php echo $HomeTitle; ?></h2>

      <div class="attr">
        <strong><?php echo $TheQuoteAuthor; ?></strong><br>
        <?php echo $TheQuoteAuthorTitle; ?>
      </div>

      <a href="<?php echo $TheLink; ?>" class="read">READ STORY</a>
      <a href="<?php echo site_url(); ?>/campaign-news/">EXPLORE MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </div>
  </div>
</div>

<div id="timeline" class="site-width">
  <h2>Campaign Timeline</h2>

  <?php
  $result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_name LIKE 'timeline-20%' AND post_status = 'publish' ORDER BY post_name ASC");

  $TLstyle = "<style>\n";
  $TLtabs = "";
  $TLcontent = "";
  $check = 1;

  foreach ($result as $row) {
    $TLyear = explode("-", $row->post_name);

    $TLstyle .= "#tab" . $TLyear['1'] . ":checked ~ #content" . $TLyear['1'] . " { display: block; }\n";

    $TLtabs .= "<input id=\"tab" . $TLyear['1'] . "\" type=\"radio\" name=\"tabs\"";
    if ($check == 1 || $TLyear['1'] == date("Y")) $TLtabs .= " checked";
    $TLtabs .= ">\n";

    $TLtabs .= "<label for=\"tab" . $TLyear['1'] . "\">" . $TLyear['1'] . "</label>\n";

    $check++;

    $TLcontent .= "<div id=\"content" . $TLyear['1'] . "\"><div class=\"site-width-small\">";
    $TLcontent .= nl2br($row->post_content);
    $TLcontent .= "</div></div>\n";
  }

  $TLstyle .= "</style>\n";

  echo $TLstyle;
  echo $TLtabs;
  echo $TLcontent;
  ?>
</div>

<?php get_footer(); ?>