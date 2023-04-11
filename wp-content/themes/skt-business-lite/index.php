<?php
/**
 * The index page of SKT Business Lite
 *
 * Displays the home page elements.
 *
 * @package SKT Business Lite
 *
 * @since SKT Business Lite 1.0
 */
global $complete;
?>
<?php get_header(); ?>
<?php if ( !is_front_page() ) { ?>
<div class="fixed_site">
  <div class="fixed_wrap fixindex">
    <?php get_template_part('templates/post','layout4'); ?>
  </div>
</div>
<?php } //is_front_page ENDS ?>
<?php get_footer(); ?>