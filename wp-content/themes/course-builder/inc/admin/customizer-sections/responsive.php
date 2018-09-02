<?php
/**
 * Section Responsive
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'responsive',
		'title'    => esc_html__( 'Responsive', 'course-builder' ),
		'priority' => 70,
		'icon'     => 'dashicons-smartphone',
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'       => 'enable_responsive',
		'type'     => 'switch',
		'label'    => esc_html__( 'Responsive', 'course-builder' ),
		'tooltip'  => esc_html__( 'Turn on to enable responsive on mobile device.', 'course-builder' ),
		'section'  => 'responsive',
		'default'  => 1,
		'priority' => 10,
		'choices'  => array(
			true  => esc_html__( 'On', 'course-builder' ),
			false => esc_html__( 'Off', 'course-builder' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'id'              => 'mobile_menu_background_color',
		'type'            => 'color',
		'label'           => esc_html__( 'Background Color', 'course-builder' ),
		'tooltip'         => esc_html__( 'Allows to select header background color on mobile device.', 'course-builder' ),
		'section'         => 'responsive',
		'default'         => '#FFF',
		'priority'        => 16,
		'alpha'           => true,
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'choice'   => 'color',
				'element'  => 'body.responsive .mobile-menu-container',
				'property' => 'background-color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_responsive',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
thim_customizer()->add_field(
	array(
		'id'              => 'text_color_header_mobile',
		'type'            => 'color',
		'label'           => esc_html__( 'Text Color', 'course-builder' ),
		'tooltip'         => esc_html__( 'Allow to select header text color on mobile device.', 'course-builder' ),
		'section'         => 'responsive',
		'default'         => '#202121',
		'priority'        => 17,
		'alpha'           => true,
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'choice'   => 'color',
				'element'  => 'body.responsive .mobile-menu-container ul li>a, 
                               body.responsive .mobile-menu-container ul li>span',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_responsive',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
thim_customizer()->add_field(
	array(
		'id'              => 'text_color_hover_header_mobile',
		'type'            => 'color',
		'label'           => esc_html__( 'Text Hover Color', 'course-builder' ),
		'tooltip'         => esc_html__( 'Allow to select header text hover color on mobile device.', 'course-builder' ),
		'section'         => 'responsive',
		'default'         => '#18c1f0',
		'priority'        => 18,
		'alpha'           => true,
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'choice'   => 'color',
				'element'  => 'body.responsive .mobile-menu-container ul li>a:hover, 
                               body.responsive .mobile-menu-container ul li>span:hover,
                            body.responsive .mobile-menu-container ul li.current-menu-item > a,
                            body.responsive .mobile-menu-container ul li.current-menu-item > span,
                            body.responsive .mobile-menu-container ul li.current-page-parent > a, 
                            body.responsive .mobile-menu-container ul li.current-page-ancestor > a, 
                            body.responsive .mobile-menu-container ul li.current-page-parent > span, 
                            body.responsive .mobile-menu-container ul li.current-page-ancestor > span',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_responsive',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

