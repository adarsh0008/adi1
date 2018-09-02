<?php
/**
 * Section Event Setting
 *
 * @package Course Builder
 */


thim_customizer()->add_section(
	array(
		'id'       => 'event_settings',
		'panel'    => 'events',
		'title'    => esc_html__( 'Settings', 'course-builder' ),
		'priority' => 15,
	)
);

thim_customizer()->add_field(
	array(
		'type'        => 'select',
		'id'          => 'event_style',
		'label'       => esc_html__( 'Event Styles', 'course-builder' ),
		'tooltip'     => esc_html__( 'Choose a style to display for archive events.', 'course-builder' ),
		'default'     => 'list',
		'section'     => 'event_settings',
		'priority'    => 5,
		'multiple'    => 0,
		'choices'     => array(
			'list'    => esc_html__( 'List', 'course-builder' ),
			'grid'    => esc_html__( 'Grid', 'course-builder' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'select',
		'id'       => 'event_columns',
		'label'    => esc_html__( 'Columns', 'course-builder' ),
		'tooltip'  => esc_html__( 'Choose the column type for event archive page grid layout.', 'course-builder' ),
		'default'  => '3',
		'priority' => 13,
		'multiple' => 0,
		'section'  => 'event_settings',
		'choices'         => array(
			'2' => esc_html__( '2', 'course-builder' ),
			'3' => esc_html__( '3', 'course-builder' ),
			'4' => esc_html__( '4', 'course-builder' ),

		),
		'active_callback' => array(
			array(
				'setting'  => 'event_style',
				'operator' => '===',
				'value'    => 'grid',
			),
		),
	)
);