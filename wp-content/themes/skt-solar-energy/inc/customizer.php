<?php
/**
 * SKT Solar Energy Theme Customizer
 *
 * @package SKT Solar Energy
 */
function skt_solar_energy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_solar_energy_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'skt_solar_energy_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_solar_energy_custom_header_setup' );
if ( ! function_exists( 'skt_solar_energy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_solar_energy_custom_header_setup().
 */
function skt_solar_energy_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_solar_energy_header_style 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_solar_energy_customize_register( $wp_customize ) {
	//Add a class for titles
    class skt_solar_energy_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#92c938',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-solar-energy'),			
			 'description'	=> esc_html__('More color options in PRO Version','skt-solar-energy'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'skt-solar-energy'),
            'priority' => null,
            'description'	=> esc_html__('Featured Image Size Should be ( 1400 X 603 ) More slider settings available in PRO Version','skt-solar-energy'),		
        )
    );
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_solar_energy_sanitize_integer'
	));
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','skt-solar-energy'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'skt_solar_energy_sanitize_integer'
	));
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','skt-solar-energy'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_solar_energy_sanitize_integer'
	));
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','skt-solar-energy'),
			'section'	=> 'slider_section'
	));	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Uncheck To Show Slider','skt-solar-energy'),
    	   'type'      => 'checkbox'
     )); // Slider Section		 
	 
	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Information','skt-solar-energy'),				
			'description'	=> esc_html__('Add Information For Header Area','skt-solar-energy'),		
			'priority'		=> null
	));
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Add contact number here.','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_no'
	));
	
	$wp_customize->add_setting('email_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('email_add',array(
			'label'	=> esc_html__('Add email address here.','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'email_add'
	));	
	
	$wp_customize->add_setting('contact_top_address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address',array(
			'label'	=> esc_html__('Add address here line 1','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address'
	));	
	
	$wp_customize->add_setting('contact_top_address_two',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address_two',array(
			'label'	=> esc_html__('Add address here line 2','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address_two'
	));	
	
	$wp_customize->add_setting('hdr_fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	$wp_customize->add_control('hdr_fb_link',array(
			'label'	=> esc_html__('Add Facebook link here','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_fb_link'
	));	
	$wp_customize->add_setting('hdr_twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_twitt_link',array(
			'label'	=> esc_html__('Add Twitter link here','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_twitt_link'
	));
	$wp_customize->add_setting('hdr_youtube_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_youtube_link',array(
			'label'	=> esc_html__('Add Youtube link here','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_youtube_link'
	));	
	$wp_customize->add_setting('hdr_instagram_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_instagram_link',array(
			'label'	=> esc_html__('Add Instagram link here','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_instagram_link'
	));		
	$wp_customize->add_setting('hdr_linkedin_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_linkedin_link',array(
			'label'	=> esc_html__('Add Linkedin link here','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_linkedin_link'
	));		
	
	//Hide Header Top Bar
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     )); 	//Hide Header Top Bar	
	 
// Home Section 1
	$wp_customize->add_section('section_one', array(
		'title'	=> esc_html__('Home Section One','skt-solar-energy'),
		'description'	=> esc_html__('Select Page from the dropdown','skt-solar-energy'),
		'priority'	=> null
	));	

	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_one',
	));	
	
	//Hide Section
	$wp_customize->add_setting('hide_sectionone',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_sectionone', array(
    	   'section'   => 'section_one',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     )); //Hide Section	 	 

	// Home Section 2
	$wp_customize->add_section('hm_section_2', array(
		'title'	=> esc_html__('Home Section Two','skt-solar-energy'),
		'description'	=> esc_html__('Select Page from the dropdown for section','skt-solar-energy'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('second-column-left1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'second-column-left1',array('type' => 'dropdown-pages',
			'section' => 'hm_section_2',
	));	
	
	$wp_customize->add_setting('second-column-left2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'second-column-left2',array('type' => 'dropdown-pages',
			'section' => 'hm_section_2',
	));		
 	
	$wp_customize->add_setting('second-column-right1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'second-column-right1',array('type' => 'dropdown-pages',
			'section' => 'hm_section_2',
	));	
	
	$wp_customize->add_setting('second-column-right2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'second-column-right2',array('type' => 'dropdown-pages',
			'section' => 'hm_section_2',
	));	
	
	$wp_customize->add_setting('image_control_center', array(
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_center', array(
	'label' => __( 'Add Center Image', 'skt-solar-energy' ),
	'section' => 'hm_section_2',
	'settings' => 'image_control_center',
	)));		

	//Hide Section 	
	$wp_customize->add_setting('hide_home_second_content',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_home_second_content', array(
    	   'section'   => 'hm_section_2',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     )); // Hide Section 	
	 
	// Home Section 3
	$wp_customize->add_section('hm_section_3', array(
		'title'	=> esc_html__('Home Section Three','skt-solar-energy'),
		'description'	=> esc_html__('Select Page from the dropdown for section','skt-solar-energy'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('section3_title',array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section3_title',array(
			'label'	=> __('Add title for section title','skt-solar-energy'),
			'section'	=> 'hm_section_3',
			'setting'	=> 'section3_title'
	));	
	
	$wp_customize->add_setting('sectionthree-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column1',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));	
	
	$wp_customize->add_setting('sectionthree-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column2',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));		
 	
	$wp_customize->add_setting('sectionthree-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column3',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));	
	
	$wp_customize->add_setting('sectionthree-column4',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column4',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));		
    
	$wp_customize->add_setting('sectionthree-column5',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column5',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));	    
        
	$wp_customize->add_setting('sectionthree-column6',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column6',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));	  
        
	$wp_customize->add_setting('sectionthree-column7',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column7',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));	  
        
	$wp_customize->add_setting('sectionthree-column8',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_solar_energy_sanitize_integer',
		));
	$wp_customize->add_control(	'sectionthree-column8',array('type' => 'dropdown-pages',
			'section' => 'hm_section_3',
	));		
 	
	//Hide Section 	
	$wp_customize->add_setting('hide_home_three_content',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_home_three_content', array(
    	   'section'   => 'hm_section_3',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     )); // Hide Section	 	 		
	
}
add_action( 'customize_register', 'skt_solar_energy_customize_register' );
//Integer
function skt_solar_energy_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function skt_solar_energy_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_solar_energy_custom_css() {
    wp_enqueue_style(
        'skt-solar-energy-custom-style',
        get_template_directory_uri() . '/css/skt-solar-energy-custom-style.css'
    );
        $color = get_theme_mod( 'color_scheme' ); //E.g. #e64d43
		$header_text_color = get_header_textcolor();
        $custom_css = "
					#sidebar ul li a:hover,
					.footerarea a:hover,
					.cols-3 ul li.current_page_item a,				
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.fancy-title h2 span,
					.postmeta a:hover,
					.logo h2 span,
					.left-fitbox a:hover h3, .right-fitbox a:hover h3, .tagcloud a,
					.slide_info h2 span,
					.blocksbox:hover h3,
					.homefour_section_content h2 span,
					.section5-column:hover h3,
					.homeone_section_content h2 span,
					a.features-more,
					.center-title h2 span,
					.servicebox:hover h5,
					.copyright-txt a:hover					
					{ 
						 color: {$color} !important;
					}
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.nivo-controlNav a.active,								
					.wpcf7 input[type='submit'],
					a.ReadMore,
					.section2button,
					input.search-submit,
					.slide_info .slide_more,
					.recent-post .morebtn:hover,
					.homefour_section_content .button,
					.perf-thumb,
					.yellowdivide,
					#topmenu,
					.homeone_section_content h2 span:after
					{ 
					   background-color: {$color} !important;
					}
					.titleborder span:after, .cols-3 h5:after{border-bottom-color: {$color} !important;}
				";
        wp_add_inline_style( 'skt-solar-energy-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_solar_energy_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_solar_energy_customize_preview_js() {
	wp_enqueue_script( 'skt_solar_energy_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_solar_energy_customize_preview_js' );