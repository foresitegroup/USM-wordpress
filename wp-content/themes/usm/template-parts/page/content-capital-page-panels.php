<?php
/**
 * Template part for displaying pages on capital page
 */

global $usmcounter;
?>

<div class="site-width<?php if ($usmcounter % 2 == 0) echo " text-first"; ?>">
	<?php the_content(); ?>
</div>

<hr>