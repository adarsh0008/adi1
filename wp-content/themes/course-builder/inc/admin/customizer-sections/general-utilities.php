<?php
/**
 * Group Utilities
 *
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
	array(
		'id'       => 'utilities',
		'panel'    => 'general',
		'title'    => esc_html__( 'Utilities', 'course-builder' ),
		'priority' => 80,
	)
);

// Feature: Auto Login
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'auto_login',
		'label'    => esc_html__( 'Disable Auto Login', 'course-builder' ),
		'section'  => 'utilities',
		'default'  => false,
		'priority' => 15,
		'choices'  => array(
			true  => esc_html__( 'On', 'course-builder' ),
			false => esc_html__( 'Off', 'course-builder' ),
		),
	)
);

// Register Redirect
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_register_redirect',
		'section'  => 'utilities',
		'label'    => esc_html__( 'Register Redirect', 'course-builder' ),
		'tooltip'  => esc_html__( 'Allows register redirect url. Blank will redirect to current page.', 'course-builder' ),
		'priority' => 20,
	)
);

// Login Redirect
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_login_redirect',
		'section'  => 'utilities',
		'label'    => esc_html__( 'Login Redirect', 'course-builder' ),
		'tooltip'  => esc_html__( 'Allows login redirect url. Blank will redirect to current page.', 'course-builder' ),
		'priority' => 30,
	)
);