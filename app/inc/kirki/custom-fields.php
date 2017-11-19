<?php
if(class_exists('Kirki')) {
  Kirki::add_config( 'flyrbord', array(
  	'capability'    => 'edit_theme_options',
  	'option_type'   => 'theme_mod',
  ) );


  /***********************************************************
  * Top bar
  ************************************************************/

  Kirki::add_section( 'top_bar', array(
      'title'          => __( 'Top Bar' ),
      'description'    => __( 'Manage content displayed above the main menu' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 20,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
  	'type'     => 'text',
  	'settings' => 'announcement_text',
  	'label'    => __( 'Special Announcement', 'flyrbord' ),
  	'section'  => 'top_bar',
  	'default'  => esc_attr__( '', 'flyrbord' ),
  	'priority' => 10,
  ) );

  /***********************************************************
  * Top bar
  ************************************************************/

  Kirki::add_section( 'navigation_menu', array(
      'title'          => __( 'Navigation Menu' ),
      'description'    => __( 'Manage the display of the navigation menu' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 20,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    	'type'        => 'radio-buttonset',
    	'settings'    => 'menu_color_scheme',
    	'label'       => __( 'Menu Color Scheme', 'flyrbord' ),
    	'section'     => 'navigation_menu',
    	'default'     => 'dark',
    	'priority'    => 10,
    	'choices'     => array(
    		'dark'   => esc_attr__( 'Dark', 'flyrbord' ),
    		'light' => esc_attr__( 'Light', 'flyrbord' ),
    	),
  ) );


  /***********************************************************
  * Social media account links
  ************************************************************/

  Kirki::add_section( 'social_media', array(
      'title'          => __( 'Social Media' ),
      'description'    => __( 'Add / edit links to your social media accounts. Note: to remove an account, leave the field empty' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'facebook_account_link',
    'label'    => __( 'Facebook', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'twitter_account_link',
    'label'    => __( 'Twitter', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'pinterest_account_link',
    'label'    => __( 'Pinterest', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'instagram_account_link',
    'label'    => __( 'Instagram', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'linkedin_account_link',
    'label'    => __( 'LinkedIn', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );


  /***********************************************************
  * Contact info
  ************************************************************/

  Kirki::add_section( 'contact_info', array(
      'title'          => __( 'Contact Info' ),
      'description'    => __( 'Add / edit company contact info' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 220,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'phone_number',
    'label'    => __( 'Phone Number', 'flyrbord' ),
    'section'  => 'contact_info',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'public_email',
    'label'    => __( 'Public Email', 'flyrbord' ),
    'section'  => 'contact_info',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );


  /***********************************************************
  * Google analytics
  ************************************************************/

  Kirki::add_section( 'analytics', array(
      'title'          => __( 'Analytics & Tracking' ),
      'description'    => __( 'Add tracking scripts to understand your users' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 260,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'code',
    'settings' => 'google_analytics',
    'label'    => __( 'Google Analytics Tracking Code', 'flyrbord' ),
    'section'  => 'analytics',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
    'choices'     => array(
  		'language' => 'js',
  		'theme'    => 'monokai',
  		'height'   => 250,
	),
  ) );


  /***********************************************************
  * 404 Page
  ************************************************************/
  Kirki::add_section( 'four_oh_four', array(
      'title'          => __( '404 Page' ),
      'description'    => __( 'Manage 404 page content' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 280,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'four_oh_four_heading',
    'label'    => __( 'Text Heading', 'flyrbord' ),
    'section'  => 'four_oh_four',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'textarea',
    'settings' => 'four_oh_four_message',
    'label'    => __( 'Text Message', 'flyrbord' ),
    'section'  => 'four_oh_four',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10
  ) );
}
