<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Solar Energy
 */
get_header(); 

$hideslide = get_theme_mod('hide_slides', 1);
$hide_sectionone = get_theme_mod('hide_sectionone', 1);
$hide_home_second_content = get_theme_mod('hide_home_second_content', 1);
$hide_home_third_content = get_theme_mod('hide_home_three_content', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$pages = array(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div class="slider-shadow"></div>
    <div id="slider" class="nivoSlider">
      <?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_solar_energy_slideno[] = $i;
          $skt_solar_energy_slidetitle[] = get_the_title();
		  $skt_solar_energy_slidedesc[] = get_the_excerpt();
          $skt_solar_energy_slidelink[] = esc_url(get_permalink());
          ?>
      <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
      <?php
        $sld++;
        endwhile;
          ?>
    </div>
    <?php
        $k = 0;
        foreach( $skt_solar_energy_slideno as $skt_solar_energy_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_solar_energy_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_solar_energy_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_solar_energy_slidedesc[$k] ); ?></p>
      </div>
    </div>
    <?php $k++;
       wp_reset_postdata();
      } ?>
    <?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
if (!is_home() && is_front_page()) { 
if( $hide_sectionone == '') { ?>
<section class="homeone_section_area">
  <div class="center">
    <div class="homeone_section_content">
      <?php 
	  		if( get_theme_mod('page-column1',false)) {
			$sectiononequery = new WP_query('page_id='.get_theme_mod('page-column1',true)); 
			while( $sectiononequery->have_posts() ) : $sectiononequery->the_post(); ?>
      <?php if( has_post_thumbnail() ) { ?>
      <div class="hm-leftcols">
        <?php the_post_thumbnail('full'); ?>
      </div>
      <?php } ?>
      <div class="hm-rightcols">
      	<h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </div>
      <?php endwhile;
       		wp_reset_postdata(); 
	   		} ?>
      <div class="clear"></div>
    </div>
  </div>
</section>
<?php } }
	  if (!is_home() && is_front_page()) {
	  if( $hide_home_second_content == '' ){	
?>
<section class="home2_section_area">
  <div class="center">
    <div class="home_section2_content">
      <div class="row_area">
        <div class="columns-col-3">
          <?php 
			for($l=1; $l<3; $l++) { 
	  		if( get_theme_mod('second-column-left'.$l,false)) {
			$leftblock = new WP_query('page_id='.get_theme_mod('second-column-left'.$l,true)); 
			while( $leftblock->have_posts() ) : $leftblock->the_post(); 
			?>
          <div class="features-left">
            <div class="bgcount"><?php echo esc_html($l); ?></div>
            <?php if( has_post_thumbnail() ) { ?>
            <div class="features-thumb">
              <?php the_post_thumbnail('full'); ?>
            </div>
            <?php } ?>
            <div class="features-content">
              <h5><?php the_title(); ?></h5>
              <?php the_excerpt(); ?>
              <a href="<?php echo esc_url( get_permalink() ); ?>" class="features-more"><?php echo esc_html_e('READ MORE', 'skt-solar-energy');?></a> </div>
            <div class="clear"></div>
          </div>
          <?php endwhile; wp_reset_postdata(); 
               }} 
		?>
        </div>
        <?php
			$centerimage = get_theme_mod('image_control_center');
			if(!empty($centerimage)){?>
        <div class="columns-col-3 centerimage"><img src="<?php echo esc_url($centerimage); ?>"></div>
        <?php }else{ ?>
        <div class="columns-col-3 centerimage">&nbsp;</div>
        <?php } ?>
        <div class="columns-col-3">
          <?php
			for($r=1; $r<3; $r++) { 
	  		if( get_theme_mod('second-column-right'.$r,false)) {
			$rightblock = new WP_query('page_id='.get_theme_mod('second-column-right'.$r,true)); 
			while( $rightblock->have_posts() ) : $rightblock->the_post(); 
			?>
          <div class="features-right">
            <div class="bgcount"><?php echo esc_html($r+2); ?></div>
            <?php if( has_post_thumbnail() ) { ?>
            <div class="features-thumb">
              <?php the_post_thumbnail('full'); ?>
            </div>
            <?php } ?>
            <div class="features-content">
              <h5><?php the_title(); ?></h5>
              <?php the_excerpt(); ?>
              <a href="<?php echo esc_url( get_permalink() ); ?>" class="features-more"><?php echo esc_html_e('READ MORE', 'skt-solar-energy');?></a> </div>
            <div class="clear"></div>
          </div>
          <?php endwhile; wp_reset_postdata(); 
               }} 
            ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } } 
if (!is_home() && is_front_page()) {
	  if( $hide_home_third_content == '' ){	
?>
<section class="home3_section_area">
  <div class="center">
    <div class="home_section3_content">
      <?php
        $section3_title = get_theme_mod('section3_title');
        if(!empty($section3_title)){
        ?>
      <div class="center-title">
        <h2><?php echo esc_html($section3_title); ?></h2>
      </div>
      <?php }
    for($f=1; $f<9; $f++) { 
    if( get_theme_mod('sectionthree-column'.$f,false)) {
    $secthreeblockbox = new WP_query('page_id='.get_theme_mod('sectionthree-column'.$f,true)); 
    while( $secthreeblockbox->have_posts() ) : $secthreeblockbox->the_post(); 
    ?>
      <div class="servicebox boxpattern-1">
        <div class="serviceboxbg">
          <?php if( has_post_thumbnail() ) { ?>
          <div class="servicebox-icon"><a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_post_thumbnail('full'); ?>
            </a></div>
          <?php } ?>
          <div class="serviceboxcon"> <a href="<?php echo esc_url( get_permalink() ); ?>">
            <h5><?php the_title(); ?></h5>
            </a>
            <?php the_excerpt(); ?>
          </div>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); 
	   }} 
	?>
    </div>
  </div>
</section>
<?php } } ?>
<div class="clear"></div>
<div class="container">
  <div class="page_content">
    <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-solar-energy' ),
							'next_text' => esc_html__( 'Next', 'skt-solar-energy' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
        <header class="entry-header">
          <h1>
            <?php the_title(); ?>
          </h1>
        </header>
        <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-solar-energy' ),
							'next_text' => esc_html__( 'Next', 'skt-solar-energy' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div>
  <!-- site-aligner --> 
</div>
<!-- content -->
<?php get_footer(); ?>