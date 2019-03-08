<?php
/**
 * WPBox Blog Theme Customizer
 *
 * @package BuzzKery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpbox_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*******************************************
	Color scheme
	********************************************/

	// add the section to contain the settings
	$wp_customize->add_section( 'textcolors' , array(
	    'title' =>  'WPBox Colors',
			'title'       => __( 'WPBox Colors', 'wpbox' ),
			'priority'       => 30
	) );

	// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
	$txtcolors[] = array(
	    'slug'=>'color_scheme_1',
	    'default' => '#00a8d7',
	    'label' => 'Main Color'
	);

	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
	$txtcolors[] = array(
	    'slug'=>'color_scheme_2',
	    'default' => '#002b3c',
	    'label' => 'Secondary Color'
	);

	// link color
	$txtcolors[] = array(
	    'slug'=>'link_color',
	    'default' => '#002b3c',
	    'label' => 'Link Color'
	);

	// link color ( hover, active )
	$txtcolors[] = array(
	    'slug'=>'hover_link_color',
	    'default' => '#00a8d7',
	    'label' => 'Link Color (on hover)'
	);

	// text color
	$txtcolors[] = array(
	    'slug'=>'text_color',
	    'default' => '#748288',
	    'label' => 'Text Color'
	);

	// header color
	$txtcolors[] = array(
	    'slug'=>'header_color',
	    'default' => '#fff',
	    'label' => 'Header Color'
	);

	// Background color
	$txtcolors[] = array(
	    'slug'=>'bg_color',
	    'default' => '#f5f5f5',
	    'label' => 'Background Color'
	);

	// add the settings and controls for each color
foreach( $txtcolors as $txtcolor ) {

    // SETTINGS
    $wp_customize->add_setting(
        $txtcolor['slug'], array(
            'default' => $txtcolor['default'],
            'type' => 'option',
            'capability' =>
            'edit_theme_options'
        )
    );
    // CONTROLS
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $txtcolor['slug'],
            array('label' => $txtcolor['label'],
            'section' => 'textcolors',
            'settings' => $txtcolor['slug'])
        )
    );
}
}
add_action( 'customize_register', 'wpbox_customize_register' );

// Creating the css for the costumizer's WPBox Colors
function wpbox_customize_colors() {
// main color
$color_scheme_1 = get_option( 'color_scheme_1' );

// secondary color
$color_scheme_2 = get_option( 'color_scheme_2' );

// link color
$link_color = get_option( 'link_color' );

// hover or active link color
$hover_link_color = get_option( 'hover_link_color' );

// text
$text_color = get_option( 'text_color' );

// text
$header_color = get_option( 'header_color' );

// text
$bg_color = get_option( 'bg_color' );

/****************************************
styling
****************************************/
?>
<style>


/* color scheme */

/* main color */
.tag, .sidebar article span:hover, .newsletter .newsletter-calltoaction, .archive article span:hover, .home article span:hover, .search article span:hover, .category article h2 a:hover {
    background-color:  <?php echo $color_scheme_1; ?> !important;
}

footer#colophon h4, footer#colophon .topbutton, #filtersubmit, .home article footer.entry-footer span a {
	color: <?php echo $color_scheme_1; ?>;
}

.form-submit .submit {
	border: 1px solid <?php echo $color_scheme_1; ?>;
	color: <?php echo $color_scheme_1; ?>;
}

.form-submit .submit:hover {
	background: <?php echo $color_scheme_1; ?>;
	border: 1px solid <?php echo $color_scheme_1; ?>;
}

/* secondary color */
#site-description, .sidebar h3, h3, h5, .menu.main a:active, .menu.main a:hover, footer#colophon .footer-copyright, .social-icon, #searchform:hover > #filtersubmit {
    color:  <?php echo $color_scheme_2; ?>;
}

.newsletter .newsletter-bg-bl {
	background-color: <?php echo $color_scheme_2; ?>;
}

