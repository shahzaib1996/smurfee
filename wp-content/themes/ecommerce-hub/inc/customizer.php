<?php
/**
 * Ecommerce Hub Theme Customizer
 * @package Ecommerce Hub
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function ecommerce_hub_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'ecommerce_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'ecommerce-hub' ),
	    'description' => __( 'Description of what this panel does.', 'ecommerce-hub' ),
	) );

	//layout setting
	$wp_customize->add_section( 'ecommerce_hub_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ecommerce_hub_layout',array(
	        'default' => __( 'Right Sidebar', 'ecommerce-hub' ),
	        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('ecommerce_hub_layout',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'ecommerce-hub' ),
	        'section' => 'ecommerce_hub_theme_layout',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','ecommerce-hub'),
	            'Right Sidebar' => __('Right Sidebar','ecommerce-hub'),
	            'One Column' => __('One Column','ecommerce-hub'),
	            'Three Columns' => __('Three Columns','ecommerce-hub'),
	            'Four Columns' => __('Four Columns','ecommerce-hub'),
	            'Grid Layout' => __('Grid Layout','ecommerce-hub')
	        ),
	    )
    );

    //Social Icons(topbar)
	$wp_customize->add_section('ecommerce_hub_social_media',array(
		'title'	=> __('Social Icon','ecommerce-hub'),
		'description'	=> __('Add Header Content here','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_facebook',array(
		'label'	=> __('Add Facebook link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_pintrest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_pintrest',array(
		'label'	=> __('Add Pintrest link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_pintrest',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_rss',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_rss',array(
		'label'	=> __('Add rss link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_rss',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_twitter',array(
		'label'	=> __('Add Twitter link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_twitter',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_youtube',array(
		'label'	=> __('Add Youtube link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_youtube',
		'type'	=> 'url'
	));

	//Topbar section
	$wp_customize->add_section('ecommerce_hub_topbar_icon',array(
		'title'	=> __('Topbar Section','ecommerce-hub'),
		'description'	=> __('Add Header Content here','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_welcome',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_welcome',array(
		'label'	=> __('Add welcome Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_welcome',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_email_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_hub_email_text',array(
		'label'	=> __('Add Email Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_email_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_email',array(
		'label'	=> __('Add Email Address','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_call_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_call_text',array(
		'label'	=> __('Add Contact Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_call_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_call_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_call_number',array(
		'label'	=> __('Add Contact Number','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_call_number',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'ecommerce_hub_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	$wp_customize->add_setting('ecommerce_hub_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_hub_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','ecommerce-hub'),
       'section' => 'ecommerce_hub_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'ecommerce_hub_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ecommerce_hub_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'ecommerce_hub_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ecommerce-hub' ),
			'section'  => 'ecommerce_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//Featured Products Section
	$wp_customize->add_section('ecommerce_hub_featured_products',array(
		'title'	=> __('Featured Products','ecommerce-hub'),
		'description'	=> __('Add Featured Products sections below.','ecommerce-hub'),
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_page_title',array(
		'label'	=> __('Section Title','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_featured_products',
		'type'		=> 'text'
	));

    $wp_customize->add_setting( 'ecommerce_hub_feature_page', array(
      'default'           => '',
      'sanitize_callback' => 'ecommerce_hub_sanitize_dropdown_pages'
    ));
    $wp_customize->add_control( 'ecommerce_hub_feature_page', array(
      'label'    => __( 'Select Page', 'ecommerce-hub' ),
      'section'  => 'ecommerce_hub_featured_products',
      'type'     => 'dropdown-pages'
    ));

	//footer text
	$wp_customize->add_section('ecommerce_hub_footer_section',array(
		'title'	=> __('Footer Text','ecommerce-hub'),
		'description'	=> __('Add some text for footer like copyright etc.','ecommerce-hub'),
		'panel' => 'ecommerce_hub_panel_id'
	));
	
	$wp_customize->add_setting('ecommerce_hub_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_text',array(
		'label'	=> __('Copyright Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'ecommerce_hub_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ecommerce_Hub_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ecommerce_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ecommerce_Hub_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Ecommerce Hub Pro', 'ecommerce-hub' ),
				'pro_text' => esc_html__( 'Go Pro', 'ecommerce-hub' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/wordpress-ecommerce-theme/')					
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ecommerce-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ecommerce-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ecommerce_Hub_Customize::get_instance();