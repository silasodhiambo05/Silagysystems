<?php
//about theme info
add_action( 'admin_menu', 'skt_solar_energy_abouttheme' );
function skt_solar_energy_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-solar-energy'), esc_html__('About Theme', 'skt-solar-energy'), 'edit_theme_options', 'skt_solar_energy_guide', 'skt_solar_energy_mostrar_guide');   
} 
//guidline for about theme
function skt_solar_energy_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'skt-solar-energy'); ?>
		   </div>
          <p><?php esc_html_e('SKT Solar Energy is a green clean energy theme can be used by industries of conservation, eco-friendly, renewable, biofuel electricity, recycle, natural resource, pollution free, water heating, sun, power, geothermal, hydro and wind energy and energy rating companies. RTL friendly, translation ready, WooCommerce and Gutenberg compatible and page builders friendly. It is multipurpose template and comes with a ready to import Elementor template plugin as add on which allows to import 63+ design templates for making use in home and other inner pages. Use it to create any type of business, personal, blog and eCommerce website. It is fast, flexible, simple and fully customizable.','skt-solar-energy'); ?></p>
		  <a href="<?php echo esc_url(SKT_SOLAR_ENERGY_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_SOLAR_ENERGY_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-solar-energy'); ?></a> | 
				<a href="<?php echo esc_url(SKT_SOLAR_ENERGY_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-solar-energy'); ?></a> | 
				<a href="<?php echo esc_url(SKT_SOLAR_ENERGY_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-solar-energy'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_SOLAR_ENERGY_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>