/* links color */
a:link, a:visited, nav#site-navigation ul li a, .sidebar article a, footer#colophon ul li a, footer#colophon a,  {
    color:  <?php echo $link_color; ?> !important;
}

/* hover links color */
a:hover, a:active, #masthead .current-menu-item a, footer#colophon a:hover, nav#site-navigation ul li a:hover {
    color:  <?php echo $hover_link_color; ?> !important;
}

body, html {
	background: <?php echo $bg_color; ?>;
}

#masthead {
	background-color: <?php echo $header_color; ?>;
}

.single .single-post-container .entry-content, .single p {
	color: <?php echo $text_color; ?>;
}

.category article h2 a:hover {
	color: #fff;
}

.archive article .cat-links:hover, .home article .cat-links:hover, .search article .cat-links:hover {
	background: transparent !important;
}

</style>

<?php
}
add_action( 'wp_head', 'wpbox_customize_colors' );


// Adding logo
function wpbox_logo_customizer( $wp_customize ) {
	$wp_customize->add_section( 'wpbox_logo_section' , array(
	'title'       => __( 'WPBox Logo', 'wpbox' ),
	'priority'    => 30,
	'description' => 'Upload a logo to replace the default site name and description in the header',
) );

	$wp_customize->add_setting( 'wpbox_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpbox_logo', array(
    'label'    => __( 'Logo', 'wpbox' ),
    'section'  => 'wpbox_logo_section',
    'settings' => 'wpbox_logo',
) ) );

}
add_action( 'customize_register', 'wpbox_logo_customizer' );


// Add Footer Text
function wpbox_footer_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'footer_blocks_general', array(
 'priority' => 30,
 'theme_supports' => '',
 'title' => __( 'WPBox Footer', 'wpbox' ),
 'description' => __( 'Set editable text for certain content.', 'wpbox' ),
 ) );

	$wp_customize->add_section( 'footer_blocks', array(
		'priority'       => 30,
		'title'          => __( 'Footer', 'wpbox' ),
		'description'    => __( 'Set editable text for certain content.' ),
		'panel' => 'footer_blocks_general'
	) );

	// Add setting
	$wp_customize->add_setting( 'footer_credit_blocks');

	$wp_customize->add_setting( 'footer_title1', array(
			'default' => __( 'Menu 1', 'wpbox' )
	) );

$wp_customize->add_setting( 'footer_title2', array(
	'default' => __( 'Menu 2', 'wpbox' )
) );

$wp_customize->add_setting( 'footer_title3', array(
	'default' => __( 'Menu 3', 'wpbox' )
) );

$wp_customize->add_setting( 'footer_title4', array(
	'default' => __( 'Social', 'wpbox' )
) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_credit_blocks',
		    array(
		        'label'    => __( 'Credits', 'wpbox' ),
		        'section'  => 'footer_blocks',
		        'settings' => 'footer_credit_blocks',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_title1',
		    array(
		        'label'    => __( 'Footer Tiltle 1', 'wpbox' ),
		        'section'  => 'footer_blocks',
		        'settings' => 'footer_title1',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_title2',
		    array(
		        'label'    => __( 'Footer Tiltle 2', 'wpbox' ),
		        'section'  => 'footer_blocks',
		        'settings' => 'footer_title2',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_title3',
		    array(
		        'label'    => __( 'Footer Tiltle 3', 'wpbox' ),
		        'section'  => 'footer_blocks',
		        'settings' => 'footer_title3',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_title4',
		    array(
		        'label'    => __( 'Footer Tiltle 4', 'wpbox' ),
		        'section'  => 'footer_blocks',
		        'settings' => 'footer_title4',
		        'type'     => 'text'
		    )
	    )
	);

}
add_action( 'customize_register', 'wpbox_footer_customizer' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpbox_customize_preview_js() {
	wp_enqueue_script( 'wpbox_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wpbox_customize_preview_js' );
