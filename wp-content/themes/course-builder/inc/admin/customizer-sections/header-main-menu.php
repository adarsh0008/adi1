<?php
/**
 * Section Header Main Menu
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'header_main_menu',
		'title'    => esc_html__( 'Main Menu', 'course-builder' ),
		'panel'    => 'header',
		'priority' => 30,
	)
);

// Select All Fonts For Main Menu
thim_customizer()->add_field(
	array(
		'id'              => 'main_menu',
		'type'            => 'typography',
		'label'           => esc_html__( 'Fonts', 'course-builder' ),
		'tooltip'         => esc_html__( 'Allows to change font properties for header.', 'course-builder' ),
		'section'         => 'header_main_menu',
		'priority'        => 10,
		'default'         => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '15px',
			'line-height'    => '30px',
			'color'          => '#333333',
			'text-transform' => 'uppercase',
		),
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'choice'   => 'font-family',
				'element'  => 'header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >a,
                               header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >span',
				'property' => 'font-family',
			),
			array(
				'choice'   => 'variant',
				'element'  => 'header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >a,
                               header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >span',
				'property' => 'font-weight',
			),
			array(
				'choice'   => 'font-size',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'font-size',
			),
			array(
				'choice'   => 'line-height',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'line-height',
			),
			array(
				'choice'   => 'color',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span,
                               header#masthead.site-header .navigation .width-navigation .inner-navigation .navbar > .current-menu-item a',
				'property' => 'color',
			),
			array(
				'choice'   => 'text-transform',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'text-transform',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_palette',
				'operator' => '==',
				'value'    => 'custom',
			),
		),
	)
);

// Text Link Hover
thim_customizer()->add_field(
	array(
		'id'              => 'main_menu_hover_color',
		'type'            => 'color',
		'label'           => esc_html__( 'Text Hover Color', 'course-builder' ),
		'tooltip'         => esc_html__( 'Allows to set text hover color for header.', 'course-builder' ),
		'section'         => 'header_main_menu',
		'default'         => '#3498DB',
		'priority'        => 16,
		'alpha'           => true,
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'choice'   => 'color',
				'element'  => 'header#masthead.site-header #primary-menu >li >a:hover,
                               header#masthead.site-header #primary-menu >li >span:hover',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_palette',
				'operator' => '==',
				'value'    => 'custom',
			),
		),
	)
);

// Show or Hide Magic Line
thim_customizer()->add_field(
	array(
		'id'          => 'header_show_magic_line',
		'type'        => 'switch',
		'label'       => esc_html__( 'Show magic line', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to show or hide magic line under main menu on header. Line color same as main menu color.', 'hotel-wp' ),
		'section'     => 'header_main_menu',
		'default'     => 0,
		'priority'    => 30,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hotel-wp' ),
			false	  => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);